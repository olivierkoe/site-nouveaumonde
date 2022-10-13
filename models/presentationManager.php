<?php

require "presentationClass.php";
// require "ModelClass.php";

class PresentationManager extends Model
{
    private $presentations = [];

    public function ajoutPresentation($presentation)
    {
        $this->presentations[] = $presentation;
    }

    public function getPresentation()
    {
        return $this->presentations;
    }

    public function chargementPresentation()
    {
        $db = $this->getBdd();
        $sql = "SELECT * FROM presentation ORDER BY titre";
        $req = $db->prepare($sql);
        $req->execute([]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $newPresentation = new Presentation($value['titre'], $value['image'], $value['description'], $value['contact'], $value['id']);
            $this->ajoutPresentation($newPresentation);
        }
    }

    public function getPresentationById($id)
    {
        $id = intval($id);

        foreach ($this->presentations as $value) {

            if ($value->getId() === $id) {
                return $value;
            }
        }
    }

    public function ajoutPresentationBD($titre, $image, $description, $contact)
    {
        $db = $this->getBdd();
        $sql = "INSERT INTO presentation (titre, description, contact, image) VALUES (:titre, :description, :contact, :image )";
        $req = $db->prepare($sql);
        $result = $req->execute([
            ":titre" => $titre,
            ":description" => $description,
            ":contact" => $contact,
            ":image" => $image
        ]);
    }

    public function supprimerPresentationBD($id)
    {
        $db = $this->getBdd();
        $sql = "DELETE FROM presentation WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":id" => $id
        ]);
    }

    public function modifierPresentationBD($titre, $image, $description, $contact, $id)
    {
        $db = $this->getBdd();
        $sql = "UPDATE presentation SET titre =:titre, image =:image, description = :description , contact = :contact WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":titre" => $titre,
            ":image" => $image,
            ":description" => $description,
            ":contact" => $contact,
            ":id" => $id

        ]);
    }
}
