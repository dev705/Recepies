<?php
namespace RecepiesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use RecepiesBundle\Entity\Recepie;
use Symfony\Component\HttpFoundation\Response;

class RecepiesDbController extends Controller
{
    public function createAction(){

        $recepie = new Recepie();
        $recepie->setTitle("Hard Coded Recepie");
        $recepie->setBody("This tasty chicken recepie is hard coded in the createAction of RecepiesDbController");

        $em = $this->getDoctrine()->getManager(); //$em probably means Entity Manager

        $em->persist($recepie);
        $em->flush();

        return new Response('Created recepie id ' . $recepie->getId());
    }

    public function showAction($id){

        $recepie = $this->getDoctrine()
                ->getRepository('RecepiesBundle:Recepie')
                ->find($id);

        if (!$recepie){
            throw $this->createNotFoundException(
                'No recepie found for ' . $id
            );
        }

        return new Response('Recepie found!<br>' . 'Title: ' .  $recepie->getTitle() . '<br>Body: ' . $recepie->getBody());
    }

}