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
        foreach ($this->alternatives as $value) {
            if ($value->getId() === $id) {
                return $value;
            }
        }
    }

    public function ajoutAlternativeBD($titre, $image, $theme, $email, $site)
    {
        $db = $this->getBdd();
        $sql = "INSERT INTO alternative (titre, image, theme, email, site) VALUES (:titre, :image, :theme, :email, :site)";
        $req = $db->prepare($sql);
        $result = $req->execute([
            ":titre" => $titre,
            ":image" => $image,
            ":theme" => $theme,
            ":email" => $email,
            ":site" => $site
        ]);
        return $result;
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

    public function modifierAlternativeBD($titre, $image, $theme, $email, $site)
    {
        $db = $this->getBdd();
        $sql = "UPDATE alternative SET titre =:titre, image =:image, theme = :theme , email = :email, site = :site";
        $req = $db->prepare($sql);
        $req->execute([
            ":titre" => $titre,
            ":image" => $image,
            ":theme" => $theme,
            ":email" => $email,
            ":site" => $site

        ]);
    }
}
