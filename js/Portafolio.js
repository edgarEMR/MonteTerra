$('#navigation').load("Navbar.php", function() {
    $('#titulo').text('Portafolio');

    $('#crearProyecto').toggle();
    $('#agregarPago').toggle();
    $('#crearCotizacion').toggle()
    $('#crearCliente').toggle();
    $('#agregarAbono').toggle();
    
    $('#agregarAportador').toggle();
    $('#agregarCredito').toggle();
    $('#agregarProveedor').toggle();
    $('#agregarPrestamo').toggle();
    $('#dividerBottom').toggle();

    $('#atras').on("click", function () {
        location.href = 'Proyectos.php';
    });

    $('#inputProyectoID').val(getParameterByName('id'));
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

function getParameterByName(name, url = window.location.search) {
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}