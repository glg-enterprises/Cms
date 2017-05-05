<?php

namespace GlgProductions\CmsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 *
 * @ORM\Table(name="glgcms_categories")
 * @ORM\Entity(repositoryClass="GlgProductions\CmsBundle\Repository\CategoryRepository")
 */
class Category
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
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetime")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEdited", type="datetime")
     */
    private $dateEdited;

    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="\GlgProductions\AdminBundle\Entity\User")
     * @ORM\JoinColumn(name="createdBy", referencedColumnName="id")
     */
    private $createdBy;

    /**
     * @var int
     *
     * @ORM\OneToOne(targetEntity="\GlgProductions\AdminBundle\Entity\User")
     * @ORM\JoinColumn(name="editedBy", referencedColumnName="id")
     */
    private $editedBy;


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
     * @return Category
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
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Category
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateEdited
     *
     * @param \DateTime $dateEdited
     *
     * @return Category
     */
    public function setDateEdited($dateEdited)
    {
        $this->dateEdited = $dateEdited;

        return $this;
    }

    /**
     * Get dateEdited
     *
     * @return \DateTime
     */
    public function getDateEdited()
    {
        return $this->dateEdited;
    }

    /**
     * Set createdBy
     *
     * @param \GlgProductions\AdminBundle\Entity\User $createdBy
     *
     * @return Category
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \GlgProductions\AdminBundle\Entity\User $createdBy
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set editedBy
     *
     * @param \GlgProductions\AdminBundle\Entity\User $editedBy
     *
     * @return Category
     */
    public function setEditedBy($editedBy)
    {
        $this->editedBy = $editedBy;

        return $this;
    }

    /**
     * Get editedBy
     *
     * @return \GlgProductions\AdminBundle\Entity\User $editedBy
     */
    public function getEditedBy()
    {
        return $this->editedBy;
    }
}
