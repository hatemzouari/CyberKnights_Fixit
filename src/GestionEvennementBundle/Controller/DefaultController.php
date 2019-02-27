<?php

namespace GestionEvennementBundle\Controller;

use FixBundle\Entity\Evenement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function AffichevenementsAction()
    {   $user=$this->getUser();
        $ev=$this->getDoctrine()->getRepository(Evenement::class)->findAll();
            return $this->render("@GestionEvennement/Default/index.html.twig",array('ev'=>$ev,'user'=>$user));

    }
}
