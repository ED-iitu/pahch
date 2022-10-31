@extends('admin.layouts.app')
@section('content')
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            @include('admin.layouts.includes.index_actions')
                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>{{ ___('Название') }}</th>
                                    <th>{{ ___('Категория') }}</th>
                                    <th>{{ ___('Автор') }}</th>
                                    <th>{{ ___('Краткое описание') }}</th>
                                    <th>{{ ___('Цена') }}</th>
                                    <th>{{ ___('Старая цена') }}</th>
                                    <th class="no-content"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($entities as $entity)
                                <tr>
                                    <td width="15%"><img src="{{ asset($entity->poster) }}" class="img-thumbnail" width="150px" height="150px"></td>
                                    <td width="15%">{{ $entity->title }}</td>
                                    <td>{{ $entity->category_name }}</td>
                                    <td>{{ optional($entity->author)->full_name }}</td>
                                    <td width="30%">{{ $entity->cutted_short_description }}</td>
                                    <td>{{ $entity->price_format }}</td>
                                    <td>{{ $entity->old_price_format }}</td>
                                    <td width="20%">
                                        @if($entity->hasSubscribed($_entity->id))
                                            <a class="btn btn-danger" href="{{ route('admin.users.tests.unsubscribe',['user' => $_entity, 'test' => $entity]) }}">{{ ___('Отписать') }}</a>
                                            @else
                                            <a class="btn btn-success" href="{{ route('admin.users.tests.subscribe',['user' => $_entity, 'test' => $entity]) }}">{{ ___('Подписать') }}</a>
                                        @endif
                                        @if($entity->certificate)
                                            @if($entity->hasCertificate($_entity->id))
                                                <a class="btn btn-danger" href="{{ route('admin.users.tests.delete_certificate_test',['user' => $_entity, 'test' => $entity]) }}">{{ ___('Отозвать сертификат') }}</a>
                                            @else
                                                <a class="btn btn-success" href="{{ route('admin.users.tests.generate_certificate_test',['user' => $_entity, 'test' => $entity]) }}">{{ ___('Сгенерировать сертификат') }}</a>
                                            @endif
                                            @else
                                                <a class="btn btn-success" disabled>{{ ___('Сгенерировать сертификат') }}</a>
                                            @endif
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>{{ ___('Название') }}</th>
                                    <th>{{ ___('Категория') }}</th>
                                    <th>{{ ___('Автор') }}</th>
                                    <th>{{ ___('Краткое описание') }}</th>
                                    <th>{{ ___('Цена') }}</th>
                                    <th>{{ ___('Старая цена') }}</th>
                                    <th class="no-content"></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.partials.copyright')
    @include('admin.layouts.includes.script.datatable',['sort' => 'true', 'search' => 'true', 'pagination' => 'true'])
@endsection
