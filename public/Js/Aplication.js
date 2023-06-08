// Mostrar y ocultar Password
function MostrarPassword() {
    var tipo = document.getElementById("password")
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}

function MostrarPasswordConfirm() {
    var tipo = document.getElementById("password-confirm")
    if (tipo.type == "password") {
        tipo.type = "text";
    } else {
        tipo.type = "password";
    }
}

// Input de buscar registros
function submitForm() {
    document.querySelector('form').submit()
}

$(".openbtn").on("click", function () {
    $(".ui.sidebar").toggleClass("very thin icon");
    $(".asd").toggleClass("marginlefting");
    $(".sidebar z").toggleClass("displaynone");
    $(".ui.accordion").toggleClass("displaynone");
    $(".ui.dropdown.item").toggleClass("displayblock");

    $(".logo").find('img').toggle();

})
$(".ui.dropdown").dropdown({
    allowCategorySelection: true,
    transition: "fade up",
    context: 'sidebar',
    on: "hover"
});

$('.ui.accordion').accordion({
    selector: {

    }
});

// Mostrar y ocultar messajes de semantic ui 
$('.ui.dropdown').dropdown();

$('.message .close')
    .on('click', function () {
        $(this)
            .closest('.message')
            .transition('fade');
    });

//Script para mostrar el modal, para hacer el pedido y ver los datos del cliente
$(document).ready(function () {
    $('[data-target=".ui.modal"]').click(function () {
        $('.ui.modal').modal('show');
    });
});
