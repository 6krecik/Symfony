<?php
/**
 * Created by PhpStorm.
 * User: krecik
 * Date: 23.07.15
 * Time: 09:55
 */

namespace TorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TorController extends Controller
{

    public function indexAction()
    {
        return $this->render('TorBundle:tor:index.html.twig', array());
    }

}