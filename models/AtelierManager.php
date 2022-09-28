<?php
require "ModelClass.php";
require "AtelierClass.php";

class AtelierManager extends Model
{
    private $ateliers = [];

    public function ajoutAtelier($atelier)
    {
        $this->ateliers[] = $atelier;
    }
    public function getAtelier()
    {
        return $this->ateliers;
    }
    public function chargementAteliers()
    {
        $db = $this->getBdd();
        $sql = "SELECT * FROM atelier ORDER BY titre";
        $req = $db->prepare($sql);
        $req->execute([]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $newAtelier = new Atelier($value['titre'], $value['id'], $value['image'], $value['temps'], $value['necessite'],  $value['id']);
            $this->ajoutAtelier($newAtelier);
        }
    }
    public function getAtelierById($id)
    {
        foreach ($this->ateliers as $value) {
            if ($value->getId() === $id) {
                return $value;
            }
        }
    }
    public function ajoutAtelierBD($titre, $temps, $image, $necessite)
    {
        $db = $this->getBdd();
        $sql = "INSERT INTO atelier (titre, temps, image, necessite) VALUES (:titre, :temps, :image, :necessite)";
        $req = $db->prepare($sql);
        $result = $req->execute([
            ":titre" => $titre,
            ":temps" => $temps,
            ":image" => $image,
            ":necessite" => $necessite
        ]);
        return $result;
    }
    public function supprimerAtelierBD($id)
    {
        $db = $this->getBdd();
        $sql = "DELETE FROM atelier WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":id" => $id
        ]);
    }

    public function modifierAtelierBD($id, $titre, $temps, $image, $necessite)
    {
        $db = $this->getBdd();
        $sql = "UPDATE atelier SET titre =:titre, temps = :temps, image = :image, necessite =:necessite WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":titre" => $titre,
            ":temps" => $temps,
            ":image" => $image,
            ":necessite" => $necessite,
            ":id" => $id
        ]);
    }
}
