<?php
while(!file_exists('php'))
chdir(('..'));

include_once('php/conection.php');

class Pago extends DB
{
    private $idPago;
    private $concepto;
    private $importe;
    private $fechaPago;
    private $esIngreso;
    private $activo;
    private $idTipoPago;
    private $idArea;
    private $idUsuario;
    private $esGeneral; //Pago Detalle
    private $idProyecto;
    private $idEtapa;
    private $idFamilia;
    private $idConcepto;
    private $idConceptoB;
    private $Comentario;
    private $idCliente;
    private $idAportador;
    private $idBanco;
    private $idProveedor;
    private $idEmpleado;
    

    /**
     * Get the value of idPago
     */ 
    public function getIdPago()
    {
        return $this->idPago;
    }

    /**
     * Set the value of idPago
     *
     * @return  self
     */ 
    public function setIdPago($idPago)
    {
        $this->idPago = $idPago;

        return $this;
    }

    /**
     * Get the value of concepto
     */ 
    public function getConcepto()
    {
        return $this->concepto;
    }

    /**
     * Set the value of concepto
     *
     * @return  self
     */ 
    public function setConcepto($concepto)
    {
        $this->concepto = $concepto;

        return $this;
    }

    /**
     * Get the value of importe
     */ 
    public function getImporte()
    {
        return $this->importe;
    }

    /**
     * Set the value of importe
     *
     * @return  self
     */ 
    public function setImporte($importe)
    {
        $this->importe = $importe;

        return $this;
    }

    /**
     * Get the value of fechaPago
     */ 
    public function getFechaPago()
    {
        return $this->fechaPago;
    }

    /**
     * Set the value of fechaPago
     *
     * @return  self
     */ 
    public function setFechaPago($fechaPago)
    {
        $this->fechaPago = $fechaPago;

        return $this;
    }

    /**
     * Get the value of esIngreso
     */ 
    public function getEsIngreso()
    {
        return $this->esIngreso;
    }

    /**
     * Set the value of esIngreso
     *
     * @return  self
     */ 
    public function setEsIngreso($esIngreso)
    {
        $this->esIngreso = $esIngreso;

        return $this;
    }

    /**
     * Get the value of activo
     */ 
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set the value of activo
     *
     * @return  self
     */ 
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get the value of idTipoPago
     */ 
    public function getIdTipoPago()
    {
        return $this->idTipoPago;
    }

    /**
     * Set the value of idTipoPago
     *
     * @return  self
     */ 
    public function setIdTipoPago($idTipoPago)
    {
        $this->idTipoPago = $idTipoPago;

        return $this;
    }

    /**
     * Get the value of idArea
     */ 
    public function getIdArea()
    {
        return $this->idArea;
    }

    /**
     * Set the value of idArea
     *
     * @return  self
     */ 
    public function setIdArea($idArea)
    {
        $this->idArea = $idArea;

        return $this;
    }

    /**
     * Get the value of idUsuario
     */ 
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set the value of idUsuario
     *
     * @return  self
     */ 
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get the value of esGeneral
     */ 
    public function getEsGeneral()
    {
        return $this->esGeneral;
    }

    /**
     * Set the value of esGeneral
     *
     * @return  self
     */ 
    public function setEsGeneral($esGeneral)
    {
        $this->esGeneral = $esGeneral;

        return $this;
    }

    /**
     * Get the value of idProyecto
     */ 
    public function getIdProyecto()
    {
        return $this->idProyecto;
    }

    /**
     * Set the value of idProyecto
     *
     * @return  self
     */ 
    public function setIdProyecto($idProyecto)
    {
        $this->idProyecto = $idProyecto;

        return $this;
    }

    /**
     * Get the value of idEtapa
     */ 
    public function getIdEtapa()
    {
        return $this->idEtapa;
    }

    /**
     * Set the value of idEtapa
     *
     * @return  self
     */ 
    public function setIdEtapa($idEtapa)
    {
        $this->idEtapa = $idEtapa;

        return $this;
    }

    /**
     * Get the value of idFamilia
     */ 
    public function getIdFamilia()
    {
        return $this->idFamilia;
    }

    /**
     * Set the value of idFamilia
     *
     * @return  self
     */ 
    public function setIdFamilia($idFamilia)
    {
        $this->idFamilia = $idFamilia;

        return $this;
    }

    /**
     * Get the value of idConcepto
     */ 
    public function getIdConcepto()
    {
        return $this->idConcepto;
    }

    /**
     * Set the value of idConcepto
     *
     * @return  self
     */ 
    public function setIdConcepto($idConcepto)
    {
        $this->idConcepto = $idConcepto;

        return $this;
    }

    /**
     * Get the value of idConceptoB
     */ 
    public function getIdConceptoB()
    {
        return $this->idConceptoB;
    }

    /**
     * Set the value of idConceptoB
     *
     * @return  self
     */ 
    public function setIdConceptoB($idConceptoB)
    {
        $this->idConceptoB = $idConceptoB;

        return $this;
    }

    /**
     * Get the value of Comentario
     */ 
    public function getComentario()
    {
        return $this->Comentario;
    }

    /**
     * Set the value of Comentario
     *
     * @return  self
     */ 
    public function setComentario($Comentario)
    {
        $this->Comentario = $Comentario;

        return $this;
    }

    /**
     * Get the value of idCliente
     */ 
    public function getIdCliente()
    {
        return $this->idCliente;
    }

    /**
     * Set the value of idCliente
     *
     * @return  self
     */ 
    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    /**
     * Get the value of idAportador
     */ 
    public function getIdAportador()
    {
        return $this->idAportador;
    }

    /**
     * Set the value of idAportador
     *
     * @return  self
     */ 
    public function setIdAportador($idAportador)
    {
        $this->idAportador = $idAportador;

        return $this;
    }

    /**
     * Get the value of idBanco
     */ 
    public function getIdBanco()
    {
        return $this->idBanco;
    }

    /**
     * Set the value of idBanco
     *
     * @return  self
     */ 
    public function setIdBanco($idBanco)
    {
        $this->idBanco = $idBanco;

        return $this;
    }

    /**
     * Get the value of idProveedor
     */ 
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * Set the value of idProveedor
     *
     * @return  self
     */ 
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;

        return $this;
    }

    /**
     * Get the value of idEmpleado
     */ 
    public function getIdEmpleado()
    {
        return $this->idEmpleado;
    }

    /**
     * Set the value of idEmpleado
     *
     * @return  self
     */ 
    public function setIdEmpleado($idEmpleado)
    {
        $this->idEmpleado = $idEmpleado;

        return $this;
    }
}
?>