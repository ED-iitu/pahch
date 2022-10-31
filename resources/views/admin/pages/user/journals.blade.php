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
                                    <th>{{ ___('Цена') }}</th>
                                    <th>{{ ___('Старая цена') }}</th>
                                    <th class="no-content"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($entities as $entity)
                                <tr>
                                    <td width="15%"><img src="{{ $entity->poster }}" class="img-thumbnail" width="150px" height="150px"></td>
                                    <td width="15%">{{ $entity->title }}</td>
                                    <td>{{ $entity->price_format }}</td>
                                    <td>{{ $entity->old_price_format }}</td>
                                    <td width="20%">
                                        @if($entity->hasSubscribed($_entity->id))
                                            <a class="btn btn-danger" href="{{ route('admin.users.journals.unsubscribe',['user' => $_entity, 'journal' => $entity]) }}">{{ ___('Отписать') }}</a>
                                            @else
                                            <a class="btn btn-success" href="{{ route('admin.users.journals.subscribe',['user' => $_entity, 'journal' => $entity]) }}">{{ ___('Подписать') }}</a>
                                        @endif
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>{{ ___('Название') }}</th>
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
