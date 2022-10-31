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
                                            <a class="btn btn-danger" href="{{ route('admin.users.courses.unsubscribe',['user' => $_entity, 'course' => $entity]) }}">{{ ___('Отписать') }}</a>
                                            @else
                                            @if($entity->periods->isNotEmpty())
                                                    <div class="btn-group dropleft show" role="group">
                                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-success dropdown-toggle dropleft" href="{{ route('admin.users.courses.subscribe',['user' => $_entity, 'course' => $entity]) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg> {{ ___('Подписать') }}</a>
                                                        <div class="dropdown-menu" style="will-change: transform;">
                                                            @foreach($entity->periods as $period)
                                                                <a href="{{ route('admin.users.courses.subscribe',['user' => $_entity, 'course' => $entity,'period_id' => $period->id]) }}" class="dropdown-item">{{ $period->period }}</a>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                            @elseif($entity->packets->isNotEmpty())
                                                <div class="btn-group dropleft show" role="group">
                                                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-success dropdown-toggle dropleft" href="{{ route('admin.users.courses.subscribe',['user' => $_entity, 'course' => $entity]) }}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg> {{ ___('Подписать') }}</a>
                                                    <div class="dropdown-menu" style="will-change: transform;">
                                                        @foreach($entity->packets as $packet)
                                                            <a href="{{ route('admin.users.courses.subscribe',['user' => $_entity, 'course' => $entity,'packet_id' => $packet->id]) }}" class="dropdown-item">{{ optional($packet->packet)->name }}</a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @else
                                                        <a class="btn btn-success" href="{{ route('admin.users.courses.subscribe',['user' => $_entity, 'course' => $entity]) }}"> {{ ___('Подписать') }}</a>
                                                @endif
                                        @endif
                                            @if($entity->certificate)
                                            @if($entity->hasCertificate($_entity->id))
                                                <a class="btn btn-danger" href="{{ route('admin.users.courses.delete_certificate_course',['user' => $_entity, 'course' => $entity]) }}">{{ ___('Отозвать сертификат') }}</a>
                                            @else
                                                <a class="btn btn-success" href="{{ route('admin.users.courses.generate_certificate_course',['user' => $_entity, 'course' => $entity]) }}">{{ ___('Сгенерировать сертификат') }}</a>
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
