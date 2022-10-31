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
                                <th>{{ __('Текст') }}</th>
                                <th class="no-content"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($entities as $entity)
                                <tr>
                                    <td>{{ $entity->about_text }}</td>
                                    <td>
                                        @include('admin.layouts.includes.show_actions')
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>{{ __('Текст') }}</th>
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
