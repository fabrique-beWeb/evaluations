<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Apprenant;
use AppBundle\Entity\Evaluation;
use AppBundle\Entity\MonEntite;
use AppBundle\Entity\Question;
use AppBundle\Entity\Reponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {

 
    /**
     * retourne la vue par defaut ( evaluation)
     * @Route("/", name="home")
     */
    public function indexAction(Request $request) {
        return $this->render('default/index.html.twig');
    }

    /**
     * @Route("/question", name="question")
     */
    public function nextQuestion(Request $request) {
        // on recup la liste des questions + le numero de la prochaine question
        $qs = $this->getDoctrine()->getRepository(Question::class)->findBy(array(), array('theme' => 'ASC'));
        $n = $request->getSession()->get('session');
        $suivante = null;
        //on save la question actuelle et on maj la session en DB
        if ($n < count($qs)) {
            $suivante = $qs[$n];
        }
            $request->getSession()->get("eval")->setQuestion($suivante);
            $this->getDoctrine()->getManager()->merge($request->getSession()->get("eval"));
            $this->getDoctrine()->getManager()->flush();
        // on balance a la vue la question suivante + le score (affiché à la fin)
        return $this->render('default/index.html.twig', array(
                    "question" => $suivante,
                    "score" => array(
                        "resultat" => $request->getSession()->get("eval")->getResultat(),
                        "max" => count($qs)
                    )
        ));
    }

    /**
     * Initialise Une session d'évaluation
     * invonquée sur le click de start
     * @Route("/start", name="start")
     */
    public function start(Request $request) {
        $user = $this->getDoctrine()->getRepository(Apprenant::class)->findByEmail($request->getSession()->get('user'))[0];
        $evaluations = $this->getDoctrine()->getRepository(Evaluation::class)->findByApprenant($user);
        $eval = null;
        if(count($evaluations)>0){
            $eval = $evaluations[count($evaluations)-1];
            $request->getSession()->set("session", $eval->getResultat());
        }else{
            
            $eval = new Evaluation();
            $eval->setApprenant($user);
            $eval->setResultat(0);
            $this->getDoctrine()->getManager()->persist($eval);
            $this->getDoctrine()->getManager()->flush();
            $request->getSession()->set("session", 0);
        }
        //utilisé pour mettre a jour la session d'évaluation
        $request->getSession()->set("eval", $eval);
        
        // numero de la question
        
        return $this->redirectToRoute("question");
    }

    /**
     * Appelée apres la validation du questionnaire
     * @Route("/next", name="next")
     */
    public function next(Request $request) {
        //Verification de la reponse + maj de la sesison d'évaluation
        if ($this->getDoctrine()->getRepository(Reponse::class)->find($request->get("Q"))->getVerif()) {
            $request->getSession()->get("eval")->setResultat($request->getSession()->get("eval")->getResultat() + 1);
        }
        // Maj de l'Evaluation en DB
        $this->getDoctrine()->getManager()->merge($request->getSession()->get("eval"));
        $this->getDoctrine()->getManager()->flush();
        //Question suivante
        $request->getSession()->set("session", $request->getSession()->get('session') + 1);
        return $this->redirectToRoute("question");
    }

}
