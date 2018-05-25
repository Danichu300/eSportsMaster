//Cuando se carga el documento
$(document).ready(function () {
    //Al botónd e plus le asignamos el cambio de imagen al pasar el ratón por encima, volver al original al quitarlo y mostrar el formulario al clicar
    $(".plus").on("mouseover", function(){
        var imagen = $("#" + this.id);
        imagen.attr("src", "../img/plus-orange.png");
    }).on("mouseout",function(){
        var imagen = $("#" + this.id);
        imagen.attr("src", "../img/plus.png");
    }).on("click", function(){
        $(".formularioInsert").toggle();
    });
});