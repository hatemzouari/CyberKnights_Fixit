<?php

namespace FixBundle\Controller;
use FixBundle\Entity\Evenement;
use FixBundle\Entity\Reservation;
use FixBundle\Entity\Utilisateur;
use FixBundle\Repository\reservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Routee;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Evenement controller.
 *
 * @Route("evenement")
 */
class EvenementController extends Controller
{
    /**
     * Lists all evenement entities.
     *
     * @Route("/", name="evenement_index")
     * @Method("GET")
     */
    public function indexAction()

    {

        $em = $this->getDoctrine()->getManager();

        $evenements = $em->getRepository('FixBundle:Evenement')->findevenementbydate();

        return $this->render('evenement/index.html.twig', array(
            'evenements' => $evenements,
        ));
    }

    /**
     * Creates a new evenement entity.
     *
     * @Route("/new", name="evenement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $evenement = new Evenement();
        $form = $this->createForm('FixBundle\Form\EvenementType', $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($evenement);
            $em->flush();

            return $this->redirectToRoute('evenement_show', array('id' => $evenement->getId()));
        }

        return $this->render('evenement/new.html.twig', array(
            'evenement' => $evenement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a evenement entity.
     *
     * @Route("/{id}", name="evenement_show")
     * @Method("GET")
     */
    public function showAction(Evenement $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);

        return $this->render('evenement/show.html.twig', array(
            'evenement' => $evenement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evenement entity.
     *
     * @Route("/{id}/edit", name="evenement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Evenement $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);
        $editForm = $this->createForm('FixBundle\Form\EvenementType', $evenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evenement_edit', array('id' => $evenement->getId()));
        }

        return $this->render('evenement/edit.html.twig', array(
            'evenement' => $evenement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a evenement entity.
     *
     * @Route("/dl/{id}", name="evenement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Evenement $evenement)
    {
        $form = $this->createDeleteForm($evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($evenement);
            $em->flush();
        }

        return $this->redirectToRoute('evenement_index');
    }

    /**
     * Creates a form to delete a evenement entity.
     *
     * @param Evenement $evenement The evenement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Evenement $evenement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evenement_delete', array('id' => $evenement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    public function AfficheventAction()
    {  $currentuser=$this->getUser();
       $id=$currentuser->getId();
       $ev=new Evenement();
       $date=new \DateTime();
       $ev=$this->getDoctrine()->getRepository(Evenement::class)->findevenementprochain($date,$id);
       return $this->render('@Fix/Professionnel/eventpro.html.twig',array('ev'=>$ev,'user'=>$currentuser));

    }
    public function participerAction($id){
        $currentuser= new Utilisateur();
        $currentuser=$this->getUser();

        $res=new Reservation();
        $res->setDate(new \DateTime());
        $res->setUser($currentuser);
        $ev=$this->getDoctrine()->getRepository(Evenement::class)->find($id);
        $res->setEvennement($ev);
        $ev->setNbplace(($ev->getNbplace())-1);
        $em=$this->getDoctrine()->getManager();
        $em->persist($res);
        $em->persist($ev);
        $em->flush();
        return $this->redirectToRoute('event_pro');

    }

    public function  MesEventAction(){
        $currentuser=$this->getUser();
        $id=$currentuser->getId();
        $ev=new Evenement();
        $date=new \DateTime();
        $ev=$this->getDoctrine()->getRepository(Evenement::class)->findevenement($date,$id);
        return $this->render('@Fix/Professionnel/mesevent.html.twig',array('ev'=>$ev,'user'=>$currentuser));
    }


}
