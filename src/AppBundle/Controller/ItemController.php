<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ItemController extends Controller
{
    /**
     * @Route("/detail")
     */
    public function detailAction(Request $request) {
        if (!$this->checkAccess($request)) {
            return $this->redirect("/login");
        }

        $mysqli = $this->getMysqli();
        $itemId = $request->get('id');
        $sql = "SELECT * FROM amo_items WHERE id = ?";

        $statement = $mysqli->prepare($sql);
        $statement->bind_param("i", $itemId);
        $statement->execute();
        $result = $statement->get_result();
        $item = $result->fetch_assoc();


        $commentResult = $mysqli->query("SELECT amo_comments.id, comment, timestamp, username 
                                                    FROM amo_comments 
                                                    INNER JOIN mon_user ON mon_user.id = amo_comments.userId 
                                                    WHERE itemId = ".intval($itemId)." 
                                                    ORDER BY `timestamp` DESC");
        $comments = [];

        while (($line = $commentResult->fetch_assoc()) != null) {
            $comments[] = $line;
        }

        return $this->render("item/detail.html.php", ["item" => $item, "comments" => $comments]);
    }

    /**
     * @Route("/list")
     */
    public function listAction(Request $request) {
        if (!$this->checkAccess($request)) {
            return $this->redirect("/login");
        }

        $userId = $request->getSession()->get('userId');
        $mysqli = $this->getMysqli();

        // Daten aus Datenbank laden
        $sql = "SELECT * FROM amo_items WHERE userId = " . $userId;
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
        $userId = $request->getSession()->get('userId');

        $statement = $mysqli->prepare("INSERT INTO amo_items(amount, name, userId) VALUES(?,?,?)");
        $statement->bind_param("isi", $itemCount, $itemName, $userId);
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
        $userId = $request->getSession()->get('userId');

        $mysqli = $this->getMysqli();

        $statement = $mysqli->prepare("DELETE FROM amo_items WHERE id = ? AND userId = ?");
        $statement->bind_param("ii", $idToDelete, $userId);
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
            $userId = $request->getSession()->get('userId');
            $itemCount = intval($request->get('count'));
            $itemName = $request->get('name');

            $statement = $mysqli->prepare("UPDATE amo_items SET amount = ?, name = ? WHERE id = ? AND userId = ?");
            $statement->bind_param("isii", $itemCount, $itemName, $idToEdit, $userId);
            $statement->execute();

            return $this->redirect("/list");
        }

        $sql = "SELECT * FROM amo_items WHERE id = " . intval($idToEdit) . " AND userId = " . $request->getSession()->get('userId');
        $result = $mysqli->query($sql);

        // Als Array auslesen
        $item = $result->fetch_array(MYSQLI_ASSOC);

        if ($item == null) {
            return $this->redirect("/list");
        }

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
