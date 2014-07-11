<?php

namespace MyLibs\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* An example of how to implement a Libs entity.
* @ORM\Entity
* @ORM\Table(name="libs",options={"engine":"MyISAM", "collate":"utf8_general_ci", "charset":"utf8", "comment":"Таблица хранения библиотек"})
* @author Anton Lisikov <anton.lisikov@gmail.com>
*/
class Libs
{
    /**
     * @var int
     * @ORM\id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * @var string
     * @ORM\Column(type="string", nullable=true, options={"length":"300", "comment":"Название библиотеки"})
     */
    protected $title;
    
    /**
     * @var text 
     * @ORM\Column(type="text", nullable=true, columnDefinition="TEXT", options={"comment":"Описание библиотеки"})
     */
    protected $description;

    /**
     * Get id.
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id.
     * @param int $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = ( int ) $id;
    }

    /**
     * Get title.
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title.
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get description.
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Set description.
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Helper function
     */
    public function getArray()
    {
        return get_object_vars($this);
    }
}
