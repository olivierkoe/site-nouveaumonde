<?php

require "AlternativeClass.php";

class AlternativeManager extends Model
{
    private $alternatives = [];

    public function ajoutAlternative($alternative)
    {
        $this->alternatives[] = $alternative;
    }

    public function getAlternative()
    {
        return $this->alternatives;
    }

    public function chargementAlternatives()
    {
        $db = $this->getBdd();
        $sql = "SELECT * FROM alternative ORDER BY titre";
        $req = $db->prepare($sql);
        $req->execute([]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $newalternative = new Alternative($value['titre'], $value['image'], $value['theme'], $value['email'], $value['site'], $value['id']);
            $this->ajoutAlternative($newalternative);
        }
    }

    public function getAlternativeById($id)
    {
        $id = intval($id);

        foreach ($this->alternatives as $value) {

            if ($value->getId() === $id) {
                return $value;
            }
        }
    }

    public function ajoutAlternativeBD($titre, $image, $theme, $email, $site)
    {
        $db = $this->getBdd();
        $sql = "INSERT INTO alternative (titre, theme, email, site, image) VALUES (:titre, :theme, :email, :site ,:image )";
        $req = $db->prepare($sql);
        $result = $req->execute([
            ":titre" => $titre,
            ":theme" => $theme,
            ":email" => $email,
            ":site" => $site,
            ":image" => $image
        ]);
    }

    public function supprimerAlternativeBD($id)
    {
        $db = $this->getBdd();
        $sql = "DELETE FROM alternative WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":id" => $id
        ]);
    }

    public function modifierAlternativeBD($titre, $image, $theme, $email, $site, $id)
    {
        $db = $this->getBdd();
        $sql = "UPDATE alternative SET titre =:titre, image =:image, theme = :theme , email = :email, site = :site WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":titre" => $titre,
            ":image" => $image,
            ":theme" => $theme,
            ":email" => $email,
            ":site" => $site,
            ":id" => $id

        ]);
    }
}
