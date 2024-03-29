<?php 

while(!file_exists('php'))
chdir(('..'));

include_once('php/conection.php');

class Etapa extends DB
{
    private $idEtapa;
    private $numeroEtapa;
    private $cantidadCasas;
    private $precioExcedente;
    private $totalMinimo;
    private $idProyecto;

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
     * Get the value of numeroEtapa
     */ 
    public function getNumeroEtapa()
    {
        return $this->numeroEtapa;
    }

    /**
     * Set the value of numeroEtapa
     *
     * @return  self
     */ 
    public function setNumeroEtapa($numeroEtapa)
    {
        $this->numeroEtapa = $numeroEtapa;

        return $this;
    }

    /**
     * Get the value of cantidadCasas
     */ 
    public function getCantidadCasas()
    {
        return $this->cantidadCasas;
    }

    /**
     * Set the value of cantidadCasas
     *
     * @return  self
     */ 
    public function setCantidadCasas($cantidadCasas)
    {
        $this->cantidadCasas = $cantidadCasas;

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
     * Get the value of precioExcedente
     */ 
    public function getPrecioExcedente()
    {
        return $this->precioExcedente;
    }

    /**
     * Set the value of precioExcedente
     *
     * @return  self
     */ 
    public function setPrecioExcedente($precioExcedente)
    {
        $this->precioExcedente = $precioExcedente;

        return $this;
    }

    /**
     * Get the value of totalMinimo
     */ 
    public function getTotalMinimo()
    {
        return $this->totalMinimo;
    }

    /**
     * Set the value of totalMinimo
     *
     * @return  self
     */ 
    public function setTotalMinimo($totalMinimo)
    {
        $this->totalMinimo = $totalMinimo;

        return $this;
    }
}

?>