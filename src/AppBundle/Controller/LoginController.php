<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class LoginController extends Controller
{
    private $salt = "adsföojöo43526aä¨$5467adf__4asdfADFGH";

    /**
     * @param Request $request
     * @Route("/register");
     */
    public function registerAction(Request $request) {
        if ($request->isMethod("POST")) {
            $username = $request->get('username');
            $password = $request->get('password');

            $password = md5($this->salt . $password);

            $mysqli = $this->getMysqli();

            $statement = $mysqli->prepare("INSERT INTO mon_user(username, password) VALUES(?,?)");
            $statement->bind_param("ss", $username, $password);
            $statement->execute();

            return $this->redirect("/login");
        }

        return $this->render("user/register.html.php");
    }

    /**
     * @param Request $request
     * @return Response
     * @Route("/login");
     */
    public function loginAction(Request $request) {
        if ($request->isMethod("POST")) {
            $username = $request->get('username');
            $password = $request->get('password');

            $password = md5($this->salt . $password);

            $mysqli = $this->getMysqli();

            $statement = $mysqli->prepare("SELECT id FROM mon_user WHERE username = ? AND password = ?");
            $statement->bind_param("ss", $username, $password); // Dies verhindert die Injection!
            $statement->execute();
            $result = $statement->get_result();
            $userData = $result->fetch_assoc();

            if ($userData && $userData['id']) {
                $session = $request->getSession();

                $session->set("userId", $userData['id']);
                $session->set("username", $username);

                return $this->redirect("/list");
            }

        }

        return $this->render("user/login.html.php");
    }

    /**
     * @Route("/logout")
     */
    public function logoutAction(Request $request) {
        $session = $request->getSession();

        $session->clear();

        return $this->redirect("/login");
    }

    private function getMysqli() {
        // Versuche mit Datenbankserver zu verbinden
        $mysqli = new \mysqli("login-67.hoststar.ch","inf17s","jL6LCigmf!YB8Hh","inf17s");

        $mysqli->set_charset('utf8');

        // Bei einem Fehler -> Fehlermeldung ausgeben
        if ($mysqli->connect_errno) {
            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
            exit();
        }

        return $mysqli;
    }
}
