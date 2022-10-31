<?php

namespace App\Http\Controllers\Admin;

use App\Filesystem\File;
use App\Filesystem\Source;
use App\Filesystem\Validator\FileValidator;
use App\Models\Material;
use App\Models\News;
use Illuminate\Http\Request;

class MaterialController extends BaseController
{
    protected $section = 'admin';
    protected $entity = 'admin.materials';
    protected $redirectTo = '/admin/materials';
    protected $global_title = "Материалы";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::all();

        return view('admin.pages.materials.index', $this->getData([
            'entities' => $materials
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->setTitle('Добавление Материала');

        return view('admin.pages.materials.form', $this->getData([
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
            'video_links' => $request->get('video_link'),
            'file' => '123'
        ];

        $material = Material::create($data);

        if (is_array(request('file'))) {
            foreach (request()->file as $index => $_file){
                $validator = (new FileValidator(["file.{$index}"]));
                $file = (new File(new Source('file')))->load("file",$index)->validate($validator)->save($index);
                if (!$file->failed) {
                    $material->files()->create([
                        'entity_type' => Material::class,
                        'link' => $file->getStoredPath()
                    ]);
                }
                unset($material[$index]);
            }
        }

        return redirect()->route("{$this->entity}.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Material $material)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     */
    public function destroy(Material $material)
    {
        $material->delete();

        return redirect()->route("{$this->entity}.index");
    }
}
