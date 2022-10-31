$(".appendTextarea").on("click",function () {
    let id = parseInt($(".attributes_type").last().attr('data-count'))+1;
    if($(".attributes_type").length === 0){
        id = 0;
    }
    let is_corrent =  '<div class="clearfix"></div><div class="form-group col-sm-2 attributes_type" data-count="'+id+'"><label>Правильный: </label><br><input type="checkbox" data-toggle="toggle" data-onstyle="success" data-offstyle="danger" data-on="Да" data-off="Нет" name="uploads['+id+'][is_correct]"></div>';
    let type =  '<div class="form-group col-sm-9 attributes_type" data-count="'+id+'"><label>Текст: </label>' +
        '<textarea class="form-control" name="uploads['+id+'][title]" id="tinyty-'+id+'"></textarea>' +
        '</div>';
    let form = '<div class="form-group col-sm-1" data-count="'+id+'" style="top:25px">\n' +
        '<a href="#" type="submit" class="btn btn-danger btn-sm deleteFiles"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel">\n' +
        '<circle cx="12" cy="12" r="10">\n' +
        '</circle>\n' +
        '<line x1="15" y1="9" x2="9" y2="15"></line>\n' +
        '<line x1="9" y1="9" x2="15" y2="15"></line>\n' +
        '</svg></a>\n' +
        '</div>';
    $(".form-attributes").append(is_corrent,type,form);
    $("[name='uploads["+id+"][is_correct]']").bootstrapToggle();

    CKEDITOR.replace("tinyty-"+id);
    CKEDITOR.config.height = '200px';
    CKEDITOR.config.width = '100%';
    CKEDITOR.config.display = "block";
    CKEDITOR.config.mathJaxLib = '//cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.4/MathJax.js?config=TeX-AMS_HTML';
    CKEDITOR.config.removePlugins = 'exportpdf';
    CKEDITOR.config.filebrowserUploadUrl = "/admin/upload?bugfix=true";
});
$("form").on("click",".deleteFiles",function (e) {
    e.preventDefault();
    let id = $(this).closest('div').attr('data-count');
    $('[data-count='+id+']').remove();
});
$("#test_form").on("submit",function (e){
    e.preventDefault()
    let validated = $("#is_open").val() === 'on' ? true : false
    let data = $(this).serializeArray()
    for(let item of data){
        if(item.name.indexOf('is_correct') !== -1){
            validated = true
        }
    }

    if(!CKEDITOR.instances.question.getData().length){
        alert("Вы не заполнили поле вопрос")
        return
    }
    if(!validated){
        alert("Выберите один правильный ответ")
        return
    }
    this.submit()
})