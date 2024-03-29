<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <link rel="stylesheet" href="css/Ventas_Etapa.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div id="navigation" class="top">

    </div>

    <?php
        ob_start();
        include_once('php/conection.php');

        $date = '';
        $conection = new DB(require 'php/config.php');
        $idEtapa = 0;
        $numeroEtapa = 0;
        $nombreProyecto = "";

        if(isset($_GET["id"]))
        {
            $idEtapa = $_GET["id"];
            $proc = $conection->gestionEtapa($idEtapa, 0, 0, 0, 0, 0, 'E');
            $rows = $proc->fetch(PDO::FETCH_ASSOC);

            $numeroEtapa = $rows['numeroEtapa'];
            $nombreProyecto = $rows['nombre'];
        }
    ?>

    <div id="resumen" class="table-responsive">

        <div id="titulo">
            <!--TOTAL DE CLIENTES POR PROYECTO-->
            <h2 class="text-primary">Etapa <?php echo $numeroEtapa;?></h2>
        </div>

        <table id="tabla-resumen" class="table table-hover">
            <thead>
                <tr class="table-primary">
                    <th col-index=1>FOLIO <br>VENTA<br>
                    </th>
                    <th col-index=2>AUTORIZADO
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all">Todos</option>
                        </select>
                    </th>
                    <th col-index=3>CALLE
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all">Todos</option>
                        </select>
                    </th>
                    <th col-index=4>LOTE
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all">Todos</option>
                        </select>
                    </th>
                    <th col-index=5>NOMBRE <br>
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all">Todos</option>
                        </select>
                    </th>
                    <th col-index=6>PRECIO LISTA
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all">Todos</option>
                        </select>
                    </th>
                    <th col-index=7>PRECIO VENTA
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all">Todos</option>
                        </select>
                    </th>
                    <th col-index=8>PROTOTIPO
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all">Todos</option>
                        </select>
                    </th>
                    <th col-index=9>M2 EXCEDENTES
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all">Todos</option>
                        </select>
                    </th>
                    <th col-index=10>M2 EXCEDENTE
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all">Todos</option>
                        </select>
                    </th>
                    <th col-index=11>TOTAL <br>
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all">Todos</option>
                        </select>
                    </th>
                    <th col-index=12>COBRADO
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all">Todos</option>
                        </select>
                    </th>
                    <th col-index=13>PENDIENTE
                        <select class="table-filter" onchange="filter_rows()">
                            <option value="all">Todos</option>
                        </select>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $procedure = $conection->resumenVentasEtapa($idEtapa);
                    while ($rows = $procedure->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        if ($rows['folioVenta'] === "-") {
                            echo "<td>" . $rows['folioVenta'] . "</td>";
                        } else {
                            echo "<td><a onclick=\"sendVariables('Confirmacion_Compra.php', " . $rows['idLote'] . ", 'id');\">" . $rows['folioVenta'] . "</a></td>";
                        }
                        if ($rows['autorizado']) {
                            echo "<td>Autorizado</td>";
                        } else {
                            echo "<td>No autorizado</td>";
                        }
                        echo "<td>" . $rows['calle'] . "</td>";
                        echo "<td>" . $rows['numeroLote'] . "</td>";
                        echo "<td><a onclick=\"sendVariables('Expediente.php', " . $rows['idCliente'] . ", 'id');\">" . $rows['nombreCliente'] . "</a></td>";
                        echo "<td>$" . number_format($rows['precioLista'], 2) . "</td>";
                        if (is_null($rows['precioVenta'])) {
                            echo "<td> - </td>";
                        } else {
                            echo "<td>$" . number_format($rows['precioVenta'], 2) . "</td>";
                        }
                        echo "<td>" . $rows['prototipo'] . "</td>";
                        echo "<td>" . $rows['metrosExcedentes'] . "</td>";
                        echo "<td>$" . number_format($rows['m2Excedente'], 2) . "</td>";
                        echo "<td>$" . number_format($rows['total'], 2) . "</td>";
                        echo "<td>$" . number_format($rows['cobrado'], 2) . "</td>";
                        echo "<td>$" . number_format($rows['pendiente'], 2) . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/Ventas_Detalle.js"></script>
</body>

</html>