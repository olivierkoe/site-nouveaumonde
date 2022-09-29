<?php

abstract class  GlobalController
{
    public static function ajoutImage($titre, $file, $repertoire)
    {

        if ($file['size'] > 0) {

            $dir = $repertoire;

            $titre = ucfirst(strtolower($titre));

            $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            $target_file = $dir . $titre . "." . $extension;

            if (!getimagesize($file['tmp_name'])) {
                throw new Exception("Le fichier n'est pas une image");
            }

            if ($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "webp" && $extension !== "avif") {
                throw new Exception("L'extension du fichier n'est pas reconnu");
            }

            if ($file['size'] > 5000000) {
                throw new Exception("Le fichier existe déjà");
            }

            if (move_uploaded_file($file['tmp_name'], $target_file)) {

                $newTitle =  $titre . "." . $extension;
                return $newTitle;
            }
        } else {
            throw new Exception("Element non ajouter !!");
        }
    }
    public static function manageErrors($type, $message)
    {
        $_SESSION["alert"] = [
            'type' => $type,
            'message' => $message
        ];
        return $_SESSION['alert'];
    }
}
