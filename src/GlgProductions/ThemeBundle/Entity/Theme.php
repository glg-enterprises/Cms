<?php

namespace GlgProductions\ThemeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Theme
 *
 * @ORM\Table(name="glgcms_theme")
 * @ORM\Entity(repositoryClass="GlgProductions\ThemeBundle\Repository\ThemeRepository")
 */
class Theme
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var bool
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active = "false";

    /**
     * @var bool
     *
     * @ORM\Column(name="installed", type="boolean")
     */
    private $installed = "true";


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Theme
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set active
     *
     * @param boolean $active
     *
     * @return Theme
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set installed
     *
     * @param boolean $installed
     *
     * @return Theme
     */
    public function setInstalled($installed)
    {
        $this->installed = $installed;

        return $this;
    }

    /**
     * Get installed
     *
     * @return bool
     */
    public function getInstalled()
    {
        return $this->installed;
    }
}

