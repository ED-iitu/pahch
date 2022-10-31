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
                                <th>{{ __('Название') }}</th>
                                <th>{{ __('Полное описание') }}</th>
                                <th class="no-content"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($entities as $entity)
                                <tr>
                                    <td width="15%"><img src="{{ asset($entity->poster) }}" class="img-thumbnail" width="150px" height="150px"></td>
                                    <td>{{ $entity->title }}</td>
                                    <td>{{ $entity->description }}</td>
                                    <td>
                                        @include('admin.layouts.includes.show_actions')
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th></th>
                                <th>{{ __('Название') }}</th>
                                <th>{{ __('Полное описание') }}</th>
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
