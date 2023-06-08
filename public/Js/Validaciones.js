//Validacion del campo name
$(document).ready(function () {
    $('#myForm').on('submit', function (event) {
        var name = $('#name').val();
        if (name.trim() === '') {
            $('#nameError').addClass('hidden');
            if ($('#name').is(':invalid')) {
                $('#nameError').removeClass('hidden');
                event.preventDefault();
            } else {
                $('#nameError').addClass('hidden');
            }
        } else if (/^\s/.test(name)) {
            $('#nameError').removeClass('hidden');
            event.preventDefault();
        } else {
            $('#nameError').addClass('hidden');
        }
    });
});

//Validacion del campo direccion
$(document).ready(function () {
    $('#myForm').on('submit', function (event) {
        var name = $('#direccion').val();
        if (name.trim() === '') {
            $('#direccionError').addClass('hidden');
            if ($('#direccion').is(':invalid')) {
                $('#direccionError').removeClass('hidden');
                event.preventDefault();
            } else {
                $('#direccionError').addClass('hidden');
            }
        } else if (/^\s/.test(name)) {
            $('#direccionError').removeClass('hidden');
            event.preventDefault();
        } else {
            $('#direccionError').addClass('hidden');
        }
    });
});

//Validacion del campo password
$(document).ready(function () {
    $('#myForm').on('submit', function (event) {
        var name = $('#password').val();
        if (name.includes(' ')) {
            $('#passwordError').removeClass('hidden');
            event.preventDefault();
        } else {
            $('#passwordError').addClass('hidden');
        }
    });
});

//Validacion del campo nombre de la carta
$(document).ready(function () {
    $('#cartaForm').on('submit', function (event) {
        var name = $('#nombre').val();
        if (name.trim() === '') {
            $('#nombreError').addClass('hidden');
            if ($('#nombre').is(':invalid')) {
                $('#nombreError').removeClass('hidden');
                event.preventDefault();
            } else {
                $('#nombreError').addClass('hidden');
            }
        } else if (/^\s/.test(name)) {
            $('#nombreError').removeClass('hidden');
            event.preventDefault();
        } else {
            $('#nombreError').addClass('hidden');
        }
    });
});

$(document).ready(function () {
    $('#productoForm').on('submit', function (event) {
        var name = $('#nombre').val();
        if (name.trim() === '') {
            $('#nombreError').addClass('hidden');
            if ($('#nombre').is(':invalid')) {
                $('#nombreError').removeClass('hidden');
                event.preventDefault();
            } else {
                $('#nombreError').addClass('hidden');
            }
        } else if (/^\s/.test(name)) {
            $('#nombreError').removeClass('hidden');
            event.preventDefault();
        } else {
            $('#nombreError').addClass('hidden');
        }
    });
});

$(document).ready(function () {
    $('#restauranteForm').on('submit', function (event) {
        var name = $('#nombre').val();
        if (name.trim() === '') {
            $('#nombreError').addClass('hidden');
            if ($('#nombre').is(':invalid')) {
                $('#nombreError').removeClass('hidden');
                event.preventDefault();
            } else {
                $('#nombreError').addClass('hidden');
            }
        } else if (/^\s/.test(name)) {
            $('#nombreError').removeClass('hidden');
            event.preventDefault();
        } else {
            $('#nombreError').addClass('hidden');
        }
    });
});

$(document).ready(function () {
    $('#restauranteForm').on('submit', function (event) {
        var name = $('#direccion').val();
        if (name.trim() === '') {
            $('#direccionError').addClass('hidden');
            if ($('#direccion').is(':invalid')) {
                $('#direccionError').removeClass('hidden');
                event.preventDefault();
            } else {
                $('#direccionError').addClass('hidden');
            }
        } else if (/^\s/.test(name)) {
            $('#direccionError').removeClass('hidden');
            event.preventDefault();
        } else {
            $('#direccionError').addClass('hidden');
        }
    });
});

$(document).ready(function () {
    $('#municipioForm').on('submit', function (event) {
        var name = $('#NombreMunicipio').val();
        if (name.trim() === '') {
            $('#nombreError').addClass('hidden');
            if ($('#NombreMunicipio').is(':invalid')) {
                $('#nombreError').removeClass('hidden');
                event.preventDefault();
            } else {
                $('#nombreError').addClass('hidden');
            }
        } else if (/^\s/.test(name)) {
            $('#nombreError').removeClass('hidden');
            event.preventDefault();
        } else {
            $('#nombreError').addClass('hidden');
        }
    });
});

//Validacion del campo password
$(document).ready(function () {
    $('#resetForm').on('submit', function (event) {
        var name = $('#password').val();
        if (name.includes(' ')) {
            $('#passwordError').removeClass('hidden');
            event.preventDefault();
        } else {
            $('#passwordError').addClass('hidden');
        }
    });
});
