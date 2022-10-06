<?php
try {
    //réccupère l'adresse email grace au $_POST['email1] que je sécurise avec escapeshellarg() ce qui rajoute des guillemet au email 
    $contact = escapeshellarg($_POST["email1"]);
    //réccupère l'adresse email grace au $_POST['message'] que je sécurise avec escapeshellarg() ce qui rajoute des guillemet au message 
    $message = escapeshellarg($_POST["votre-message"]);
    // Concatènation de l'email au message 
    $message = $contact . " " . $message;
    // email utiliser pour envoyer le message
    $headers = "FROM: nouveaumondemontpellier@hotmail.com";
    //envoie des informations
    mail('nouveaumondemontpellier@hotmail.com', 'Formulaire de contact', $message, $headers);
    // si erreur ->
    GlobalController::manageErrors("success", "Votre message a bien été envoyé");
    // redirige vers l'accueil si tous c'est bien passé
    header('location: accueil');
    // si probleme renvoie message d'erreur 
} catch (Exception $e) {
    echo $e->getmessage();
}
