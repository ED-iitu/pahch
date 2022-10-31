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
                                        <h4>{{ ___($globals['title']) }}</h4>
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
                                    'label' => 'Аватар',
                                    'attribute' => 'avatar',
                                    'required' => true,
                                ])
                                    </div>
                                    <div class="form-group row mb-12">
                                        @include('admin.layouts.includes.form.field.input', [
                                    'label' => 'ФИО',
                                    'attribute' => 'name',
                                    'required' => true,
                                ])
                                    </div>
                                    <div class="form-group row mb-12">
                                        @include('admin.layouts.includes.form.field.input', [
                                    'label' => 'Email',
                                    'attribute' => 'email',
                                    'required' => true,
                                ])
                                    </div>
                                    <div class="form-group row mb-12">
                                        @include('admin.layouts.includes.form.field.input', [
                                    'label' => 'Телефон',
                                    'attribute' => 'phone',
                                    'required' => true,
                                    'mask' => '+9(999)999999999'
                                ])
                                    </div>

                                    @if(auth()->user()->isAdmin())
                                    <div class="form-group row mb-4">
                                        @include('admin.layouts.includes.form.field.dropdown', [
                                            'label' => 'Роль',
                                            'attribute' => 'role_id',
                                            'options' => $dependencies['roles'],
                                            'display' => 'name',
                                            'required' => true,
                                        ])
                                    </div>
                                    @else
                                        <input type="hidden" name="role_id" value="{{ \App\Models\Role::USER }}">
                                        @endif
                                    <div class="form-group row mb-12">
                                        @include('admin.layouts.includes.form.field.password', [
                                    'label' => 'Пароль',
                                    'attribute' => 'password',
                                    'required' => false,
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
@endsection
