<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Apprenant;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of SecurityController
 *
 * @author loic
 */
class SecurityController extends Controller{
 /**
     * @Route("login", name="login")
     */
    public function login(Request $request) {
        $user = new Apprenant();
        $users = $this->getDoctrine()->getRepository(Apprenant::class)->findByEmail($request->get('email'));
        if (count($users) > 0) {
            $request->getSession()->set('user', $request->get('email'));
            $request->getSession()->start();
            return $this->redirectToRoute("home");
        } else {
            $user->setEmail($request->get('email'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            $request->getSession()->set('user', $request->get('email'));
            $request->getSession()->start();
            return $this->redirectToRoute("home");
        }

    }

    /**
     * @Route("logout", name="logout")
     */
    public function logout(Request $request) {
        $request->getSession()->invalidate();

        return $this->redirectToRoute("home");
    }

}
