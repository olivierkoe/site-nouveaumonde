<?php

require "LowtechClass.php";

class LowtechManager extends Model
{
    private $lowtechs = [];

    public function ajoutLowtech($lowtech)
    {
        $this->lowtechs[] = $lowtech;
    }

    public function getLowtech()
    {
        return $this->lowtechs;
    }

    public function chargementLowtechs()
    {
        $db = $this->getBdd();
        $sql = "SELECT * FROM lowtech ORDER BY titre";
        $req = $db->prepare($sql);
        $req->execute([]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $newlowtech = new Lowtech($value['titre'], $value['materiaux'], $value['fabrication'], $value['fonctionnement'], $value['id'], $value['image'], $value['imagePrincipe'], $value['difficulte'], $value['temps'], $value['necessite'], $value['source']);
            $this->ajoutLowtech($newlowtech);
        }
    }

    public function getLowtechById($id)
    {
        foreach ($this->lowtechs as $value) {
            if ($value->getId() == $id) {
                return $value;
            }
        }
    }

    public function ajoutLowtechBD($titre, $materiaux, $fabrication, $fonctionnement, $image, $imagePrincipe, $difficulte, $temps, $necessite, $source)
    {
        $db = $this->getBdd();
        $sql = "INSERT INTO lowtech (titre, materiaux, fabrication, fonctionnement, image, imagePrincipe, difficulte, temps, necessite, source) VALUES (:titre, :materiaux, :fabrication, :fonctionnement, :image, :imagePrincipe, :difficulte, :temps, :necessite, :source)";
        $req = $db->prepare($sql);
        $result = $req->execute([
            ":titre" => $titre,
            ":materiaux" => $materiaux,
            ":fabrication" => $fabrication,
            ":fonctionnement" => $fonctionnement,
            ":image" => $image,
            ":imagePrincipe" => $imagePrincipe,
            ":difficulte" => $difficulte,
            ":temps" => $temps,
            ":necessite" => $necessite,
            ":source" => $source
        ]);
        return $result;
    }

    public function supprimerLowtechBD($id)
    {
        $db = $this->getBdd();
        $sql = "DELETE FROM lowtech WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":id" => $id
        ]);
    }

    public function modifierLowtechBD($id, $titre, $materiaux, $fabrication, $fonctionnement, $image, $imagePrincipe, $difficulte, $temps, $necessite, $source)
    {
        $db = $this->getBdd();
        $sql = "UPDATE lowtech SET titre =:titre, materiaux =:materiaux, fabrication = :fabrication, fonctionnement = :fonctionnement, image = :image, imagePrincipe = :imagePrincipe, difficulte = :difficulte, temps = :temps, necessite =:necessite, source = :source WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":image" => $image,
            ":imagePrincipe" => $imagePrincipe,
            ":titre" => $titre,
            ":materiaux" => $materiaux,
            ":fabrication" => $fabrication,
            ":fonctionnement" => $fonctionnement,
            ":id" => $id,
            ":difficulte" => $difficulte,
            ":temps" => $temps,
            ":necessite" => $necessite,
            ":source" => $source
        ]);
    }
}
