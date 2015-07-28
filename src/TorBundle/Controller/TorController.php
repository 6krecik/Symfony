<?php
/**
 * Created by PhpStorm.
 * User: krecik
 * Date: 23.07.15
 * Time: 09:55
 */

namespace TorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TorBundle\Entity\ReservationTor;

class TorController extends Controller
{

    public function indexAction()
    {
        return $this->render('TorBundle:tor:index.html.twig', array());
    }

    public function listInstructorsAction()
    {
        $em = $this->getDoctrine()->getManager();
        $instructors = $em->getRepository('TorBundle:Instructors')->findAll();
        return $this->render('TorBundle:tor:instruktorzy.html.twig', array('instructors' => $instructors));
    }



    public function rezerwujAction($date,Request $request)
    {
        $date = substr($date, 4, 11);

        $zamknij = false;

        $form = $this->createFormBuilder()
            ->add('godzina_rozpoczecia', 'choice',array('choices'  => array(
                $date.' 09:00:00' => '9',
                $date.' 10:00:00' => '10',
                $date.' 11:00:00' => '11',
                $date.' 12:00:00' => '12',
                $date.' 13:00:00' => '13',
                $date.' 14:00:00' => '14',
                $date.' 15:00:00' => '15',
                $date.' 16:00:00' => '16',
                $date.' 17:00:00' => '17',
                $date.' 18:00:00' => '18',
                $date.' 19:00:00' => '19',
                $date.' 20:00:00' => '20',

            ),
        'required' => true,
    ))
            ->add('godzina_zakonczenia', 'choice',array('choices'  => array(
                $date.' 10:00:00' => '10',
                $date.' 11:00:00' => '11',
                $date.' 12:00:00' => '12',
                $date.' 13:00:00' => '13',
                $date.' 14:00:00' => '14',
                $date.' 15:00:00' => '15',
                $date.' 16:00:00' => '16',
                $date.' 17:00:00' => '17',
                $date.' 18:00:00' => '18',
                $date.' 19:00:00' => '19',
                $date.' 20:00:00' => '20',
                $date.' 21:00:00' => '21',

            ),
                'required' => true,
            ))
            ->add('save', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

            $data = $form->getData();

            $data_zakonczenia = date_create_from_format('M d Y H:i:s', $data['godzina_zakonczenia']);
            $data_zakonczenia_sek=$data_zakonczenia->getTimestamp();
            $data_rozpoczecia = date_create_from_format('M d Y H:i:s', $data['godzina_rozpoczecia']);
            $data_rozpoczecia_sek=$data_rozpoczecia->getTimestamp();
            if($data_zakonczenia_sek<($data_rozpoczecia_sek+3600))
            {
                echo 'godzina zakonczenia musi byc wieksza przynajmniej o 1';
            }
            else
            {
                $em = $this->getDoctrine()->getManager();
                $torEvents = $em->getRepository('TorBundle:ReservationTor')
                    ->createQueryBuilder('tor_events')
                    ->where('(tor_events.dataStart <= :startDate and tor_events.dateStop > :startDate) or (tor_events.dataStart < :endDate and tor_events.dateStop >= :endDate) or (tor_events.dataStart > :startDate and tor_events.dateStop < :endDate)')
                    ->setParameter('startDate', $data_rozpoczecia)
                    ->setParameter('endDate', $data_zakonczenia)
                    ->getQuery()->getResult();

                if(empty($torEvents))
                {
                    echo 'nic nie ma';
                    $reservation = new ReservationTor();
                    $reservation->setDataStart($data_rozpoczecia);
                    $reservation->setDateStop($data_zakonczenia);
                    $user = $this->getUser();
                    $reservation->setUserId($user);
                    $em->persist($reservation);
                    $em->flush();
                    $zamknij = true;



                }
                else
                {
                    echo 'Podany czas jest już zarezerwowany';
                }

            }

        }


        return $this->render('TorBundle:tor:rezerwuj.html.twig', array('form' => $form->createView(),'zamknij' => $zamknij));
    }




}