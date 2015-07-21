<?php

namespace TorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TorBundle:Default:index.html.twig', array('name' => $name));
    }
}
