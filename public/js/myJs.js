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


/*barra de progresso*/

const uploadForm = document.getElementById("my_form");
const inFile = document.getElementById("inFile");
const progressBarFill = document.querySelector("#progressBar > .progress-bar-fill");
const progressBarText = progressBarFill.querySelector(".progress-bar-text");
token = document.querySelector('meta[name="csrf-token"]').content;

uploadForm.addEventListener("submit", uploadFile);

function uploadFile(e) {
    /*e.preventDefault();*/
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "{{ url('/answer')}}");
    xhr.setRequestHeader('X-CSRF-TOKEN', token);
    xhr.upload.addEventListener("progress", e=> {
        const percent = e.lengthComputable ? (e.loaded / e.total) * 100 : 0;
        progressBarFill.style.width = percent.toFixed(2) + "%";
        progressBarText.textContent = percent.toFixed(2) + "%";
    })


    xhr.send(new FormData(uploadForm));

}


