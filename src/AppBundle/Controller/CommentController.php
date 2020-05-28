<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CommentController extends Controller
{
    /**
     * @Route("/comment/add")
     */
    public function addFunction(Request $request) {
        if (!$this->checkAccess($request)) {
            return $this->redirect("/login");
        }

        if ($request->isMethod('POST')) {
            $itemId = intval($request->get('itemId'));
            $comment = $request->get('comment');
            $time = time();
            $userId = $request->getSession()->get('userId');

            $mysqli = $this->getMysqli();
            $statement = $mysqli->prepare("INSERT INTO amo_comments(userId, itemId, comment, `timestamp`) VALUES (?,?,?,?)");
            $statement->bind_param("iisi", $userId, $itemId, $comment, $time);
            $statement->execute();

            return $this->redirect("/detail?id=" . $itemId);
        }
    }

    private function checkAccess(Request $request) {
        $session = $request->getSession();

        if ($session->has('userId')) {
            return true;
        }
        return false;
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
