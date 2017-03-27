<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Question;
use AppBundle\Entity\Reponse;
use AppBundle\Entity\Theme;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of AdminController
 *
 * @author loic
 * @Route("/admin")
 */
class AdminController extends Controller{
    /**
     * @Route("/", name="admin")
     */
    public function adminView(Request $request) {
        $ts = $this->getDoctrine()->getRepository(Theme::class)->findAll();
        $questions = array();
        foreach ($ts as $t) {
            array_push($questions, $this->getDoctrine()->getRepository(Question::class)->findByTheme($t));
//        $questions = $this->getDoctrine()->getRepository(Question::class)->findByTheme($t);
        }
        // replace this example code with whatever you need
        return $this->render('default/admin.html.twig', array(
                    "questions" => $questions,
                    "themes" => $ts
        ));
    }

    /**
     * @Route("/add", name="addQuestion")
     */
    public function addQuestion(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $question = new Question();
        $question->setTexte($request->get("texte"));
        $question->setTheme($this->getDoctrine()->getRepository(Theme::class)->find($request->get("theme")));
        $em->persist($question);
        for ($i = 1; $i < 5; $i++) {
            $r = new Reponse();
            $r->setQuestion($question);
            $r->setTexte($request->get("r" . $i));
            if ($request->get("cb" . $i) != null) {
                $r->setVerif(true);
            } else {
                $r->setVerif(false);
            }

            $em->persist($r);
        }
        $em->flush();
        return $this->redirectToRoute("admin");
    }
}
