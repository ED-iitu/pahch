<?php
namespace App\Http\Controllers\Admin;

use App\Models\Main;
use Illuminate\Http\Request;

class MainController extends BaseController
{
    protected $section = 'admin';
    protected $entity = 'admin.main';
    protected $redirectTo = '/admin/main';
    protected $global_title = "Информация на главной странице";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $main[] = Main::first();

        if ($main[0] === null) {
            $main = [];
        }

        return view('admin.pages.main.index', $this->getData([
            'entities' => $main
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->setTitle('Добавление инфо на главную страницу');

        return view('admin.pages.main.form', $this->getData([
            'action' => route("{$this->entity}.store")
        ]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $data = [
            "about_text" => [
                'ru' => $request->get('ru_about_text'),
                'kk' => $request->get('kz_about_text'),
                'en' => $request->get('en_about_text'),
            ],
        ];

        Main::create($data);

        return redirect()->route("{$this->entity}.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Main  $main
     * @return \Illuminate\Http\Response
     */
    public function show(Main $main)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Main  $main
     */
    public function edit(Main $main)
    {
        $this->setTitle(___('Редактирование инфо на главной') . " - #{$main->id}");

        return view('admin.pages.main.form', $this->getData([
            'entity' => $main,
            'action' => route("{$this->entity}.update", $main)
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Main  $main
     */
    public function update(Request $request, Main $main)
    {
        $data = [
            "about_text" => [
                'ru' => $request->get('ru_about_text'),
                'kk' => $request->get('kz_about_text'),
                'en' => $request->get('en_about_text'),
            ],
        ];

        $main->update($data);

        return redirect()->route("{$this->entity}.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Main  $main
     */
    public function destroy(Main $main)
    {
        $main->delete();

        return redirect()->route("{$this->entity}.index");
    }
}
