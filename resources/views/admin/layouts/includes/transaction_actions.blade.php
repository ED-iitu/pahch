    <button type="button" class="btn popdown is-primary" data-order_id="{{ $entity->id }}" data-driver_id="{{ $entity->driver_id }}" data-target="modal">{{ ___('Добавить транзакцию') }}</button>

    <script>
        var add_transaction_url = "{{ route($globals['entity'].'.store') }}";
    </script>

    <div class="modal" style="display: none">
        <form action="">
        <div class="form">
            <div class="gr-12">
            <h3 style="padding:20px">{{ ___('Добавить транзакцию') }}</h3>
                <hr>
            </div>
        <div class="content block">
            <div class="section is-last">
                <div class="gr-12">
                    @include('layouts.includes.form.field.input', [
                        'label' => 'Сумма',
                        'attribute' => 'sum',
                        'required' => true,
                        'type' => "number"
                    ])
                </div>
            </div>
            <div class="section is-last">
                <div class="gr-12">
                    @include('layouts.includes.form.field.textarea-transaction', [
                        'label' => 'Комментарий',
                        'attribute' => 'comment',
                        'value' => '',
                    ])
                </div>
            </div>

            <div class="action">
                <div class="gr-6">
                    <a href="#" class="btn is-clone pull-left is-small close-popdown">{{ ___('Закрыть') }}</a>
                </div>
                <div class="gr-6">
                    <button type="submit" class="btn is-primary pull-right add_transaction">{{ ___('Добавить') }}</button>
                </div>
            </div>
        </div>
        </div>
        </form>

    </div>