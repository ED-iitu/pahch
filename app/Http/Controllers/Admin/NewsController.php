<?php

namespace App\Http\Controllers\Admin;

use App\Filesystem\File;
use App\Filesystem\Source;
use App\Filesystem\Validator\FileValidator;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends BaseController
{
    protected $section = 'admin';
    protected $entity = 'admin.news';
    protected $redirectTo = '/admin/news';
    protected $global_title = "Новости";

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        $news = News::all();

        return view('admin.pages.news.index', $this->getData([
            'entities' => $news,
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->setTitle('Добавление Новости');

        return view('admin.pages.news.form', $this->getData([
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
            "title" => [
                'ru' => $request->get('ru_title'),
                'kk' => $request->get('kz_title'),
                'en' => $request->get('en_title'),
            ],
            'description' => [
                'ru' => $request->get('ru_description'),
                'kk' => $request->get('kz_description'),
                'en' => $request->get('en_description'),
            ],
        ];

        $news = News::create($data);

        if (is_array(request('sliders'))) {
            foreach (request()->sliders as $index => $_file){
                $validator = (new FileValidator(["sliders.{$index}"]));
                $file = (new File(new Source('file')))->load("sliders",$index)->validate($validator)->save($index);
                if (!$file->failed) {
                    $news->sliders()->create([
                        'entity_type' => News::class,
                        'link' => $file->getStoredPath()
                    ]);
                }
                unset($news[$index]);
            }
        }

        return redirect()->route("{$this->entity}.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     */
    public function edit(News $news)
    {
        $this->setTitle(___('Редактирование Новости') . " - #{$news->id}");

        return view('admin.pages.news.form', $this->getData([
            'entity' => $news,
            'action' => route("{$this->entity}.update", $news)
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     */
    public function update(Request $request, News $news)
    {
        $data = [
            "title" => [
                'ru' => $request->get('ru_title'),
                'kk' => $request->get('kz_title'),
                'en' => $request->get('en_title'),
            ],
            'description' => [
                'ru' => $request->get('ru_description'),
                'kk' => $request->get('kz_description'),
                'en' => $request->get('en_description'),
            ],
        ];

        $news->update($data);

        if (is_array(request('sliders'))) {
            foreach (request()->sliders as $index => $_file){
                $validator = (new FileValidator(["sliders.{$index}"]));
                $file = (new File(new Source('file')))->load("sliders",$index)->validate($validator)->save($index);
                if (!$file->failed) {
                    $news->sliders()->create([
                        'entity_type' => News::class,
                        'link' => $file->getStoredPath()
                    ]);
                }
                unset($news[$index]);
            }
        }

        return redirect()->route("{$this->entity}.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     */
    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route("{$this->entity}.index");
    }
}
