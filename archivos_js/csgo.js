//Cuando se carga el documento
$(document).ready(function () {
    //Al icono asignamos la activación del formulario de correo
    $(".correo").click(activarEmail);
    //Al enviar el comentario, se vacían los campos
    $("#enviar_comentario").click(borrarFormulario);
    
    $("#comentario").on("keypress", function(){
        return limitar(50);
    }).on("keyup", function(){
        informar();
    });
});

function submitForm() {
    var parametros = {
        id: $("#id").val(),
        pass: $("#pass").val()
    };
    alert(parametros);
    $.ajax({
        data: parametros,
        url: '../archivos_php/login.php',
        type: 'POST',
        success: function () {
            alert("hola");
            $("#entrar").text("patata");
        }
    });
}

function activarEmail() {
    $("#email").toggle();
}

function borrarFormulario() {
    $("#comentario").html("");
    location.reload(true);
}

function limitar(max) {
    var texto = $("#comentario").val().length;
    if (texto >= max) {
        return false;
    } else {
        return true;
    }
}

function informar() {
    var texto = $("#comentario").val().length;
    var max = 65535;
    var p = $("#info");
    var restantes = (max - texto);

    if (restantes > 0) {
        p.html("Puedes escribir " + restantes + " carácter(es) más.");
    } else {
        p.html("Has alcanzado el máximo número de carácteres permitidos.");
    }
}