<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maquinaria</title>
    <link rel="stylesheet" href="css/Construccion.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
    <div id="navigation" class="top">

    </div>
    
    <div id="prospectos" class="table-responsive">
        
        <div class="register-form">
        <form id="registroProyecto" action="php/Aportador_Procesos.php" class="row needs-validation" method="POST" enctype="multipart/form-data" novalidate>
            <!-- <div class="form-group input-group-sm col-md-6">
                <label for="nombreProyecto">RFC</label>
                <input type="text" name="RFCAportador" class="form-control" id="inputRFC" placeholder="XAXX010101000"
                    pattern="[A-Z0-9]{12,13}" value="" required>
                <small id="RFCUHelp" class="form-text text-muted">Máximo 13 caracteres.</small>
                <div class="invalid-feedback">
                    Ingrese un nombre válido.
                </div>
            </div> -->
            <div class="form-group input-group-sm col-md-12">
                <label for="nombreProyecto">Operador</label>
                <input type="text" name="nombreAportador" class="form-control" id="inputNombre"
                    pattern="[A-Za-z0-9À-ÿ\u00f1\u00d1 ]{3,}" value="" required>
                <small id="nombreUHelp" class="form-text text-muted">Mínimo 3 caracteres.</small>
                <div class="invalid-feedback">
                    Ingrese un nombre válido.
                </div>
            </div>
            <div class="form-group input-group-sm col-md-12">
                <label for="nombreProyecto">Sueldo</label>
                <input type="text" name="nombreAportador" class="form-control" id="inputNombre"
                    pattern="[A-Za-z0-9À-ÿ\u00f1\u00d1 ]{3,}" value="" required>
                <div class="invalid-feedback">
                    Ingrese un nombre válido.
                </div>
            </div>
            <div class="form-group col-md-12">
                <label for="inputProyecto">Maquina</label>
                <select class="form-select" name="proyecto" id="inputProyecto" required>
                    <option selected disabled value="">Elige...</option>
                    </select>
                <div class="invalid-feedback">
                    Elija una opción.
                </div>
            </div>
            <div class="form-group d-grid mt-3">
                <input type="hidden" name="accion" value="<?php echo $accion;?>">
                <button class="btn btn-block btn-primary" type="submit">Agregar</button>
            </div>
        </form>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/Nueva_Maquina.js"></script>
</body>
</html>