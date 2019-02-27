<?php
/**
 * Created by PhpStorm.
 * User: Hajer
 * Date: 27/02/2019
 * Time: 18:51
 */

namespace EvaluationBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MailController extends Controller

{
    public function sendAction($adrs) {
        $this->sendEmail($adrs);
        return $this->redirectToRoute('reclamation_homepage');
    }


    public function sendEmail($adrs) {
        $message = (new \Swift_Message('Reclamation'))
            ->setFrom('hajer.ouarda@esprit.tn')
            ->setTo($adrs)
            ->setBody(
                $this->renderView(
                    '@Evaluation/mail/mail.html.twig', array(
                        'adrs'=>$adrs
                    )
                ),
                'text/html'
            ) ;

        $this->get('mailer')->send($message);

    }
}