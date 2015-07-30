<?php

namespace TorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{



    public function panelAction()
    {
        return $this->render('TorBundle:Default:panel.html.twig', array());
    }

    public function listUsersAction()
    {

        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository('TorBundle:User')->findAll();

        return $this->render('TorBundle:Default:index.html.twig', array('product' => $product));
    }

    public function zmienAction($id,$action, $role)
    {


        $em = $this->getDoctrine()->getManager();
        $User = $em->getRepository('TorBundle:User')->find($id);
        if($action == 'nadaj')
        {
            $User->addRole($role);
        }
        if($action == 'odbierz')
        {
            $User->removeRole($role);
        }
        $em->persist($User);
        $em->flush();
        return $this->redirect($this->generateUrl('tor_users'));


    }

    public function zablokujAction($id,$action)
    {

        $em = $this->getDoctrine()->getManager();
        $User = $em->getRepository('TorBundle:User')->find($id);


            $User->setEnabled(!$action);


        $em->persist($User);
        $em->flush();

        return $this->redirect($this->generateUrl('tor_users'));
    }

}
