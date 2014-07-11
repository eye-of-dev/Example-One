<?php

namespace MyLibs\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use MyLibs\Entity\Libs;
use MyLibs\Entity\Books;

/**
 * Description of LibsController
 */
class LibsController extends AbstractActionController
{
    /**
     * Точка входа или функция по умолчанию
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
        
        $results = $objectManager
                ->getRepository('\MyLibs\Entity\Libs')
                ->findBy(array(), array('id' => 'ASC'));
        
        $lib_id = NULL;
        $libs = array();
        foreach ($results as $result)
        {
            $lib = $result->getArray();
            $libs[$lib['id']] = $lib;
        }
        
        $filter = array();
        if ($this->getRequest()->isPost()) {
            
            $lib_id = $this->getRequest()->getPost('lib_id');
            
            $filter = array('lib_id' => $lib_id);
            
        }
        
        $results = $objectManager
                ->getRepository('\MyLibs\Entity\Books')
                ->findBy($filter, array('id' => 'ASC'));
        
        $books = array();
        foreach ($results as $result)
        {
            $book = $result->getArray();
            $books[$book['id']] = $book;
        }
        
        $view = new ViewModel(array(
            'lib_id' => $lib_id,
            'libs' => $libs,
            'books' => $books
        ));

        return $view;
    }
    
    /**
     * Функция добавления библиотеки
     * @return void
     */
    public function addAction(){
        
        $data['title'] = $this->getRequest()->getPost('title');
        $data['desc']= $this->getRequest()->getPost('desc');
        
        $lib = new Libs();
        $lib->setTitle($data['title']);
        $lib->setDescription($data['desc']);
        
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');

        $objectManager->persist($lib);
        $objectManager->flush();
        
        $data['id'] = $lib->getId();
        
        print json_encode($data);
        exit;
        
    }    
    
    public function bookAction(){
        
        $data['title'] = $this->getRequest()->getPost('title');
        $data['author'] = $this->getRequest()->getPost('author');
        $data['lib_id'] = $this->getRequest()->getPost('libs_id');
        $data['price'] = $this->getRequest()->getPost('price');
        
        $lib = new Books();
        $lib->setTitle($data['title']);
        $lib->setAuthor($data['author']);
        $lib->setLibId($data['lib_id']);
        $lib->setPrice($data['price']);
        
        $objectManager = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');        
        $objectManager->persist($lib);
        $objectManager->flush();
        
        $data['id'] = $lib->getId();
        
        print json_encode($data);
        exit;
    }
    
    
}
