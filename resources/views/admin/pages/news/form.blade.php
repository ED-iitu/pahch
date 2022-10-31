@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="container">
            <div class="row">
                <div id="flHorizontalForm" class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    <h4>{{ __($globals['title'])  }}</h4>
                                </div>
                            </div>
                        </div>

                        <div class="widget-content widget-content-area">
                            <form action="{{ $action }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @if (isset($entity) && $entity->id)
                                    @method('PATCH')
                                @endif
                                <div class="form-group row mb-12">
                                    @include('admin.layouts.includes.form.field.image', [
                                        'label' => 'Logo',
                                        'attribute' => 'image',
                                        'required' => true,
                                    ])
                                </div>

                                <ul class="nav nav-tabs  mb-3" id="animateLine" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="animated-underline-rus-tab" data-toggle="tab"
                                           href="#animated-underline-rus" role="tab"
                                           aria-controls="animated-underline-rus" aria-selected="true">Русский</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="animated-underline-kaz-tab" data-toggle="tab"
                                           href="#animated-underline-kaz" role="tab"
                                           aria-controls="animated-underline-kaz" aria-selected="false">Қазақша</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="animated-underline-en-tab" data-toggle="tab"
                                           href="#animated-underline-en" role="tab"
                                           aria-controls="animated-underline-en" aria-selected="false">English</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="animateLineContent-4">
                                    <div class="tab-pane fade show active" id="animated-underline-rus"
                                         role="tabpanel" aria-labelledby="animated-underline-rus-tab">
                                        <div class="form-group row mb-4">
                                            @include('admin.layouts.includes.form.field.input', [
                                                'label' => 'Название',
                                                'attribute' => 'ru_title',
                                                'originName' => isset($entity) ? $entity->getTranslation('title', 'ru') : null,
                                                'required' => true,
                                            ])
                                        </div>
                                        <div class="form-group row mb-12">
                                            @include('admin.layouts.includes.form.field.ckeditor', [
                                                'label' => 'Полное описание',
                                                'attribute' => 'ru_description',
                                                'originName' => isset($entity) ? $entity->getTranslation('description', 'ru') : null,
                                                'required' => true,
                                                'rows' => 10,
                                            ])
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="animated-underline-kaz" role="tabpanel"
                                         aria-labelledby="animated-underline-kaz-tab">
                                        <div class="form-group row mb-4">
                                            @include('admin.layouts.includes.form.field.input', [
                                                'label' => 'Название',
                                                'attribute' => 'kz_title',
                                                'originName' => isset($entity) ? $entity->getTranslation('title', 'kk') : null,
                                                'required' => true,
                                            ])
                                        </div>
                                        <div class="form-group row mb-12">
                                            @include('admin.layouts.includes.form.field.ckeditor', [
                                                'label' => 'Полное описание',
                                                'attribute' => 'kz_description',
                                                'originName' => isset($entity) ? $entity->getTranslation('description', 'kk') : null,
                                                'required' => true,
                                                'rows' => 10,
                                            ])
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="animated-underline-en" role="tabpanel"
                                         aria-labelledby="animated-underline-en-tab">
                                        <div class="form-group row mb-4">
                                            @include('admin.layouts.includes.form.field.input', [
                                                'label' => 'Название',
                                                'attribute' => 'en_title',
                                                'originName' => isset($entity) ? $entity->getTranslation('title', 'en') : null,
                                                'required' => true,
                                            ])
                                        </div>
                                        <div class="form-group row mb-12">
                                            @include('admin.layouts.includes.form.field.ckeditor', [
                                                'label' => 'Полное описание',
                                                'attribute' => 'en_description',
                                                'originName' => isset($entity) ? $entity->getTranslation('description', 'en') : null,
                                                'required' => true,
                                                'rows' => 10,
                                            ])
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-4" style="margin-bottom:30px!important;">
                                    @include('admin.layouts.includes.form.field.slider', [
                                        'label' => 'Картинки для слайдера',
                                        'attribute' => 'sliders',
                                        'required' => false,
                                        'helper' => 'png,jpeg (20mb)',
                                        'is_multiple' => true,
                                    ])
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        @include('admin.layouts.includes.form.actions')
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link rel="stylesheet" href="{{ asset('panel/plugins/select2/select2.min.css') }}">
    @endpush
@endsection
