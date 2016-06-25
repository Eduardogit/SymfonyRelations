<?php

namespace relacionBundle\Entity;

/**
 * TablaDos
 */
class TablaDos
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $sitiowebNombre;

    /**
     * @var string
     */
    private $direccion;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sitiowebNombre
     *
     * @param string $sitiowebNombre
     *
     * @return TablaDos
     */
    public function setSitiowebNombre($sitiowebNombre)
    {
        $this->sitiowebNombre = $sitiowebNombre;

        return $this;
    }

    /**
     * Get sitiowebNombre
     *
     * @return string
     */
    public function getSitiowebNombre()
    {
        return $this->sitiowebNombre;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return TablaDos
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }
}
