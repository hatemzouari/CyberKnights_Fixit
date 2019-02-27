<?php

namespace EvaluationBundle\Controller;

use EvaluationBundle\Entity\Evaluation;
use EvaluationBundle\Entity\Reclamation;
use EvaluationBundle\Form\EvaluationType;
use EvaluationBundle\Form\ReclamationType;
use FixBundle\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function afficheAction()
    {   $rec=new Reclamation();
        $rec=$this->getDoctrine()->getRepository(Reclamation::class)->findAll();
        return $this->render('@Evaluation/reclamation/reclamation.html.twig',array('rec'=> $rec));
    }

    public function ajouterRecAction(Request $request)
    {   $rec=new Reclamation();
    $currentuser=$this->getUser();
        $form=$this->createForm(ReclamationType::class,$rec);
        $form->handleRequest($request);
        if ($form->isValid()&& $form->isSubmitted())
        {$em=$this->getDoctrine()->getManager();
        $em->persist($rec);
        $em->flush();
        return $this->redirectToRoute('fix_homepage');


        }
        return $this->render('@Evaluation/Default/index.html.twig',array('form'=> $form->createView(),'user'=>$currentuser));
    }
    public function ajouterAvisAction(Request $request,$id)
    {   $ev=new Evaluation();
        $user=$this->getDoctrine()->getRepository(Utilisateur::class)->find($id);
        $ev->setProfessionnelle($user);
        $currentuser=$this->getUser();
        $form=$this->createForm(EvaluationType::class,$ev);
        $form->handleRequest($request);
        if ($form->isValid()&& $form->isSubmitted())
        {$em=$this->getDoctrine()->getManager();
            $em->persist($ev);
            $em->flush();
            return $this->redirectToRoute('fix_homepage');


        }
        return $this->render('@Evaluation/Default/index2.html.twig',array('form'=> $form->createView(),'user'=>$currentuser));
    }
    public function afficheEvaAction()
    {   $avis=new Evaluation();
        $avis=$this->getDoctrine()->getRepository(Evaluation::class)->findAll();
        return $this->render('@Evaluation/evaluation/evaluation.html.twig',array('avis'=> $avis));
    }
}
