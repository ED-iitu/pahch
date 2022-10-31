<div class="custom-file">
        @if(isset($is_multiple) && $is_multiple)
            <input name="{{ $attribute }}[]" type="file" class="custom-file-input" multiple="multiple" id="{{ $attribute }}">
        @else
            <input name="{{ $attribute }}" type="file" class="custom-file-input" id="{{ $attribute }}">
        @endif
        <label class="custom-file-label" for="customFile">
            {{ ___($label) }}
            @if (isset($helper))
                <span class="is-details">
                    {!! ___($helper) !!}
                </span>
            @endif
        </label>
        @include('admin.layouts.includes.form.field.delete_item',compact('attribute'))
    </div>
    <div class="clearfix"></div>
    @if(isset($entity))
        @if(isset($is_multiple) && $is_multiple)
            @if($entity->files->isEmpty() && $entity->file)
                <p style="margin:20px" class="deleteItemLabel-{{ $attribute }}"><a href="{{ asset($entity->$attribute) }}" download>{{ ___('Скачать файл') }}</a><a style="margin-left: 10px" class="custom-file-container__image-clear deleteItem-{{ $attribute }}" title="Clear">x</a></p>
            @else
                @foreach($entity->files as $file)
                    <p style="margin:20px" class="deleteItemLabel-{{ $attribute }}"><a href="{{ asset($file->link) }}" download="{{ $file->getFileName() }}">{{ $file->getFileName() }}</a><a style="margin-left: 10px"  class="custom-file-container__image-clear deleteItem-{{ $attribute }}" title="Clear" data-id="{{ $file->id }}">x</a></p>
                @endforeach
                @endif
            @else
            @if($entity->{$attribute})
            <p style="margin:20px" class="deleteItemLabel-{{ $attribute }}"><a href="{{ asset($entity->$attribute) }}" download>{{ ___('Скачать файл') }}</a><a style="margin-left: 10px" class="custom-file-container__image-clear deleteItem-{{ $attribute }}" title="Clear">x</a></p>
            @endif
            @endif
    @endif
    @include('admin.layouts.includes.form.error')
