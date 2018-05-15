$(document).ready(function (){
    $(".correo").click(activarEmail);
});

function activarEmail() {
    $("#email").toggle();
}