<?php
require "ModelClass.php";
require "LivreClass.php";

class LivreManager extends Model
{
    private $livres = [];

    public function ajoutLivre($livre)
    {
        $this->livres[] = $livre;
    }
    public function getLivre()
    {
        return $this->livres;
    }
    public function chargementLivres()
    {
        $db = $this->getBdd();
        $sql = "SELECT * FROM livre ORDER BY titre";
        $req = $db->prepare($sql);
        $req->execute([]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $newLivre = new Livre($value['image'], $value['titre'], $value['pages']);
            $this->ajoutLivre($newLivre);
        }
    }
}
