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
        $sql = "SELECT * FROM ateliers ORDER BY titre";
        $req = $db->prepare($sql);
        $req->execute([]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $newAtelier = new Atelier(
                $value['titre'],
                $value['argument1'],
                $value['argument2'],
                $value['argument3'],
                $value['sourceArg1'],
                $value['sourceArg2'],
                $value['sourceArg3'],
                $value['prix1'],
                $value['prix2'],
                $value['prix3'],
                $value['id'],
                $value['dateCreation'],
                $value['dateModif'],
                $value['modifAuth']
            );
            $this->ajoutAtelier($newAtelier);
        }
    }
    public function getAtelierById($id)
    {
        foreach ($this->ateliers as $value) {

            if ($value->getId() == $id) {
                return $value;
            }
        }
    }

    public function ajoutAtelierBD($titre, $argument1,  $sourceArg1, $prix1, $argument2, $sourceArg2, $prix2, $argument3, $sourceArg3, $prix3)
    {
        $db = $this->getBdd();
        $sql = "INSERT INTO ateliers (titre, argument1, sourceArg1, prix1, argument2, sourceArg2, prix2, argument3, sourceArg3, prix3) VALUES (:titre, :argument1, :sourceArg1, :prix1, :argument2, :sourceArg2, :prix2, :argument3, :sourceArg3, :prix3)";
        $req = $db->prepare($sql);
        $result = $req->execute([
            ":titre" => $titre,
            ":argument1" => $argument1,
            ":sourceArg1" => $sourceArg1,
            ":prix1" => $prix1,
            ":argument2" => $argument2,
            ":sourceArg2" => $sourceArg2,
            ":prix2" => $prix2,
            ":argument3" => $argument3,
            ":sourceArg3" => $sourceArg3,
            ":prix3" => $prix3,

        ]);
        return $result;
    }
    public function supprimerAtelierBD($id)
    {
        $db = $this->getBdd();
        $sql = "DELETE FROM Ateliers WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":id" => $id
        ]);
    }

    public function modifierAtelierBD($id, $titre, $argument1, $sourceArg1, $prix1, $argument2, $sourceArg2, $prix2, $argument3, $sourceArg3, $prix3, $modifAuth)
    {
        $db = $this->getBdd();
        $sql = "UPDATE ateliers SET titre =:titre, argument1 = :argument1, argument2 = :argument2, argument3 = :argument3, sourceArg1 = :sourceArg1, sourceArg2 = :sourceArg2, sourceArg3 = :sourceArg3, prix1 = :prix1, prix2 = :prix2,  prix3 = :prix3, modifAuth = :modifAuth WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":titre" => $titre,
            ":argument1" => $argument1,
            ":argument2" => $argument2,
            ":argument3" => $argument3,
            ":sourceArg1" => $sourceArg1,
            ":sourceArg2" => $sourceArg2,
            ":sourceArg3" => $sourceArg3,
            ":prix1" => $prix1,
            ":prix2" => $prix2,
            ":prix3" => $prix3,
            ":id" => $id,
            ":modifAuth" => $modifAuth
        ]);
    }
}
