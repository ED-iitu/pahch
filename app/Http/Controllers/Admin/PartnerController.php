<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends BaseController
{
    protected $section = 'admin';
    protected $entity = 'admin.partners';
    protected $redirectTo = '/admin/partners';
    protected $global_title = "Партнеры";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();

        return view('admin.pages.partners.index', $this->getData([
            'entities' => $partners,
        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->setTitle('Добавление партнера');

        return view('admin.pages.partners.form', $this->getData([
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
            "name" => [
                'ru' => $request->get('ru_name'),
                'kk' => $request->get('kz_name'),
                'en' => $request->get('en_name'),
            ],
            'description' => [
                'ru' => $request->get('ru_description'),
                'kk' => $request->get('kz_description'),
                'en' => $request->get('en_description'),
            ],
        ];

        Partner::create($data);

        return redirect()->route("{$this->entity}.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partner  $partner
     */
    public function edit(Partner $partner)
    {
        $this->setTitle(___('Редактирование партнера') . " - #{$partner->id}");

        return view('admin.pages.partners.form', $this->getData([
            'entity' => $partner,
            'action' => route("{$this->entity}.update", $partner)
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partner  $partner
     */
    public function update(Request $request, Partner $partner)
    {
        $data = [
            "name" => [
                'ru' => $request->get('ru_name'),
                'kk' => $request->get('kz_name'),
                'en' => $request->get('en_name'),
            ],
            'description' => [
                'ru' => $request->get('ru_description'),
                'kk' => $request->get('kz_description'),
                'en' => $request->get('en_description'),
            ],
        ];

        $partner->update($data);

        return redirect()->route("{$this->entity}.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partner  $partner
     */
    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route("{$this->entity}.index");
    }
}
