$('#navigation').load("Navbar.php", function() {
    $('#titulo').text('Movimientos Maquinaria');

    $('#navMenu').removeClass();
    $('#navMenu').hide();
    
    $('#agregarMovimiento').toggle();
    $('#agregarMaquina').toggle();
    $('#agregarOperador').toggle();
    $('#dividerTop').toggle();

});

$('.selectpicker').selectpicker({
    style: '',
    styleBase: 'form-control'
});


$(document).ready(function () {
    //Cambio de panel al seleccionar una pestaña
    switch ($("#idTipoArea").text()) {
        case '0':
            $("#ingreso-tab").addClass('active');
            $("#ingreso-tab-pane").addClass('show active');
            break;

        case '1':
            if ($("#idEsIngreso").text() === '1') {
                $("#ingreso-tab").addClass('active');
                $("#ingreso-tab-pane").addClass('show active');

                $("#egreso-tab").prop('disabled', true);
                $("#general-tab").prop('disabled', true);
                
                checkIngreso();
            } else {
                $("#egreso-tab").addClass('active');
                $("#egreso-tab-pane").addClass('show active');

                $("#ingreso-tab").prop('disabled', true);
                $("#general-tab").prop('disabled', true);
                
                checkEgreso();
            }
            break;
            
        case '2':
            $("#general-tab").addClass('active');
            $("#general-tab-pane").addClass('show active');

            $("#ingreso-tab").prop('disabled', true);
            $("#egreso-tab").prop('disabled', true);
            break;
            
        default:
            break;
    }

    //Obtener etapas del proyecto seleccionado en Ingreso
    $("#inputProyecto").change(function () {
        var idProyecto = $('#inputProyecto').val();
        $.ajax({
            method: "POST",
            url: "php/Etapa_Procesos.php",
            cache: false,
            data: { accion: "obtener", id: idProyecto }
        }).done(function( result ) {
            $("#inputEtapa").empty().html(result);
            $('#inputEtapa').selectpicker('destroy');
            $('#inputEtapa').selectpicker({style: '', styleBase: 'form-control'});
        });
    
    });

    //Obtener etapas del proyecto seleccionado en Egreso
    $("#inputProyectoEg").change(function () {
        var idProyecto = $('#inputProyectoEg').val();
        $.ajax({
            method: "POST",
            url: "php/Etapa_Procesos.php",
            cache: false,
            data: { accion: "obtener", id: idProyecto }
        }).done(function( result ) {
            $("#inputEtapaEg").empty().html(result);
            $('#inputEtapaEg').selectpicker('destroy');
            $('#inputEtapaEg').selectpicker({style: '', styleBase: 'form-control'});
        });
    });

    //Obtener Concepto dependiendo de la Familia seleccionada en Egreso
    $("#inputAreaEg").change(function () {
        var idFamilia = $('#inputAreaEg').val();
        $.ajax({
            method: "POST",
            url: "php/Concepto_Procesos.php",
            cache: false,
            data: { accion: "obtenerA", tipo: "egreso", id: idFamilia }
        }).done(function( result ) {
            $("#inputConceptoA").empty().html(result);
            $('#inputConceptoA').selectpicker('destroy');
            $('#inputConceptoA').selectpicker({style: '', styleBase: 'form-control'});
        });
    });

    //Obtener Concepto B dependiendo del Concepto A seleccionado en Egreso
    $("#inputMaquina").change(function () {
        var idConcepto = $('#inputConceptoA').val();
        $.ajax({
            method: "POST",
            url: "php/Concepto_Procesos.php",
            cache: false,
            data: { accion: "obtenerB", tipo: "egreso", id: idConcepto }
        }).done(function( result ) {
            $("#inputConceptoB").empty().html(result);
            $('#inputConceptoB').selectpicker('destroy');
            $('#inputConceptoB').selectpicker({style: '', styleBase: 'form-control'});
        });
    });

    //Obtener Concepto C dependiendo del Concepto B seleccionado en Egreso
    $("#inputConceptoB").change(function () {
        var idConcepto = $('#inputConceptoB').val();
        $.ajax({
            method: "POST",
            url: "php/Concepto_Procesos.php",
            cache: false,
            data: { accion: "obtenerC", tipo: "egreso", id: idConcepto }
        }).done(function( result ) {
            $("#inputConceptoC").empty().html(result);
            $('#inputConceptoC').selectpicker('destroy');
            $('#inputConceptoC').selectpicker({style: '', styleBase: 'form-control'});
        });
    });

    //Obtener areas en General dependiendo si es Ingreso o Egreso
    $('input[type=radio][name="esIngreso"]').on('change', function() {
        var esIngreso = $(this).val();
        $.ajax({
            method: "POST",
            url: "php/Area_Procesos.php",
            cache: false,
            data: { accion: "obtener", tipo: esIngreso }
        }).done(function( result ) {
            $("#inputOgGeneral").empty().html(result);
            $('#inputOgGeneral').selectpicker('destroy');
            $('#inputOgGeneral').selectpicker({style: '', styleBase: 'form-control'});

            $("#divConceptoGen").hide();
            $("#divConceptoGenA").hide();
            $("#divConceptoGenB").hide();
            $("#divEmpleado").hide();
            $("#divInstitucion").hide();
            $("#divProyectos").hide();
        });
    });

    //Obtener Concepto dependiendo del Area seleccionada en General
    $("#inputOgGeneral").change(function () {
        var idArea = $('#inputOgGeneral').val();
        console.log(idArea);
        $.ajax({
            method: "POST",
            url: "php/Concepto_Procesos.php",
            cache: false,
            data: { accion: "obtenerA", tipo: "general", id: idArea }
        }).done(function( result ) {
            $("#inputConceptoGenA").empty().html(result);
            console.log(result);
            $('#inputConceptoGenA').selectpicker('destroy');
            $('#inputConceptoGenA').selectpicker({style: '', styleBase: 'form-control'});
        });
    });

    $("#inputProyectoMaq").change(function () {
        var idProyecto = $('#inputProyectoMaq').val();
        $.ajax({
            method: "POST",
            url: "php/Etapa_Procesos.php",
            cache: false,
            data: { accion: "obtener", id: idProyecto }
        }).done(function( result ) {
            $("#inputEtapaMaq").empty().html(result);
        });
    });

    $("#divAportador").hide();
    $("#divCliente").hide();

    $("#divProveedor").hide();
    $("#divAportadorEg").hide();
    $("#divClienteEg").hide();
    $("#divAreaEg").hide();
    $("#divConceptoEg").hide();
    $("#divConceptoA").hide();
    $("#divConceptoB").hide();
    $("#divConceptoC").hide();

    $("#divConceptoGen").hide();
    $("#divConceptoGenA").hide();
    $("#divConceptoGenB").hide();
    $("#divEmpleado").hide();
    $("#divInstitucion").hide();
    $("#divProyectos").hide();

    $('.selectpicker').on('change', function() {
        var selectpicker = $(this);
        selectpicker.removeClass('is-valid is-invalid');
        // selectpicker.next('.invalid-feedback').text(''); // Clear any previous error message

        if (!selectpicker.val()) {
            selectpicker.addClass('is-invalid');
            selectpicker.parent().next().show();
        } else {
            selectpicker.addClass('is-valid');
            selectpicker.parent().next().hide();
        }
    });

    $('#inputOgEgreso').on('change', function() {
        var selectpicker = $('#inputAreaEg');
        selectpicker.removeClass('is-valid is-invalid');

        if($(this).val() == '1') {
            selectpicker.addClass('is-invalid');
            //selectpicker.parent().next().show();
        } else {
            selectpicker.addClass('is-valid');
            //selectpicker.parent().next().hide();
        }
        // selectpicker.next('.invalid-feedback').text(''); // Clear any previous error message
    });

    // Handle form submission to prevent invalid selects
    $('#nuevoPagoIng').on('submit', function(event) {
        var selectpicker = $('#nuevoPagoIng').find('.selectpicker');
        if (!selectpicker.val()) {
            selectpicker.addClass('is-invalid');
            selectpicker.parent().next().show();
        } else {
            selectpicker.addClass('is-valid');
            selectpicker.parent().next().hide();
        }

        var invalidSelects = $('#nuevoPagoIng').find('.selectpicker.is-invalid');
        if (invalidSelects.length > 0) {
            invalidSelects.first().focus();
        }
    });

    $('#nuevoPagoEgr').on('submit', function(event) {
        var selectpicker = $('#nuevoPagoEgr').find('.selectpicker');
        if (!selectpicker.val()) {
            selectpicker.addClass('is-invalid');
            selectpicker.parent().next().show();
        } else {
            selectpicker.addClass('is-valid');
            selectpicker.parent().next().hide();
        }

        var selectFamilia = $('#inputAreaEg');
        selectFamilia.removeClass('is-valid is-invalid');

        if($('#inputOgEgreso').val() == '1') {
            selectFamilia.addClass('is-invalid');
            selectFamilia.parent().next().show();
        } else {
            selectFamilia.addClass('is-valid');
            selectFamilia.parent().next().hide();
        }

        var invalidSelects = $('#nuevoPagoEgr').find('.selectpicker.is-invalid');
        if (invalidSelects.length > 0) {
            invalidSelects.first().focus();
        }
    });

});

(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
        }, false)
    })
})()

function getParameterByName(name, url = window.location.search) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

function checkIngreso() {
    switch($('#inputOgIngreso').val()){
        case "1":
            console.log('Banco selected');
            $("#divAportador").hide();
            $("#divCliente").hide();

            $("#inputAportador").prop('required', false);
            $("#inputCliente").prop('required', false);
            break;

        case "2":
            console.log('Aportacion selected');
            $("#divAportador").show();
            $("#divCliente").hide();

            $("#inputAportador").prop('required', true);
            $("#inputCliente").prop('required', false);
            break;

        case "3":
            console.log('Prestamo checked');
            $("#divAportador").show();
            $("#divCliente").hide();

            $("#inputAportador").prop('required', true);
            $("#inputCliente").prop('required', false);
            break;

        case "4":
            console.log('Venta checked');
            $("#divAportador").hide();
            $("#divCliente").show();

            $("#inputAportador").prop('required', false);
            $("#inputCliente").prop('required', true);
            break;
    }
}

function checkEgreso() {
    switch($('#inputOgEgreso').val()){
        case "1":
            console.log('Pago selected');
            $("#divProveedor").show();
            $("#divAportadorEg").hide();
            $("#divClienteEg").hide();
            $("#divAreaEg").show();
            $("#divConceptoEg").removeClass('col-md-3 col-md-6');
            $("#divConceptoEg").addClass('col-md-3');
            $("#divConceptoA").show();
            $("#divConceptoB").show();
            $("#divConceptoC").show();
            $("#inputAreaEg").prop('required', true);
            $("#inputAreaEg").removeClass('is-valid');

            $("#inputProveedorEg").prop('required', true);
            $("#inputAportadorEg").prop('required', false);
            $("#inputClienteEg").prop('required', false);
            $("#inputConceptoA").prop('required', true);
            $("#inputProveedorEg").removeClass('is-valid');
            $("#inputAportadorEg").addClass('is-valid');
            $("#inputClienteEg").addClass('is-valid');
            $("#inputConceptoA").removeClass('is-valid');
            break;

        case "2":
            console.log('Banco selected');
            $("#divProveedor").hide();
            $("#divAportadorEg").hide();
            $("#divClienteEg").hide();
            $("#divAreaEg").hide();
            $("#divConceptoEg").removeClass('col-md-3 col-md-6');
            $("#divConceptoEg").addClass('col-md-6');
            $("#divConceptoEg").show();
            $("#divConceptoA").hide();
            $("#divConceptoB").hide();
            $("#divConceptoC").hide();
            $("#inputAreaEg").prop('disabled', true);
            $("#inputAreaEg").prop('required', false);
            $("#inputAreaEg").addClass('is-valid');
    
            $("#inputProveedorEg").prop('required', false);
            $("#inputAportadorEg").prop('required', false);
            $("#inputClienteEg").prop('required', false);
            $("#inputConceptoA").prop('required', false);
            $("#inputConceptoB").prop('required', false);
            $("#inputConceptoC").prop('required', false);
            $("#inputProveedorEg").addClass('is-valid');
            $("#inputAportadorEg").addClass('is-valid');
            $("#inputClienteEg").addClass('is-valid');
            $("#inputConceptoA").addClass('is-valid');
            $("#inputConceptoB").addClass('is-valid');
            $("#inputConceptoC").addClass('is-valid');
            break;

        case "3":
            console.log('Aportacion selected');
            $("#divProveedor").hide();
            $("#divAportadorEg").show();
            $("#divClienteEg").hide();
            $("#divAreaEg").hide();
            $("#divConceptoEg").removeClass('col-md-3 col-md-6');
            $("#divConceptoEg").addClass('col-md-6');
            $("#divConceptoEg").show();
            $("#divConceptoA").hide();
            $("#divConceptoB").hide();
            $("#divConceptoC").hide();
            $("#inputAreaEg").prop('disabled', true);
            $("#inputAreaEg").prop('required', false);
            $("#inputAreaEg").addClass('is-valid');
    
            $("#inputProveedorEg").prop('required', false);
            $("#inputAportadorEg").prop('required', true);
            $("#inputClienteEg").prop('required', false);
            $("#inputConceptoA").prop('required', false);
            $("#inputConceptoB").prop('required', false);
            $("#inputConceptoC").prop('required', false);
            $("#inputProveedorEg").addClass('is-valid');
            $("#inputAportadorEg").removeClass('is-valid');
            $("#inputClienteEg").addClass('is-valid');
            $("#inputConceptoA").addClass('is-valid');
            $("#inputConceptoB").addClass('is-valid');
            $("#inputConceptoC").addClass('is-valid');
            break;

        case "4":
            console.log('Devolucion selected');
            $("#divProveedor").hide();
            $("#divAportadorEg").hide();
            $("#divClienteEg").show();
            $("#divAreaEg").hide();
            $("#divConceptoEg").hide();
            $("#divConceptoA").hide();
            $("#divConceptoB").hide();
            $("#divConceptoC").hide();
            $("#inputAreaEg").prop('disabled', true);
            $("#inputAreaEg").prop('required', false);
            $("#inputAreaEg").addClass('is-valid');
    
            $("#inputProveedorEg").prop('required', false);
            $("#inputAportadorEg").prop('required', false);
            $("#inputClienteEg").prop('required', true);
            $("#inputConceptoA").prop('required', false);
            $("#inputConceptoB").prop('required', false);
            $("#inputConceptoC").prop('required', false);
            $("#inputProveedorEg").addClass('is-valid');
            $("#inputAportadorEg").addClass('is-valid');
            $("#inputClienteEg").removeClass('is-valid');
            $("#inputConceptoA").addClass('is-valid');
            $("#inputConceptoB").addClass('is-valid');
            $("#inputConceptoC").addClass('is-valid');
            break;
    }
}

function checkGeneral() {
    switch($('#inputOgGeneral').val()){
        case "1":
            console.log('PEG selected');
            $("#divConceptoGen").hide();
            $("#divConceptoGenA").show();
            $("#divConceptoGenB").show();
            $("#divEmpleado").hide();
            $("#divInstitucion").hide();
            $("#divProyectos").hide();
            
            $("#inputConceptoGen").prop('required', false);
            $("#inputConceptoGenA").prop('required', true);
            $("#inputConceptoGenB").prop('required', true);
            $("#inputEmpleado").prop('required', false);
            $("#inputInstitucion").prop('required', false);
            $("#inputProyectoGen").prop('required', false);
            
            $("#inputConceptoGen").addClass('is-valid');
            $("#inputConceptoGenA").removeClass('is-valid');
            $("#inputConceptoGenB").removeClass('is-valid');
            $("#inputEmpleado").addClass('is-valid');
            $("#inputInstitucion").addClass('is-valid');
            $("#inputProyectoGen").addClass('is-valid');
            break;

        case "2":
            console.log('PES selected');
            $("#divConceptoGen").show();
            $("#divConceptoGenA").hide();
            $("#divConceptoGenB").hide();
            $("#divEmpleado").hide();
            $("#divInstitucion").hide();
            $("#divProyectos").hide();

            $("#inputConceptoGen").prop('required', true);
            $("#inputConceptoGenA").prop('required', false);
            $("#inputConceptoGenB").prop('required', false);
            $("#inputEmpleado").prop('required', false);
            $("#inputInstitucion").prop('required', false);
            $("#inputProyectoGen").prop('required', false);
            
            $("#inputConceptoGen").removeClass('is-valid');
            $("#inputConceptoGenA").addClass('is-valid');
            $("#inputConceptoGenB").addClass('is-valid');
            $("#inputEmpleado").addClass('is-valid');
            $("#inputInstitucion").addClass('is-valid');
            $("#inputProyectoGen").addClass('is-valid');
            break;

        case "3":
            console.log('EES selected');
            $("#divConceptoGen").show();
            $("#divConceptoGenA").hide();
            $("#divConceptoGenB").hide();
            $("#divEmpleado").hide();
            $("#divInstitucion").hide();
            $("#divProyectos").hide();

            $("#inputConceptoGen").prop('required', true);
            $("#inputConceptoGenA").prop('required', false);
            $("#inputConceptoGenB").prop('required', false);
            $("#inputEmpleado").prop('required', false);
            $("#inputInstitucion").prop('required', false);
            $("#inputProyectoGen").prop('required', false);
            
            $("#inputConceptoGen").removeClass('is-valid');
            $("#inputConceptoGenA").addClass('is-valid');
            $("#inputConceptoGenB").addClass('is-valid');
            $("#inputEmpleado").addClass('is-valid');
            $("#inputInstitucion").addClass('is-valid');
            $("#inputProyectoGen").addClass('is-valid');
            break;

        case "4":
            console.log('Credito selected');
            console.log($("#esIngresoGen").is(':checked'));
            console.log($("#esEgresoGen").is(':checked'));
            if($("#esIngresoGen").is(':checked')){
                $("#divConceptoGen").hide();
                $("#divConceptoGenA").show();
                $("#divConceptoGenB").show();
                $("#divEmpleado").hide();
                $("#divInstitucion").show();
                $("#divProyectos").hide();
    
                $("#inputConceptoGen").prop('required', false);
                $("#inputConceptoGenA").prop('required', true);
                $("#inputConceptoGenB").prop('required', true);
                $("#inputEmpleado").prop('required', false);
                $("#inputInstitucion").prop('required', true);
                $("#inputProyectoGen").prop('required', false);
                
                $("#inputConceptoGen").addClass('is-valid');
                $("#inputConceptoGenA").removeClass('is-valid');
                $("#inputConceptoGenB").removeClass('is-valid');
                $("#inputEmpleado").addClass('is-valid');
                $("#inputInstitucion").removeClass('is-valid');
                $("#inputProyectoGen").addClass('is-valid');
            } 
            
            if($("#esEgresoGen").is(':checked')) {
                $("#divConceptoGen").show();
                $("#divConceptoGenA").hide();
                $("#divConceptoGenB").hide();
                $("#divEmpleado").hide();
                $("#divInstitucion").show();
                $("#divProyectos").hide();

                $("#inputConceptoGen").prop('required', true);
                $("#inputConceptoGenA").prop('required', false);
                $("#inputConceptoGenB").prop('required', false);
                $("#inputEmpleado").prop('required', false);
                $("#inputInstitucion").prop('required', true);
                $("#inputProyectoGen").prop('required', false);
                
                $("#inputConceptoGen").removeClass('is-valid');
                $("#inputConceptoGenA").addClass('is-valid');
                $("#inputConceptoGenB").addClass('is-valid');
                $("#inputEmpleado").addClass('is-valid');
                $("#inputInstitucion").removeClass('is-valid');
                $("#inputProyectoGen").addClass('is-valid');
            }
            break;

        case "5":
            console.log('Prestamo selected');
            $("#divConceptoGen").show();
            $("#divConceptoGenA").hide();
            $("#divConceptoGenB").hide();
            $("#divEmpleado").show();
            $("#divInstitucion").hide();
            $("#divProyectos").hide();

            $("#inputConceptoGen").prop('required', true);
            $("#inputConceptoGenA").prop('required', false);
            $("#inputConceptoGenB").prop('required', false);
            $("#inputEmpleado").prop('required', true);
            $("#inputInstitucion").prop('required', false);
            $("#inputProyectoGen").prop('required', false);
            
            $("#inputConceptoGen").removeClass('is-valid');
            $("#inputConceptoGenA").addClass('is-valid');
            $("#inputConceptoGenB").addClass('is-valid');
            $("#inputEmpleado").removeClass('is-valid');
            $("#inputInstitucion").addClass('is-valid');
            $("#inputProyectoGen").addClass('is-valid');
            break;

        case "6":
            console.log('Prorrateo Admin selected');
            $("#divConceptoGen").hide();
            $("#divConceptoGenA").show();
            $("#divConceptoGenB").show();
            $("#divEmpleado").hide();
            $("#divInstitucion").hide();
            $("#divProyectos").show();

            $("#inputConceptoGen").prop('required', false);
            $("#inputConceptoGenA").prop('required', true);
            $("#inputConceptoGenB").prop('required', true);
            $("#inputEmpleado").prop('required', false);
            $("#inputInstitucion").prop('required', false);
            $("#inputProyectoGen").prop('required', true);
            
            $("#inputConceptoGen").addClass('is-valid');
            $("#inputConceptoGenA").removeClass('is-valid');
            $("#inputConceptoGenB").removeClass('is-valid');
            $("#inputEmpleado").addClass('is-valid');
            $("#inputInstitucion").addClass('is-valid');
            $("#inputProyectoGen").removeClass('is-valid');
            break;

        case "7":
            console.log('Prorrateo Int selected');
            $("#divConceptoGen").hide();
            $("#divConceptoGenA").show();
            $("#divConceptoGenB").show();
            $("#divEmpleado").hide();
            $("#divInstitucion").hide();
            $("#divProyectos").show();

            $("#inputConceptoGen").prop('required', false);
            $("#inputConceptoGenA").prop('required', true);
            $("#inputConceptoGenB").prop('required', true);
            $("#inputEmpleado").prop('required', false);
            $("#inputInstitucion").prop('required', false);
            $("#inputProyectoGen").prop('required', true);
            
            $("#inputConceptoGen").addClass('is-valid');
            $("#inputConceptoGenA").removeClass('is-valid');
            $("#inputConceptoGenB").removeClass('is-valid');
            $("#inputEmpleado").addClass('is-valid');
            $("#inputInstitucion").addClass('is-valid');
            $("#inputProyectoGen").removeClass('is-valid');
            break;
    }
}