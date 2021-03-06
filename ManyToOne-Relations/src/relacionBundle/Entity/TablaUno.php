<?php

namespace relacionBundle\Entity;

/**
 * TablaUno
 */
class TablaUno
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $apPaterno;

    /**
     * @var string
     */
    private $apMaterno;


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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return TablaUno
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apPaterno
     *
     * @param string $apPaterno
     *
     * @return TablaUno
     */
    public function setApPaterno($apPaterno)
    {
        $this->apPaterno = $apPaterno;

        return $this;
    }

    /**
     * Get apPaterno
     *
     * @return string
     */
    public function getApPaterno()
    {
        return $this->apPaterno;
    }

    /**
     * Set apMaterno
     *
     * @param string $apMaterno
     *
     * @return TablaUno
     */
    public function setApMaterno($apMaterno)
    {
        $this->apMaterno = $apMaterno;

        return $this;
    }

    /**
     * Get apMaterno
     *
     * @return string
     */
    public function getApMaterno()
    {
        return $this->apMaterno;
    }
    /**
     * @var entity
     */
    private $User;


    /**
     * Set user
     *
     * @param \entity $user
     *
     * @return TablaUno
     */
    public function setUser(\entity $user)
    {
        $this->User = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \entity
     */
    public function getUser()
    {
        return $this->User;
    }
    /**
     * @var string
     */
    private $manyToMany;


    
    /**
     * @var entity
     */
    private $sitioweb_id;


    /**
     * Set sitiowebId
     *
     * @param \entity $sitiowebId
     *
     * @return TablaUno
     */
    public function setSitiowebId(\entity $sitiowebId)
    {
        $this->sitioweb_id = $sitiowebId;

        return $this;
    }

    /**
     * Get sitiowebId
     *
     * @return \entity
     */
    public function getSitiowebId()
    {
        return $this->sitioweb_id;
    }

//    /**
//     * Set manyToMany
//     *
//     * @param string $manyToMany
//     *
//     * @return TablaUno
//     */
//    public function setManyToMany($manyToMany)
//    {
//        $this->manyToMany = $manyToMany;
//
//        return $this;
//    }
//
//    /**
//     * Get manyToMany
//     *
//     * @return string
//     */
//    public function getManyToMany()
//    {
//        return $this->manyToMany;
//    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $sitiosweb;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sitiosweb = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add sitiosweb
     *
     * @param \relacionBundle\Entity\TablaDos $sitiosweb
     *
     * @return TablaUno
     */
    public function addSitiosweb(\relacionBundle\Entity\TablaDos $sitiosweb)
    {
        $this->sitiosweb[] = $sitiosweb;

        return $this;
    }

    /**
     * Remove sitiosweb
     *
     * @param \relacionBundle\Entity\TablaDos $sitiosweb
     */
    public function removeSitiosweb(\relacionBundle\Entity\TablaDos $sitiosweb)
    {
        $this->sitiosweb->removeElement($sitiosweb);
    }

    /**
     * Get sitiosweb
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSitiosweb()
    {
        return $this->sitiosweb;
    }
}
