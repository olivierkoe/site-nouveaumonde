<?php

require_once "ModelClass.php";
require_once "UserClass.php";

class UserManager extends Model
{

    public function getUserByPseudoDB($pseudo)
    {
        $sql = "SELECT * FROM user WHERE pseudo = :pseudo";
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->execute([
            ":pseudo" => $pseudo
        ]);
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        if ($data) {
            $user = new User($data->id, $data->pseudo, $data->nom,  $data->prenom, $data->mail, $data->password, $data->role);
            return $user;
        } else {
            return null;
        }
    }

    public function addUserDB($pseudo, $nom, $prenom, $mail, $password)
    {
        $sql = "INSERT INTO user (pseudo,nom,prenom,mail,password,role) VALUES (:pseudo,:nom,:prenom,:mail,:password,2)";
        $stmt = $this->getBdd()->prepare($sql);
        if ($stmt->execute([":pseudo" => $pseudo, ":nom" => $nom, ":prenom" => $prenom, ":mail" => $mail, ":password" => $password])) {
            return true;
        } else {
            return false;
        }
    }
}
