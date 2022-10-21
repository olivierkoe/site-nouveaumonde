<?php

require_once "ModelClass.php";
require_once "UserClass.php";

class UserManager extends Model
{

    private $users = [];

    public function ajoutUser($user)
    {
        $this->users[] = $user;
    }

    public function getUser()
    {
        return $this->users;
    }


    public function chargementUsers()
    {
        $db = $this->getBdd();
        $sql = "SELECT * FROM user ORDER BY pseudo";
        $req = $db->prepare($sql);
        $req->execute([]);
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach ($data as $value) {
            $newUser = new User($value['id'], $value['pseudo'], $value['nom'], $value['prenom'], $value['mail'], $value['password'], $value['role'], $value['image']);
            $this->ajoutUser($newUser);
        }
    }

    public function getUserByPseudoDB($pseudo)
    {
        $sql = "SELECT * FROM user WHERE pseudo = :pseudo";
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->execute([
            ":pseudo" => $pseudo
        ]);
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        if ($data) {
            $user = new User($data->id, $data->pseudo, $data->nom,  $data->prenom, $data->mail, $data->password, $data->role, $data->image);
            return $user;
        } else {
            return null;
        }
    }

    public function getUserByIdDB($id)
    {
        $sql = "SELECT * FROM user WHERE id = :id";
        $stmt = $this->getBdd()->prepare($sql);
        $stmt->execute([
            ":id" => $id
        ]);
        $data = $stmt->fetch(PDO::FETCH_OBJ);
        if ($data) {
            $user = new User($data->id, $data->pseudo, $data->nom,  $data->prenom, $data->mail, $data->password, $data->role, $data->image);
            return $user;
        } else {
            return null;
        }
    }

    public function addUserDB($pseudo, $nom, $prenom, $mail, $password, $image)
    {
        $sql = "INSERT INTO user (pseudo,nom,prenom,mail,password,role) VALUES (:pseudo,:nom,:prenom,:mail,:password,$image,2)";
        $stmt = $this->getBdd()->prepare($sql);
        if ($stmt->execute([":pseudo" => $pseudo, ":nom" => $nom, ":prenom" => $prenom, ":mail" => $mail, ":password" => $password, ":image" => $image])) {
            return true;
        } else {
            return false;
        }
    }

    public function supprimerUserBD($id)
    {
        $db = $this->getBdd();
        $sql = "DELETE FROM user WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":id" => $id
        ]);
    }

    public function modifierUserBD($id, $pseudo, $nom, $prenom, $mail, $image, $password)
    {
        $db = $this->getBdd();
        $sql = "UPDATE user SET pseudo =:pseudo, nom =:nom, prenom = :prenom, mail = :mail, role = :role , image = :image, password = :password WHERE id = :id";
        $req = $db->prepare($sql);
        $req->execute([
            ":id" => $id,
            ":pseudo" => $pseudo,
            ":nom" => $nom,
            ":prenom" => $prenom,
            ":mail" => $mail,
            ":image" => $image,
            ":password" => $password,
        ]);
    }
}
