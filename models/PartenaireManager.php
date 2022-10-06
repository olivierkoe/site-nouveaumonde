<?php

require "PartenaireClass.php";

class PartenaireManager extends Model
{
    private $partenaires = [];

    public function ajoutPartenaire($partenaire)
    {
        $this->partenaires[] = $partenaire;
    }

    public function getPartenaire()
    {
        return $this->partenaires;
    }

    public function chargementPartenaires()
    {
        $db = $this->getBdd();
        $sql = "SELECT * FROM partenaire ORDER BY titre";
        $req = $db->prepare($sql);
        $req->execute([]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $newpartenaire = new Partenaire(
                $value['titre'],
                $value['description'],
                $value['id'],
                $value['image'],
                $value['siteWeb'],
                $value['email'],
            );
            $this->ajoutPartenaire($newpartenaire);
        }
    }

    public function getPartenaireById($id)
    {

        foreach ($this->partenaires as $value) {
            if ($value->getId() == $id) {
                return $value;
            }
        }
    }

    public function ajoutPartenaireBD($titre, $description, $siteWeb, $email, $image)
    {
        $db = $this->getBdd();
        $sql = "INSERT INTO partenaire (titre, description, siteWeb, email, image) VALUES (:titre, :description, :siteWeb, :email, :image)";
        $req = $db->prepare($sql);
        $result = $req->execute([
            ":titre" => $titre,
            ":description" => $description,
            ":siteWeb" => $siteWeb,
            ":email" => $email,
            ":image" => $image
        ]);
        return $result;
    }

    public function supprimerPartenaireBD($id)
    {
        $db = $this->getBdd();
        $sql = "DELETE FROM partenaire WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":id" => $id
        ]);
    }

    public function modifierPartenaireBD($id, $titre, $description, $siteWeb, $email, $image)
    {
        $db = $this->getBdd();
        $sql = "UPDATE partenaire SET titre =:titre, description =:description, siteWeb = :siteWeb, email = :email, image = :image WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":titre" => $titre,
            ":description" => $description,
            ":siteWeb" => $siteWeb,
            ":email" => $email,
            ":image" => $image,
            ":id" => $id
        ]);
    }
}
