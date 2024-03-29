<?php
    
    class DB
    {
        private $config;
        private $host;
        private $db;
        private $user;
        private $password;
        private $charset;
        private $current_date;

        function __construct(array $config)
        {   
            $this->config = $config;
            $this->host = $this->config['host'];
            $this->db = $this->config['database'];
            $this->user = $this->config['user'];
            $this->password = $this->config['password'];
            $this->charset = $this->config['charset'];

            date_default_timezone_set('America/Monterrey');

            $date = date('Y-m-d');
            $dayNumber = date("w", strtotime($date));
            if ($dayNumber === 5) {
                $this->current_date = $date;
            } else {
                $this->current_date = date_format(date_sub(date_create($date), date_interval_create_from_date_string(($dayNumber + 2) . ' days')), 'Y-m-d');
            }
            
        }
        function connect()
        {
            try {
                $connection = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
                $options = [
                    PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES  => false
                ];

                $pdo = new PDO($connection, $this->user, $this->password);

                return $pdo;
            } catch (PDOException $e) {
                print_r('Error connection: ' . $e->getMessage());
            }
        }

        function inicioSesion($correo, $contraseña) {
            return $this->connect()->query("CALL spInicioSesion('$correo', '$contraseña')");
        }

        function gestionUsuario($idUsuario, $nombre, $correo, $contraseña, $idDepa, $opcion)
        {
            return $this->connect()->query("CALL spGestionUsuario($idUsuario, '$nombre', '$correo', '$contraseña', $idDepa, '$opcion')");
        }

        function obtenerResumen($dateIni, $dateEnd) {
            return $this->connect()->query("CALL spObtenerResumen('$dateIni', '$dateEnd')");
        }

        function obtenerPortafolio($idPago, $idProyecto) {
            return $this->connect()->query("CALL spObtenerPortafolio($idPago, $idProyecto)");
        }

        function obtenerPEG() {
            return $this->connect()->query("CALL spObtenerPEG()");
        }

        function obtenerGeneral() {
            return $this->connect()->query("CALL spObtenerGeneral()");
        }
        
        function obtenerTipoPago() {
            return $this->connect()->query("CALL spObtenerTipoPago()");
        }

        function obtenerTipoVivienda() {
            return $this->connect()->query("CALL spObtenerTipoVivienda()");
        }

        function gestionProyectoVivienda($idProyecto, $idVivienda, $opcion) {
            return $this->connect()->query("CALL spGestionProyectoVivienda($idProyecto, $idVivienda, '$opcion')");
        }

        function obtenerProyectos() {
            return $this->connect()->query("CALL spObtenerProyectos()");
        }

        function obtenerBancos($dateIni, $dateEnd) {
            return $this->connect()->query("CALL spObtenerBancos('$dateIni', '$dateEnd')");
        }

        function obtenerPagoBanco($tipoPago) {
            return $this->connect()->query("CALL spObtenerPagoBanco($tipoPago)");
        }

        function obtenerFamilias() {
            return $this->connect()->query("CALL spObtenerFamilias()");
        }

        function obtenerConceptos($idBuscado, $tipo, $nivelConcepto) {
            return $this->connect()->query("CALL spObtenerConceptos($idBuscado, '$tipo', '$nivelConcepto')");
        }

        function obtenerAreas($tipoArea) {
            return $this->connect()->query("CALL spObtenerAreas($tipoArea)");
        }
        
        function obtenerProveedores() {
            return $this->connect()->query("CALL spObtenerProveedores()");
        }

        function gestionProyecto($idProyecto, $nombre, $totalCasas, $totalEtapas, $prototipos, $manzanas, $metrosBase, $opcion)
        {
            
            return $this->connect()->query("CALL spGestionProyecto($idProyecto, '$nombre', '$totalCasas', '$totalEtapas',
                                                                    $prototipos, $manzanas, $metrosBase, '$opcion')");
        }

        function gestionPrototipo($idPrototipo, $nombre, $metros, $idProyecto, $opcion)
        {
            return $this->connect()->query("CALL spGestionPrototipo($idPrototipo, '$nombre', $metros, $idProyecto, '$opcion')");
        }

        function gestionManzana($idManzana, $nombre, $numero, $idProyecto, $idCalle, $opcion)
        {
            return $this->connect()->query("CALL spGestionManzana($idManzana, '$nombre', $numero, $idProyecto, $idCalle, '$opcion')");
        }

        function gestionEtapa($idEtapa, $numeroEtapa, $cantidadCasas, $precioExcedente, $totalMinimo, $idProyecto, $opcion)
        {
            
            return $this->connect()->query("CALL spGestionEtapa($idEtapa, $numeroEtapa, $cantidadCasas, $precioExcedente, $totalMinimo,
                                                                $idProyecto, '$opcion')");
        }

        function gestionCalle($idCalle, $nombre, $totalLotes, $idEtapa, $opcion)
        {
            
            return $this->connect()->query("CALL spGestionCalle($idCalle, '$nombre', $totalLotes, $idEtapa, '$opcion')");
        }

        function gestionLote($idLote, $numeroLote, $metrosExcedentes, $precioLista, $autorizado, $esParque, $esEsquina, $precioFinal,
                    $precioVenta, $montoSeparacion, $formaPago, $idTipoPago, $idPrototipo, $idManzana, $idCalle, $idCliente, $idVendedor, $opcion)
        {
            
            return $this->connect()->query("CALL spGestionLote($idLote, '$numeroLote', $metrosExcedentes, $precioLista, $autorizado, $esParque, $esEsquina,
            $precioFinal, $precioVenta, $montoSeparacion, '$formaPago', $idTipoPago, $idPrototipo, $idManzana, $idCalle, $idCliente, $idVendedor, '$opcion')");
        }

        function informacionComprobante($idLote)
        {
            return $this->connect()->query("CALL spInformacionComprobante($idLote)");
        }

        function gestionPago($idPago, $concepto, $importe, $esIngreso, $idTipoPago, $idArea, $idUsuario, 
                            $esGeneral, $idProyecto, $idEtapa, $idFamilia, $idConcepto, $idConceptoB, $comentario,
                            $idCliente, $idAportador, $idBanco, $idProveedor, $idEmpleado, $opcion)
        {
            
            return $this->connect()->query("CALL spGestionPago($idPago, '$concepto', $importe, $esIngreso, $idTipoPago, $idArea, $idUsuario,
                                                                $esGeneral, $idProyecto, $idEtapa, $idFamilia, $idConcepto, $idConceptoB, $comentario,
                                                                $idCliente, $idAportador, $idBanco, $idProveedor, $idEmpleado, '$opcion')");
        }

        function gestionPagoProgramacion($idPago, $concepto, $importe, $esIngreso, $idTipoPago, $idArea, $idUsuario, 
                            $esGeneral, $idProyecto, $idEtapa, $idFamilia, $idConcepto, $idConceptoB, $comentario,
                            $idCliente, $idAportador, $idBanco, $idProveedor, $idEmpleado, $idPagoMaquinaria, $opcion)
        {
            
            return $this->connect()->query("CALL spGestionPagoProgramacion($idPago, '$concepto', $importe, $esIngreso, $idTipoPago, $idArea, $idUsuario,
                                                                $esGeneral, $idProyecto, $idEtapa, $idFamilia, $idConcepto, $idConceptoB, $comentario,
                                                                $idCliente, $idAportador, $idBanco, $idProveedor, $idEmpleado, $idPagoMaquinaria, '$opcion')");
        }

        function obtenerPagosProgramados() {
            return $this->connect()->query("CALL spObtenerPagosProgramados()");
        }
        
        function guardarPago($idPago)
        {
            return $this->connect()->query("CALL spGuardarPago($idPago)");
        }   

        function gestionCliente($idCliente, $nombre, $segundoNombre, $apellidoPaterno, $apellidoMaterno, $email, $telefono, $tipoVivienda, 
                                $tipoCredito, $credito, $medio, $esProspecto, $idProyecto, $idEtapa, $idPrototipo, $idVendedor, $opcion)
        {
            
            return $this->connect()->query("CALL spGestionCliente($idCliente, '$nombre', '$segundoNombre', '$apellidoPaterno', '$apellidoMaterno', 
                            '$email', '$telefono', '$tipoVivienda', '$tipoCredito', $credito, '$medio', $esProspecto, $idProyecto, $idEtapa, $idPrototipo, $idVendedor, '$opcion')");
        }

        function obtenerProspectos() {
            return $this->connect()->query("CALL spObtenerProspectos()");
        }

        function existeProspecto($nombre, $apellido, $telefono) {
            return $this->connect()->query("CALL spExisteProspecto('$nombre', '$apellido', '$telefono')");
        }

        function obtenerClientes($idProyecto, $idEtapa) {
            return $this->connect()->query("CALL spObtenerClientes($idProyecto, $idEtapa)");
        }

        function obtenerEmpleados() {
            return $this->connect()->query("CALL spObtenerEmpleados()");
        }

        function resumenVentas() {
            return $this->connect()->query("CALL spResumenVentas()");
        }

        function resumenVentasProyecto($idProyecto) {
            return $this->connect()->query("CALL spResumenVentasProyecto($idProyecto)");
        }

        function detalleVentasProyecto($idProyecto) {
            return $this->connect()->query("CALL spDetalleVentasProyecto($idProyecto)");
        }

        function resumenVentasEtapa($idEtapa) {
            return $this->connect()->query("CALL spResumenVentasEtapa($idEtapa)");
        }

        function gestionPresupuesto($idPresupuesto, $concepto, $importe, $fecha, $idArea, $idProyecto, $opcion)
        {
            
            return $this->connect()->query("CALL spGestionPresupuesto($idPresupuesto, '$concepto', $importe, '$fecha', 
                                                                $idArea, $idProyecto, '$opcion')");
        }

        function gestionCotizacion($idCotizacion, $concepto, $importe, $fecha, $idArea, $idProyecto, $idEtapa, $opcion)
        {
            
            return $this->connect()->query("CALL spGestionCotizacion($idCotizacion, '$concepto', $importe, '$fecha', 
                                                                $idArea, $idProyecto, $idEtapa, '$opcion')");
        }

        function spObtenerCotizacion($idProyecto, $idEtapa, $idNivel) {
            return $this->connect()->query("CALL spObtenerCotizacion($idProyecto, $idEtapa, $idNivel)");
        }

        function gestionAportador($idAportador, $RFC, $nombre, $esPrestamista, $idProyecto, $opcion)
        {
            
            return $this->connect()->query("CALL spGestionAportador($idAportador, '$RFC', '$nombre', $esPrestamista, $idProyecto, '$opcion')");
        }

        function gestionBanco($idTipoPago, $nombre, $opcion)
        {
            
            return $this->connect()->query("CALL spGestionBanco($idTipoPago, '$nombre', '$opcion')");
        }

        function porPagarAportador() {
            return $this->connect()->query("CALL spPorPagarAportador()");
        }

        function spObtenerAportaciones($idProyecto) {
            return $this->connect()->query("CALL spObtenerAportaciones($idProyecto)");
        }

        function porPagarBanco() {
            return $this->connect()->query("CALL spPorPagarBanco()");
        }

        function spObtenerCreditos($idProyecto) {
            return $this->connect()->query("CALL spObtenerCreditos($idProyecto)");
        }

        function porCobrar() {
            return $this->connect()->query("CALL spPorCobrar()");
        }

        function presupuestoFamilia($idProyecto) {
            return $this->connect()->query("CALL spPresupuestoFamilia($idProyecto)");
        }

        function gestionMaquinaria($idMaquinaria, $nombre, $costo, $idRecu, $opcion) {
            return $this->connect()->query("CALL spGestionMaquinaria($idMaquinaria, '$nombre', $costo, $idRecu, '$opcion')");
        }

        function gastoMaquinaria() {
            return $this->connect()->query("CALL spGastoMaquinaria()");
        }

        function gestionOperador($idOperador, $nombre, $sueldo, $idMaquinaria, $opcion) {
            return $this->connect()->query("CALL spGestionOperador($idOperador, '$nombre', $sueldo, $idMaquinaria, '$opcion')");
        }

        function gestionPagoMaquinaria($idPagoMaquinaria, $concepto, $conceptoB, $cantidad, $precioUnitario, $modificacion, $importe, 
        $esIngreso, $idTipoPago, $idMaquinaria, $idProyecto, $idProveedor, $idUsuario, $opcion) {
            return $this->connect()->query("CALL spGestionPagoMaquinaria($idPagoMaquinaria, '$concepto', '$conceptoB', $cantidad, $precioUnitario, $modificacion, $importe, 
            $esIngreso, $idTipoPago, $idMaquinaria, $idProyecto, $idProveedor, $idUsuario, '$opcion')");
        }

        function gestionCredito($idCredito, $idBanco, $idProyecto, $opcion) {
            return $this->connect()->query("CALL spGestionCredito($idCredito, $idBanco, $idProyecto, '$opcion')");
        }

        function gestionProrrateo($idProrrateo, $idProyecto, $esAdmin, $opcion) {
            return $this->connect()->query("CALL spGestionProrrateo($idProrrateo, $idProyecto, $esAdmin, '$opcion')");
        }

        function obtenerDepartamento() {
            return $this->connect()->query("CALL spObtenerDepartamento()");
        }

        /**
         * Get the value of current_date
         */ 
        public function getCurrent_date()
        {
                return $this->current_date;
        }

        /**
         * Set the value of current_date
         *
         * @return  self
         */ 
        public function setCurrent_date($current_date)
        {
                $this->current_date = $current_date;

                return $this;
        }
        
    }