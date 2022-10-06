<?php

require "ConferenceClass.php";

class ConferenceManager extends Model
{
    private $conferences = [];

    public function ajoutConference($conference)
    {
        $this->conferences[] = $conference;
    }

    public function getConference()
    {
        return $this->conferences;
    }

    public function chargementConferences()
    {
        $db = $this->getBdd();
        $sql = "SELECT * FROM conference ORDER BY titre";
        $req = $db->prepare($sql);
        $req->execute([]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $newconference = new conference($value['titre'], $value["theme"],  $value['invite'], $value['synopsis'], $value['date'],  $value['heure'], $value['image'], $value['id']);
            $this->ajoutConference($newconference);
        }
    }

    public function getConferenceById($id)
    {
        foreach ($this->conferences as $value) {
            if ($value->getId() == $id) {
                return $value;
            }
        }
    }
    public function ajoutConferenceBD($titre, $theme, $invite, $synopsis, $date, $heure, $image)
    {
        $db = $this->getBdd();
        $sql = "INSERT INTO conference (titre, theme, invite, synopsis, date, heure, image) VALUES (:titre, :theme, :invite, :synopsis, :date, :heure, :image)";
        $req = $db->prepare($sql);
        $result = $req->execute([
            ":titre" => $titre,
            ":theme" => $theme,
            ":invite" => $invite,
            ":synopsis" => $synopsis,
            ":date" => $date,
            ":heure" => $heure,
            ":image" => $image
        ]);
        return $result;
    }
    public function supprimerConferenceBD($id)
    {
        $db = $this->getBdd();
        $sql = "DELETE FROM conference WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":id" => $id
        ]);
    }

    public function modifierConferenceBD($id, $titre, $theme, $invite, $synopsis, $date, $heure, $image)
    {
        var_dump($id);
        $db = $this->getBdd();
        $sql = "UPDATE conference SET titre = :titre, theme = :theme, invite = :invite, synopsis = :synopsis, date = :date, heure = :heure, image = :image WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":titre" => $titre,
            ":theme" => $theme,
            ":invite" => $invite,
            ":synopsis" => $synopsis,
            ":date" => $date,
            ":heure" => $heure,
            ":image" => $image,
            ":id" => $id

        ]);
    }
}
