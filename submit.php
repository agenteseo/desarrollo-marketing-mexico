<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $secret = '6Ld76ZEqAAAAAH4AGlquGDyemzxmHumRyTnzjH2R';
    $response = $_POST['g-recaptcha-response'];
    $remoteip = $_SERVER['REMOTE_ADDR'];

    $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}&remoteip={$remoteip}");
    $responseData = json_decode($verify);

    if ($responseData->success) {
        // L'utilisateur est vérifié. Traitez les données du formulaire ici.
        $firstName = $_POST['first_name'];
        $email = $_POST['email'];
        $phoneNumber = $_POST['phone_number'];
        
        // Exemple : afficher les données
        echo "Nom : " . htmlspecialchars($firstName) . "<br>";
        echo "Email : " . htmlspecialchars($email) . "<br>";
        echo "Numéro de téléphone : " . htmlspecialchars($phoneNumber) . "<br>";
        
        // Vous pouvez maintenant sauvegarder les données dans une base de données, envoyer un email, etc.
    } else {
        // Échec de la vérification.
        echo "Échec de la vérification reCAPTCHA.";
    }
} else {
    // Rediriger l'utilisateur si la méthode de la requête n'est pas POST
    header('Location: index.html');
    exit();
}
?>
