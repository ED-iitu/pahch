<input type="hidden" name="delete[{{ $attribute }}]">
@push('scripts')
    <script>
        $("body").on("click",".deleteItem-{{ $attribute }}",deleteItem{{ $attribute }})
        function deleteItem{{ $attribute }}(e) {
            e.preventDefault()
            let input = $(e.target).closest('.form-group').find('input')
            if(input.attr('multiple')){
                let id = $(e.target).attr('data-id')
                let files = [];
                let selector = document.querySelector("[name='delete[{{ $attribute }}]']")
                if(selector.value.length > 0){
                    files = JSON.parse(selector.value)
                }
                files.push(id)
                selector.value = JSON.stringify(files)
                $(e.target).closest('p').remove();
            }else{
                document.querySelector("[name='delete[{{ $attribute }}]']").value = true
                let label = document.querySelector(".deleteItemLabel-{{ $attribute }}")
                if (label) {
                    label.remove()
                }
            }
        }
    </script>
@endpush
