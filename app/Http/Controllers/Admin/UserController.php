<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Models\Agency;
use App\Models\City;
use App\Models\Course;
use App\Models\Modules\Certificate\UserCertificate;
use App\Models\Modules\Journal\Journal;
use App\Models\Modules\Packet\PacketItem;
use App\Models\Modules\Task\Task;
use App\Models\Modules\Test\Test;
use App\Models\Organization;
use App\Models\Period;
use App\Models\Role;
use App\Models\Subscribe;
use App\Models\User;
use App\Notifications\Notifications;
use App\Services\Certificate\Generate;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;
use Maatwebsite\Excel\Facades\Excel;
use Validator;

class UserController extends BaseController
{

    /**
     * @var string
     */
    protected $section = 'admin';

    /**
     * @var string
     */
    protected $entity = 'admin.users';

    /**
     * @var string
     */
    protected $redirectTo = '/admin/users';
    protected $global_title = "Пользователи";


    public function enjectDependencies()
    {
        $this->enject('roles', Role::orderBy('id','desc')->get());
    }


    public function index()
    {
        $query = User::_role();
        if (request('course_id')) {
            $query->whereHas('subscribes', function ($query) {
                $query->payed()->where('entity_type', Course::class)->where('entity_id', request('course_id'));
            });
        }
        $entities = $query->get();

        if (request()->has('export')) {
            return Excel::download(new UsersExport($entities), 'users.xlsx');
        }
        if (request()->has('filter')) {
            $data = [];
            foreach ($entities as &$entity) {
                $item = [
                    '<img src="' . asset($entity->avatar) . '" class="img-thumbnail" width="80px" height="80px">',
                    $entity->id,
                    $entity->full_name,
                    $entity->role_name,
                    $entity->cutted_description,
                    $entity->created_at->format('Y-m-d H:i:s'),
                    $entity->is_blocked ? "Да" : 'Нет',
                ];
                if (settings('modules_enabled_bonus')) {
                    $item[] = $entity->bonuses;
                }
                $item[] = view('admin.user.dropdown_menu', $this->getData(compact('entity')))->render();
                $data[] = $item;
            }
            return response()->json([
                'data' => $data
            ]);
        } else {
            $this->enject('courses', Course::visible()->get());
        }

        return view('admin.user.index', $this->getData([
            'entities' => $entities,
            'edit' => 'admin.users.edit'
        ]));
    }


    public function block(User $user)
    {
        $user->update(['is_blocked' => true]);
        return back();
    }

    public function unblock(User $user)
    {
        $user->update(['is_blocked' => false]);
        return back();
    }

    public function courses(User $user)
    {
        $this->canBeAdded = false;
        $entities = Course::all()->sortByDesc(function ($course) use ($user) {
            return $course->hasSubscribed($user->id);
        });
        $this->setTitle("Курсы пользователя - {$user->full_name}");
        return view('admin.user.courses', $this->getData([
            'entities' => $entities,
            '_entity' => $user
        ]));
    }


    public function subscribeCourse(User $user, Course $course)
    {
        self::subscribeCourseAction($user, $course, request('period_id'), request('packet_id'));
        return back();
    }


    public static function subscribeCourseAction(User $user, Course $course, $period = null, $packet = null)
    {
        $update = [];
        $price = $course->price;
        if (!is_null($period)) {
            if ($period = Period::where('id', $period)->first()) {
                $update = array_merge($update, [
                    'period_id' => $period->id,
                    'expired_at' => now()->copy()->addDays($period->days)->addMonths($period->months)
                ]);
                $price = $period->price;
            }
        }

        if (!is_null($packet)) {
            if ($packet = PacketItem::where('id', $packet)->first()) {
                $update = array_merge($update, [
                    'packet_id' => $packet->id,
                    'expired_at' => null
                ]);
                $price = $packet->price;
            }
        }


        $subscribe = $course->subscribes()->updateOrCreate([
            'user_id' => $user->id,
            'payed' => false,
        ], array_merge([
            'payed' => true,
            'cost' => $price,
            'payment_data' => 'Локальная покупка',
            'type' => 'local'
        ], $update));
    }

    public static function unsubscribeCourseAction(User $user, Course $course)
    {
        $subscribe = $course->subscribes()->where('user_id', $user->id)->payed()->delete();
    }

    public function unsubscribeCourse(User $user, Course $course)
    {
        $subscribe = $course->subscribes()->where('user_id', $user->id)->payed()->delete();
        return back();
    }

    public function tests(User $user)
    {
        $this->canBeAdded = false;
        $entities = Test::all()->sortByDesc(function ($test) use ($user) {
            return $test->hasSubscribed($user->id);
        });
        $this->setTitle("Тесты пользователя - {$user->full_name}");
        return view('admin.user.tests', $this->getData([
            'entities' => $entities,
            '_entity' => $user
        ]));
    }


    public function subscribeTest(User $user, Test $test)
    {
        $subscribe = $test->subscribes()->updateOrCreate([
            'user_id' => $user->id,
        ], [
            'payed' => 1,
            'cost' => $test->price,
            'payment_data' => 'Локальная покупка',
            'type' => 'local'
        ]);
        return back();
    }

    public function unsubscribeTest(User $user, Test $test)
    {
        $subscribe = $test->subscribes()->where('user_id', $user->id)->payed()->delete();
        return back();
    }


    public function tasks(User $user)
    {
        $this->canBeAdded = false;
        $entities = Task::all()->sortByDesc(function ($task) use ($user) {
            return $task->hasSubscribed($user->id);
        });
        $this->setTitle("Заданий пользователя - {$user->full_name}");
        return view('admin.user.tasks', $this->getData([
            'entities' => $entities,
            '_entity' => $user
        ]));
    }


    public function subscribeTask(User $user, Task $task)
    {
        $subscribe = $task->subscribes()->updateOrCreate([
            'user_id' => $user->id,
        ], [
            'payed' => 1,
            'cost' => $task->price,
            'payment_data' => 'Локальная покупка',
            'type' => 'local'
        ]);
        return back();
    }


    public function unsubscribeTask(User $user, Task $task)
    {
        $subscribe = $task->subscribes()->where('user_id', $user->id)->payed()->delete();
        return back();
    }

    public function journals(User $user)
    {
        $this->canBeAdded = false;
        $entities = Journal::all()->sortByDesc(function ($journal) use ($user) {
            return $journal->hasSubscribed($user->id);
        });
        $this->setTitle("Журналы пользователя - {$user->full_name}");
        return view('admin.user.journals', $this->getData([
            'entities' => $entities,
            '_entity' => $user
        ]));
    }

    public function subscribeJournal(User $user, Journal $journal)
    {
        $subscribe = $journal->subscribes()->updateOrCreate([
            'user_id' => $user->id,
        ], [
            'payed' => 1,
            'cost' => $journal->price,
            'payment_data' => 'Локальная покупка',
            'type' => 'local'
        ]);
        return back();
    }


    public function unsubscribeJournal(User $user, Journal $journal)
    {
        $subscribe = $journal->subscribes()->where('user_id', $user->id)->payed()->delete();
        return back();
    }

    public function generate_certificate_course(User $user, Course $course)
    {
        if ($course->certificate) {
            try {
                $generate = new Generate($course->certificate, $course, $user);
                $generate->run();
            } catch (\Exception $e) {
                Notifications::notify("error", "Не удалось сгенерировать сертификат");
            }
        }
        return back();
    }


    public function delete_certificate_course(User $user, Course $course)
    {
        UserCertificate::where('user_id', $user->id)->where('entity_id', $course->id)->where('entity_type', get_class($course))->delete();
        return back();
    }

    public function generate_certificate_test(User $user, Test $test)
    {
        if ($test->certificate) {
            try {
                $generate = new Generate($test->certificate, $test, $user);
                $generate->run();
            } catch (\Exception $e) {
                Notifications::notify("error", "Не удалось сгенерировать сертификат");
            }
        }
        return back();
    }


    public function delete_certificate_test(User $user, Test $test)
    {
        UserCertificate::where('user_id', $user->id)->where('entity_id', $test->id)->where('entity_type', get_class($test))->delete();
        return back();
    }

    public function generate_certificate_task(User $user, Task $task)
    {
        if ($task->certificate) {
            try {
                $generate = new Generate($task->certificate, $task, $user);
                $generate->run();
            } catch (\Exception $e) {
                Notifications::notify("error", "Не удалось сгенерировать сертификат");
            }
        }
        return back();
    }


    public function delete_certificate_task(User $user, Task $task)
    {
        UserCertificate::where('user_id', $user->id)->where('entity_id', $task->id)->where('entity_type', get_class($task))->delete();
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setTitle('Добавление пользователя');
        $this->enjectDependencies();
        return view('admin.user.form', $this->getData([
            'action' => route("{$this->entity}.store"),
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(request()->all(), [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);
        if ($validator->fails()) {
            if ($user = User::where('email', $request->email)->onlyTrashed()->first()) {
                $user->update($request->all());
                $user->restore();
                $this->sendRecoveryPassword($user->email);
                return redirect()->route("{$this->entity}.index");
            }
            return back()->withErrors($validator);
        }
        if (!empty($request->password)) {
            $validator = Validator::make(request()->all(), [
                'password' => 'required|min:8',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
        }

        $entity = User::create($request->all());

        $this->sendRecoveryPassword($entity->email);


        return redirect()->route("{$this->entity}.index");
    }

    public function sendRecoveryPassword($email)
    {
        return;
        try {
            $response = Password::sendResetLink(['email' => $email], function (Message $message) {
                $message->subject(__('Reset Password'));
            });
        } catch (\Exception $e) {

        }
    }

    public function show(User $user)
    {
        return redirect()->route("{$this->entity}.index");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->enjectDependencies();
        $this->setTitle(___('Редактирование пользователя') . " - #{$user->id}");
        return view('admin.pages.user.form', $this->getData([
            'entity' => $user,
            'action' => route("{$this->entity}.update", $user),
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {

        if ($user->email !== request()->email) {
            $validator = Validator::make(request()->all(), [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
        }
        if (!empty($request->password)) {
            $validator = Validator::make(request()->all(), [
                'password' => 'required|min:8',
            ]);
            if ($validator->fails()) {
                return back()->withErrors($validator);
            }
            request()->merge([
                'password' => \Hash::make(request()->password)
            ]);
        }

        $user->update(request()->all());
        return redirect()->route("{$this->entity}.edit", $user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back();
    }

    public function like()
    {
        $q = request()->q;
        $role_id = request()->role_id ?? 3;
        $query = User::where(function ($query) use ($q) {
            $query->where('name', 'like', "%{$q}%")->orWhere('email', 'like', "%{$q}%");
        });
        if (request('course_id')) {
            $query->whereHas('subscribes', function ($query) {
                $query->payed()->where('entity_type', Course::class)->where('entity_id', request('course_id'));
            });
        }
        if ((bool)request('doesnt_consist_in_other_groups')) {
            $query->whereDoesntHave('groups');
        }
        $entities = $query->get();
        $entities->each(function ($user) {
            $user->name = "[{$user->role->name}] {$user->name} {$user->email}";
            return $user;
        });
        return response()->json($entities);
    }

}
