@extends('admin.layouts.app')
@section('content')
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing" id="cancel-row">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            <div style="display: inline-flex">
                            @include('admin.layouts.includes.index_actions')
                            <div class="mb-4 mt-4">
                                <a class="btn btn-info float-right export-btn" style="display:inline;margin:15px" href="?export=true">{{ ___('Экспорт') }}</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                            <div class="form-group md-0">
                                <label for="">{{ ___('По купленным курсам') }}:</label>
                                <select name="course_id" class="form-control filter">
                                    <option value="">{{ ___('Не выбрано') }}</option>
                                    @foreach($dependencies['courses'] as $course)
                                        <option value="{{ $course->id }}">{{ $course->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>{{ ___('Полное имя') }}</th>
                                    <th>{{ ___('Роль') }}</th>
                                    <th>{{ ___('Описание') }}</th>
                                    <th>{{ ___('Класс') }}</th>
                                    <th>{{ ___('Дата регистрации') }}</th>
                                    <th>{{ ___('Заблокирован') }}</th>
                                    @if(settings('modules_enabled_bonus'))
                                        <th>{{ ___('Бонусы') }}</th>
                                    @endif
                                    <th class="no-content"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($entities ?? [] as $entity)
                                <tr data-user-id="{{ $entity->id }}">
                                    <td><img src="{{ asset($entity->avatar) }}" class="img-thumbnail" width="80px" height="80px"></td>
                                    <td>{{ $entity->id }}</td>
                                    <td>{{ $entity->full_name }}</td>
                                    <td>{{ $entity->role_name }}</td>
                                    <td width="20%">{{ $entity->cutted_description }}</td>
                                    <td width="20%">{{ $entity->grade }}</td>
                                    <td>{{ $entity->created_at->format('Y-m-d H:i:s') }}</td>
                                    <td>{{ $entity->is_blocked ? "Да" : 'Нет' }}</td>
                                    @if(settings('modules_enabled_bonus'))
                                        <td class="bonus_field">{{ $entity->bonuses }}</td>
                                    @endif
                                    <td>
                                        @include('admin.user.dropdown_menu',compact('entity'))
                                    </td>
                                </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>{{ ___('Полное имя') }}</th>
                                    <th>{{ ___('Роль') }}</th>
                                    <th>{{ ___('Описание') }}</th>
                                    <th>{{ ___('Класс') }}</th>
                                    <th>{{ ___('Дата регистрации') }}</th>
                                    <th>{{ ___('Заблокирован') }}</th>
                                    @if(settings('modules_enabled_bonus'))
                                        <th>{{ ___('Бонусы') }}</th>
                                    @endif
                                    <th class="no-content"></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->

        @if(settings('modules_enabled_bonus'))
        <!-- Modal -->
        <div class="modal fade profile-modal" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="modal-body text-center" style="padding: 10px">
                        <p class="user_name"></p>&nbsp;(<span class="user_bonuses"></span>&nbsp;{{ ___('бонусов') }})
                    </div>
                    <div class="modal-header justify-content-center" id="profileModalLabel">
                        <div class="modal-profile mt-4">
                            <img alt="avatar" src="/panel/assets/img/90x90.jpg" class="rounded-circle" width="100%" height="100%">
                        </div>
                    </div>
                    <div class="modal-body text-center">
                        <input class="mt-2 form-control bonus_sum" type="number" placeholder="{{ ___('Сумма') }}">
                    </div>
                    <div class="modal-footer justify-content-center mb-4">
                        <button type="button" class="btn" onclick="addTransaction()">{{ ___('Добавить') }}</button>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @include('admin.partials.copyright')
    @include('admin.layouts.includes.script.datatable',['sort' => 'true', 'search' => 'true', 'pagination' => 'true'])
        @if(settings('modules_enabled_bonus'))
            @push('styles')
            <link href="{{ asset('panel/assets/css/components/custom-modal.css') }}" rel="stylesheet" type="text/css" />
        @endpush
        @push('scripts')

            <script>
                var selectedUser;
                var enableAddTransaction = true;
                function openBonus(e){
                    selectedUser = $(e.target).attr('data-id')
                    $("#profileModal img").attr('src',$(e.target).attr('data-avatar'))
                    $("#profileModal .user_name").text($(e.target).attr('data-name'))
                    $("#profileModal .user_bonuses").text($(e.target).attr('data-bonuses'))
                    $('#profileModal').modal('show')
                }
                $('.openProfileModal').click(openBonus);
                function addTransaction(){
                    let sum = $(".bonus_sum").val()
                    if(sum.length === 0 || sum == 0){
                       showNotification('error','Заполните сумму')
                        return;
                    }
                    enableAddTransaction = false;
                    $.get('{{ route('admin.transactions.store') }}',{
                        user_id: selectedUser,
                        sum: sum
                }).done(function (data){
                        enableAddTransaction = true;
                        $("#profileModal .user_bonuses").html(data.bonuses)
                        $("[data-user-id="+selectedUser+"]").find('.bonus_field').text(data.bonuses)
                        showNotification('success','Данные успешно обновлены')
                    }).fail(function (data){
                        showNotification('error','Не удалось получить данные')
                    })
                    $(".bonus_sum").val(0);
                }
            </script>
        @endpush
            @endif
        @push('scripts')
            <script>
                let filters = {}
                function load () {
                    $.get("?filter", filters).done(function (data) {
                        showNotification('success', 'Данные успешно получены')
                        datatable.clear();
                        datatable.rows.add(data.data).draw();
                        $(".export-btn").attr('href',this.url+"&export=true")
                    }).fail(function () {
                        showNotification('error', 'Не удалось получить данные')
                    });
                }

                Array.from(document.getElementsByTagName('select')).forEach(e => {
                    e.onchange = () => {
                        if(e.value === filters[e.name]) return
                        if (e.value) filters[e.name] = e.value
                        else delete filters[e.name]
                        load()
                    }
                })
            </script>
        @endpush
@endsection
