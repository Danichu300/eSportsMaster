$(document).ready(function () {
    /*   $("#enviar").click(function () {
     var id = $("#id").val();
     var pass = $("#pass").val();
     
     $.ajax({
     type: "POST",
     url: "../archivos_php/login.php",
     data: {id: id, pw: pass}
     });
     });*/
    //$("#enviar_admin").click(submitForm);
    $(".correo").click(activarEmail);
    $("#enviar_comentario").click(borrarFormulario);
    $("#comentario").on("keypress", function(){
        return limitar(255);
    }).on("keyup", function(){
        informar();
    });
});

/*function submitForm() {
 var data = $("#login-form").serialize();
 console.log(data);
 $.ajax({
 type: 'POST',
 url: '../archivos_php/login.php',
 data: data,
 success: function (response) {
 console.log(response);
 alert(response);
 if (response == "ok") {
 alert("funciona lokete");
 } else {
 alert("pos no funsiona lokete :/");
 }
 }
 });
 return false;
 }*/

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
    $("#usuario").html("");
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