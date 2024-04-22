<?php
require 'vendor/autoload.php'; // Charger les dépendances installées avec Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST)) {
    
    // Récupérer les données du formulaire
    $last_name = $_POST['last-name'];
    $first_name = $_POST['first-name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    var_dump($last_name);
    var_dump($first_name);
    var_dump($email);
    var_dump($subject);
    var_dump($message);
    
    $mail = new PHPMailer(true);

    try {
        // Configurer PHPMailer
        $mail->isSMTP();
        $mail->Host = 'localhost'; // Utiliser localhost
        $mail->Port = 1025; // Port SMTP par défaut de MailHog
        $mail->SMTPAuth = false; // Pas besoin d'authentification
        $mail->SMTPSecure = false; // Pas de chiffrement requis

        // Configurer le message
        $mail->setFrom($email, $first_name . " ". $last_name); // Expéditeur
        $mail->addAddress('bensimon.laura@orange.fr'); // Destinataire
        $mail->Subject = $subject . " - " . $first_name . " " . $last_name;
        $mail->Body = "Message de $firstName ($email):\n\nSujet: $subject\n\nMessage :\n $message"; // Corps du message

        // Envoyer l'e-mail
        $mail->send();

        // Réponse au client
        http_response_code(200); // Réponse 200 pour succès
        header('Location: contact.php?status=success#contact');
    } catch (Exception $e) {
        // Gérer les erreurs de PHPMailer
        http_response_code(500); // Réponse 500 pour échec
        echo json_encode(['success' => false, 'message' => 'Erreur d\'envoi: ' . $e->getMessage()]);
    }
} else {
    // Réponse pour données manquantes ou incorrectes
    http_response_code(400); // Réponse 400 pour mauvaise requête
    echo json_encode(['success' => false, 'message' => 'Données incorrectes']);
}

?>