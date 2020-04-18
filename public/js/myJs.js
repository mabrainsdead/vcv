/*Adiciona e remove campos de input*/

$(document).ready(function(){
    var i=1;
    $('#add').click(function(){
        i++;
        $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="file" name="images[]" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
    });
    $(document).on('click', '.btn_remove', function(){
        var button_id = $(this).attr("id");
        $('#row'+button_id+'').remove();
    });

});

/*Funcao do spinner*/

$("#my_form").submit(function (event) {
    $('#divMsg').show();
});



$("#navBar").onload(function () {
alert("teste");
})





