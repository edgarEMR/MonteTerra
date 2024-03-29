<?php 
ob_start();
include_once('../php/conection.php');
include_once('../modelos/Etapa.php');

if (isset($_POST['accion'])) {

    if ($_POST['accion'] == 'editar') {
        $idProyecto = $_POST['proyectoID'];
        $coneccion = new DB(require 'php/config.php');
        
        try {

            $procedure = $coneccion->gestionLote(
                $_POST['loteID'],
                '',
                0,
                0,
                $_POST['autorizado'] ?: 0,
                $_POST['parque'] ?: 0,
                $_POST['esquina'] ?: 0,
                $_POST['precioFinal'],
                0,
                0,
                '',
                0,
                $_POST['prototipo'],
                $_POST['manzana'],
                0,
                0,
                0, 
                "U");

            $resultado = $procedure->fetch(PDO::FETCH_ASSOC);

            header('Location: ../Nueva_Etapa.php?id='. $idProyecto .'&successLote=1');
        } catch (PDOException $err) {
            $errorCode = $err->getCode();
            echo $err . ' ' . $errorCode;
            header('Location: ../Nueva_Etapa.php?id='. $idProyecto .'&successLote=0');
        }
            
    }

    if ($_POST['accion'] == 'select') {
        $idLote = $_POST['id'];
        $coneccion = new DB(require 'php/config.php');
        
        try {   

            $procedure = $coneccion->gestionLote($idLote, '', 0, 0, 0, 0, 0, 0, 0, 0,'',0, 0, 0, 0, 0, 0, "E");
            
            $resultado = $procedure->fetchAll(PDO::FETCH_DEFAULT);
            echo json_encode($resultado[0]);
        } catch (PDOException $err) {
            $errorCode = $err->getCode();
            echo $err . ' ' . $errorCode;
        }
            
    }

    if ($_POST['accion'] == 'obtener') {
        $idCalle = $_POST['calle'];
        $idManzana = $_POST['manzana'];
        $coneccion = new DB(require 'php/config.php');
        
        try {   

            $procedure = $coneccion->gestionLote(0, '', 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, $idCalle, 0, 0, "S");
            
            while ($rows = $procedure->fetch(PDO::FETCH_ASSOC)) {
                if ($rows['idVendedor'] == null && $rows['idManzana'] == $idManzana) {
                    echo "<option value=".$rows['idLote'].">".$rows['numeroLote']."</option>";
                }
            }
            
        } catch (PDOException $err) {
            $errorCode = $err->getCode();
            echo $err . ' ' . $errorCode;
        }
            
    }
}
?>