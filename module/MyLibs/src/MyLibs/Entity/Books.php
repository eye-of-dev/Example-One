<?php

namespace MyLibs\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
* An example of how to implement a Products entity.
* @ORM\Entity
* @ORM\Table(name="books",options={"engine":"MyISAM", "collate":"utf8_general_ci", "charset":"utf8", "comment":"Таблица хранения книг"})
* @author Anton Lisikov <anton.lisikov@gmail.com>
*/
class Books
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
     * @ORM\Column(type="string", nullable=true, options={"length":"255", "comment":"Название книги"})
     */
    protected $title;
    
    /**
     * @var text 
     * @ORM\Column(type="string", nullable=true, options={"length":"255", "comment":"Автор книги"})
     */
    protected $author;

    /**
     * @var int
     * @ORM\Column(type="integer", options={"comment":"Принадлежность книги к библиотеки"})
     */
    protected $lib_id;
    
    /**
     * @var float 
     * @ORM\Column(type="float", precision=10, scale=2, nullable=true, columnDefinition="FLOAT", options={"comment":"Цена книги"})
     */
    protected $price;
    
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
     * Get author.
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }
    
    /**
     * Set description.
     * @param string $author
     * @return void
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * Get lib_id.
     * @return integer
     */
    public function getLibId()
    {
        return $this->lib_id;
    }
    
    /**
     * Set description.
     * @param string $lib_id
     * @return void
     */
    public function setLibId($lib_id)
    {
        $this->lib_id = $lib_id;
    }
    
    /**
     * Get price.
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
    
    /**
     * Set price.
     * @param float $price
     * @return void
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
    
    /**
     * Helper function
     */
    public function getArray()
    {
        return get_object_vars($this);
    }
}
