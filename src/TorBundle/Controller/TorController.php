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

    public function sprawdzAction()
    {
        $em = $this->getDoctrine()->getManager();
        $res = $em->getRepository('TorBundle:ReservationTor')->find(1);
       // $timestamp = strtotime($res->getDataStart());
        $d =  date_timestamp_get($res->getDataStart());
        $s = date_timestamp_get($res->getDateStop());
        ld($d);
        ld($s);
        die();
    }

}