$(document).ready(function () {
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