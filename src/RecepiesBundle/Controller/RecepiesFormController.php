<?php
namespace RecepiesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use RecepiesBundle\Entity\Recepie;
use Symfony\Component\HttpFoundation\Response;

use RecepiesBundle\Form\Type\RecepieType;


class RecepiesFormController extends Controller
{
    public function createAction(Request $request)
    {
        $recepie = new Recepie();

        $form = $this->createFormBuilder($recepie)
            ->add('title', 'text')
            ->add('body', 'textarea')
            ->add('save', 'submit', array('label' => 'Create Recepie'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid())
        {
            //Persist to Database
            $em = $this->getDoctrine()->getManager();

            $em->persist($recepie);
            $em->flush();
            $new_id = $recepie->getId();

            //return $this->redirect($this->generateUrl('recepie_create_success'));
            return $this->redirect($this->generateUrl('recepie_show', array('id' => $new_id)));
        }

        return $this->render('RecepiesBundle::create.html.twig', array('form' => $form->createView()));
    }

    public function editAction(Request $request,  $id)
    {
        $recepie = $this->getDoctrine()
            ->getRepository('RecepiesBundle:Recepie')
            ->find($id);

        if (!$recepie){
            throw $this->createNotFoundException(
                'No recepie found for ' . $id
            );
        }

        $form = $this->createForm(new RecepieType(), $recepie);

        $form->handleRequest($request);

        //In addition, the data of an unmapped field can also be modified directly:
        //$form->get('unmappedBonusText')->setData('This text will not make to the database.');

        if ($form->isValid())
        {
            //Persist to Database
            $em = $this->getDoctrine()->getManager();
            //$em->persist($recepie);
            $em->flush();
            $edited_id = $recepie->getId();

            return $this->redirect($this->generateUrl('recepie_show', array('id' => $edited_id)));
        }
        else
        {
            return $this->render('RecepiesBundle::edit.html.twig', array('form' => $form->createView()));
        }


    }
}