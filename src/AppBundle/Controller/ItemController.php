<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ItemController extends Controller
{
    /**
     * @Route("/list")
     */
    public function listAction(Request $request) {
        if (!$this->checkAccess($request)) {
            return $this->redirect("/login");
        }

        $mysqli = $this->getMysqli();

        // Daten aus Datenbank laden
        $sql = "SELECT * FROM amo_items";
        $result = $mysqli->query($sql);

        // Als Array auslesen
        $row = $result->fetch_all();

        return $this->render("item/list.html.php", ["items" => $row, "username" => $request->getSession()->get('username')]);
    }

    /**
     * @Route("/add")
     */
    public function addAction(Request $request) {
        if (!$this->checkAccess($request)) {
            return $this->redirect("/login");
        }

        $itemCount = intval($request->get('count'));
        $itemName = $request->get('name');

        $mysqli = $this->getMysqli();

        $statement = $mysqli->prepare("INSERT INTO amo_items(amount, name) VALUES(?,?)");
        $statement->bind_param("is", $itemCount, $itemName);
        $statement->execute();

        return $this->redirect("/list");
    }

    /**
     * @Route("/delete")
     */
    public function deleteAction(Request $request) {
        if (!$this->checkAccess($request)) {
            return $this->redirect("/login");
        }

        $idToDelete = intval($request->get('id'));

        $mysqli = $this->getMysqli();

        $statement = $mysqli->prepare("DELETE FROM amo_items WHERE id = ?");
        $statement->bind_param("i", $idToDelete);
        $statement->execute();

        return $this->redirect("/list");
    }

    /**
     * @Route("/edit");
     */
    public function editAction(Request $request) {
        if (!$this->checkAccess($request)) {
            return $this->redirect("/login");
        }

        $idToEdit = $request->get('id');
        $mysqli = $this->getMysqli();

        if ($request->getMethod() == "POST") {
            $itemCount = intval($request->get('count'));
            $itemName = $request->get('name');

            $statement = $mysqli->prepare("UPDATE amo_items SET amount = ?, name = ? WHERE id = ?");
            $statement->bind_param("isi", $itemCount, $itemName, $idToEdit);
            $statement->execute();

            return $this->redirect("/list");
        }

        $sql = "SELECT * FROM amo_items WHERE id = " . intval($idToEdit);
        $result = $mysqli->query($sql);

        // Als Array auslesen
        $item = $result->fetch_array(MYSQLI_ASSOC);

        return $this->render("item/edit.html.php", ["item" => $item]);
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
