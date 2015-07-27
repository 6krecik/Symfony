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

    public function sprawdzAction($date)
    {
//        $em = $this->getDoctrine()->getManager();
//        $res = $em->getRepository('TorBundle:ReservationTor')->find(1);
//       // $timestamp = strtotime($res->getDataStart());
//        $d =  date_timestamp_get($res->getDataStart());
//        $s = date_timestamp_get($res->getDateStop());
//        ld($d);
//        ld($s);
//        die();
        //29/Jul/2015:07:30:00 GMT+0200 (CEST)
        $date = substr($date, 4, 20);
        $data = date_create_from_format('M d Y H:i:s', $date);
        $data->getTimestamp();
        ld($data);

    }

    public function rezerwujAction()
    {
        return $this->render('TorBundle:tor:rezerwuj.html.twig', array());
    }

}