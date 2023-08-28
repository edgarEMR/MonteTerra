$("#navigation").load("Navbar.php", function () {
  $("#titulo").text("Prorrateo");

  $("#navConst").removeClass();
  $("#navConst").hide();

  $("#crearProyecto").toggle();
  $("#agregarPago").toggle();
  $("#crearPresupuesto").toggle();
  $("#crearCotizacion").toggle();
  $("#crearCliente").toggle();
  $("#agregarAbono").toggle();
  $("#dividerTop").toggle();
  $("#agregarAportador").toggle();
  $("#agregarCredito").toggle();
  $("#agregarProveedor").toggle();
  $("#agregarPrestamo").toggle();
  $("#gestionProrrateo").toggle();
  $("#dividerBottom").toggle();

  $("#atras").on("click", function () {
    history.back();
  });
});

$(".selectpicker").selectpicker({
  style: "",
  styleBase: "form-control",
});

(() => {
  "use strict";

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll(".needs-validation");

  // Loop over them and prevent submission
  Array.from(forms).forEach((form) => {
    form.addEventListener(
      "submit",
      (event) => {
        if (!form.checkValidity()) {
          event.preventDefault();
          event.stopPropagation();
        }

        form.classList.add("was-validated");
      },
      false
    );
  });
})();

$(document).ready(function () {
  if (getParameterByName("error") == 1) {
    $("#modalMensaje").find(".modal-title").text("Atención");
    $("#modalMensaje")
      .find(".modal-body")
      .text("Error al agregar el Credito, intente de nuevo");
    $("#modalMensaje").modal("show");
  }

  $(".selectpicker").on("change", function () {
    var selectpicker = $(this);
    selectpicker.removeClass("is-valid is-invalid");
    // selectpicker.next('.invalid-feedback').text(''); // Clear any previous error message

    if (!selectpicker.val()) {
      selectpicker.addClass("is-invalid");
      selectpicker.parent().next().show();
    } else {
      selectpicker.addClass("is-valid");
      selectpicker.parent().next().hide();
    }
  });

  $("#registroCredito").on("submit", function (event) {
    var selectpicker = $("#registroCredito").find(".selectpicker");
    if (!selectpicker.val()) {
      selectpicker.addClass("is-invalid");
      selectpicker.parent().next().show();
    } else {
      selectpicker.addClass("is-valid");
      selectpicker.parent().next().hide();
    }

    var invalidSelects = $("#registroCredito").find(".selectpicker.is-invalid");
    if (invalidSelects.length > 0) {
      invalidSelects.first().focus();
    }
  });
});

function getParameterByName(name, url = window.location.search) {
  name = name.replace(/[\[\]]/g, "\\$&");
  var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
    results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return "";
  return decodeURIComponent(results[2].replace(/\+/g, " "));
}