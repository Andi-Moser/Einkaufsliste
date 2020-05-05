<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class LoginController extends Controller
{
    /**
     * @Route("/login")
     */
    public function loginAction(Request $request)
    {
        $username = $request->get('name');
        $password = $request->get('password');
        $errormessage = "";

        if ($username && $password) {
            if ($username == "andi" && $password == "1234") {
                $session = $request->getSession(); // merken!!

                $session->set('username', $username);
                return $this->redirect("/list");
            }
            else {
                $errormessage = "Benutzername und Passwort stimmen nicht überein!";
            }
        }
        return $this->render("login/login.html.php", ["errormessage" => $errormessage]);
    }

    /**
     * @Route("/logout")
     * @param Request $request
     */
    public function logoutAction(Request $request) {
        $request->getSession()->remove('username');
        $request->getSession()->clear();

        return $this->redirect("/login");
    }
}
