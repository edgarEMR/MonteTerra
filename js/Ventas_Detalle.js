$('#navigation').load("Navbar.php", function() {
    $('#titulo').text('Ventas');
    
    $('#crearProyecto').toggle();
    $('#crearPresupuesto').toggle();
    $('#agregarPago').toggle();
    $('#crearCotizacion').toggle();
    $('#dividerTop').toggle();
    $('#agregarAportador').toggle();
    $('#agregarCredito').toggle();
    $('#agregarProveedor').toggle();
    $('#agregarPrestamo').toggle();

    $('#logo').attr("href", "Ventas.php");
    $('#atras').on("click", function () {
        history.back();
    });
    /*$('#agregarAbono').on("click", function () {
        location.href = 'Detalle_Abono.php';
    });*/
});

function sendVariables(pagina, id, name){
    var body = document.getElementsByTagName('body')[0];
    var sendID = id;
    //var sessionImagen = document.getElementById('sessionImagen').value;
    var form = document.createElement('form'); //CREATE FORM
    form.setAttribute('method','get'); //SET FORM ATTRIBUTES
    form.setAttribute('style','display:none');
    form.setAttribute('action',pagina);
    body.appendChild(form); //APPEND FORM TO BODY
    var proyectoID = document.createElement('input'); //CREATE INPUT
    proyectoID.setAttribute('type','hidden'); //SET INPUT ATTRIBUTES
    proyectoID.setAttribute('name', name);
    proyectoID.setAttribute('value',sendID);
    form.appendChild(proyectoID); //APPEND INPUT TO FORM
    form.submit(); //SUBMIT FORM
}