<form method="post" action="{{ url('/manager/upload/tinymce') }}" enctype="multipart/form-data"
      class="is-display_none js-tinymce__form">
    <input type="hidden" name="tinymce" value="1"/>
    <input type="file" name="image" accept="image/*" class="js-tinymce__file"/>
</form>
