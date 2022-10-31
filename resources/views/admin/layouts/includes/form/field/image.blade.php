<div id="fuSingleFile" class="col-lg-12 layout-spacing">
<div class="custom-file-container" data-upload-id="upload_file_{{ $attribute }}">
    <label>{{ __($label) }} <a href="javascript:void(0);" class="custom-file-container__image-clear deleteItem-{{ $attribute }}" title="Clear Image">x</a></label>
    <label class="custom-file-container__custom-file" >
        <input type="file" class="custom-file-container__custom-file__custom-file-input" accept="image/*" name="{{ $attribute }}">
        <span class="custom-file-container__custom-file__custom-file-control"></span>
    </label>
    <div class="custom-file-container__image-preview" id="custom-file-container__image-preview_{{ $attribute }}"></div>
    @include('admin.layouts.includes.form.error')
    @include('admin.layouts.includes.form.field.delete_item',compact('attribute'))
</div>
</div>
@once
@push('styles')
    <link href="{{ asset('panel/plugins/file-upload/file-upload-with-preview.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@push('scripts')
    <script src="{{ asset('panel/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
@endpush
@endonce
@push('scripts')
    <script>
        var upload_file_{{ $attribute }} = new FileUploadWithPreview('upload_file_{{ $attribute }}')
        @if(isset($entity))
        $("#custom-file-container__image-preview_{{ $attribute }}").css({
            "background-image": "url('{{ asset($entity->{$attribute}) }}')"
        })
        @endif
    </script>
@endpush
