<?php

namespace TorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TorBundle:Default:index.html.twig', array('name' => $name));
    }

    public function listUsersAction()
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('TorBundle:User')->findAll();
        return $this->render('TorBundle:Default:index.html.twig', array('product' => $product));
    }

    public function zmienAction()
    {
        echo 'zmieniam';
        die();
    }

}
