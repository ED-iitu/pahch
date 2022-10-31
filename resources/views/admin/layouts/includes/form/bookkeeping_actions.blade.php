<div class="action" style="padding:1em">
        <div class="gr-12 gr-12@mobile">
            @include('layouts.includes.form.field.input', [
                'label' => 'Месяц',
                'attribute' => 'month',
                'placeholder' => 'Месяц',
                'helper' => '',
            ])
        </div>
</div>

<div class="action">
    <div class="gr-12">
        @if(!in_array($entity->status_id,\App\Models\Bookkeeping::BUTTONS_DISABLED))
            <button type="submit" class="btn is-primary" id="submit-update" name="send">
                {{ $entity->getNextStatus() }}
            </button>
            @if($entity->status_id === \App\Models\Bookkeeping::IN_WORK)
                <span class="btn-between">или</span>
                <button type="submit" class="btn is-small" id="submit-update" name="save">
                    Сохранить
                </button>
            @endif
            @if($entity->status_id === \App\Models\Bookkeeping::PAID || $entity->status_id === \App\Models\Bookkeeping::NOT_PAID || $entity->status_id === \App\Models\Bookkeeping::INVOICED)
                <span class="btn-between">или</span>
                <button type="submit" class="btn is-small" id="submit-update" name="additional_status"
                        value="{{ \App\Models\Bookkeeping::NOT_PAID }}">
                    Не оплачен
                </button>
            @endif
        @endif
        <button type="submit" class="btn is-primary" id="submit-update" name="export">
            Экспорт
        </button>
    </div>

</div>
@if($entity->status_id === \App\Models\Bookkeeping::IN_WORK || $entity->status_id === \App\Models\Bookkeeping::UNDER_REVISION)
    <div class="action">
        <div class="clearfix"></div>
        <div class="gr12">
            <div class="gr-12 gr-12@mobile">
                @include('layouts.includes.form.field.dropdown', [
                    'label' => 'Компания',
                    'attribute' => 'company_id',
                    'required' => true,
                    'autofocus' => true,
                    'select2' => true,
                    'placeholder' => 'Не выбрано',
                    'helper' => '',
                    'options' => $dependencies['companies'],
                ])
            </div>

            <div style="margin-bottom: 15px">
                <b>Выбранные заказы:</b> <span class="transfer_list" style="    word-break: break-word;"></span>
            </div>
            <button type="submit" class="btn is-primary button_transfer" name="transfer">
                Перенести
            </button>
        </div>
    </div>
    @push('scripts')
        <script>
            $(".button_transfer").on("click", function (e) {
                let result = confirm("Подтвердите перенос в компанию " + $("#company_id option:selected").text() + " следующих поездок: " + $(".transfer_list").text());
                if (result === false) {
                    e.preventDefault();
                }
            });
        </script>
    @endpush
@endif
@if($entity->status_id > \App\Models\Bookkeeping::IN_WORK)
    <div class="action">
        <div class="clearfix"></div>
        <div class="gr12">
            <div class="gr-12 gr-12@mobile">
                @include('layouts.includes.form.field.dropdown', [
                    'label' => 'Статус',
                    'attribute' => 'status_id',
                    'required' => true,
                    'autofocus' => true,
                    'select2' => true,
                    'placeholder' => 'Не выбрано',
                    'helper' => '',
                    'options' => array_filter($dependencies['statuses'],function ($id) use ($entity){ return $id > 1 && $id <= $entity->status_id+1; },ARRAY_FILTER_USE_KEY),
                ])
            </div>
            <button type="submit" class="btn is-primary button_rollback" name="rollback">
                Откатить
            </button>
        </div>
    </div>
@endif
