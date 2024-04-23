<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:ital,wght@0,100..900;1,100..900&family=Comfortaa:wght@300..700&family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Figtree:ital,wght@0,300..900;1,300..900&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=Jost:ital,wght@0,100..900;1,100..900&family=Lexend:wght@100..900&family=Manrope:wght@200..800&family=Mulish:ital,wght@0,200..1000;1,200..1000&family=Questrial&family=Tilt+Neon&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1& display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Thomas Fromaget | L'hypnose</title>
</head>


<?php

require 'vendor/autoload.php'; // Charger les dépendances installées avec Composer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Vérification si envoie du formulaire
if (filter_has_var(INPUT_POST, 'submit')) {
// Variables des champs du formulaire
$lastName = $_POST['last-name'];
$firstName = $_POST['first-name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

// Vérification si les champs sont rempli
if (!empty($lastName) && !empty($firstName) && !empty($email) && !empty($subject) && !empty($message)) {
    
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        // Non
        $msg = 'Veuillez entrer un email valide';
    } else {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST)) {

        $mail = new PHPMailer(true);
    
        try {
            // Configurer PHPMailer
            $mail->isSMTP();
            $mail->Host = 'localhost'; // Utiliser localhost
            $mail->Port = 1025; // Port SMTP par défaut de MailHog
            $mail->SMTPAuth = false; // Pas besoin d'authentification
            $mail->SMTPSecure = false; // Pas de chiffrement requis
    
            // Configurer le message
            $mail->setFrom($email, $firstName . " ". $lastName); // Expéditeur
            $mail->addAddress('bensimon.laura@orange.fr'); // Destinataire
            $mail->Subject = $subject . " - " . $firstName . " " . $lastName;
            $mail->Body = "Message de $firstName ($email):\n\nSujet: $subject\n\nMessage :\n $message"; // Corps du message
    
            // Envoyer l'e-mail
            $mail->send();
    
            $successMsg = "Votre e-mail a été envoyé avec succès. Merci de m'avoir contacté !";

            $lastName = '';
            $firstName = '';
            $email = '';
            $subject = '';
            $message = '';

        } catch (Exception $e) {

            $msg = "Erreur d'envoi : ". $e ."";
        }
            
        } else {

            $msg = "Données incorrectes";
        }

    }

} else {
    
    $msg = 'Veuillez remplir tous les champs';
}

}
?>


<div>

    <div class="logo flex-jcc">
        <a href="index.html">LOGO</a>
    </div>

    <div id="side-bar">
        <div class="toggle-btn" id="btn">
          <span></span>
          <span></span>
          <span></span>
        </div>
    
        <ul>
            <li>
                <a href="hypnose.html">L’hypnose</a>
            </li>
            <li>
                <a href="comment-ça-marche.html">Comment ça marche ?</a>
            </li>
            <li>
                <a href="deroulement.html">Déroulement</a>
            </li>
            <li>
                <a href="champs-intervention.html">Champs d’intervention</a>
            </li>
            <li>
                <a href="tarifs-dispo.html">Tarifs & disponibilités</a>
            </li>
            <li>
                <a href="a-propos.html">A propos</a>
            </li>
            <li>
                <a href="contact.php">Contact</a>
            </li>
        </ul>
      </div>

        <div class="content">

        <nav class="desktopMenu">
            <ul class="flex-menu">
                <li>
                    <a href="hypnose.html">L’hypnose</a>
                </li>
                <li>
                    <a href="comment-ça-marche.html">Comment ça marche ?</a>
                </li>
                <li>
                    <a href="deroulement.html">Déroulement</a>
                </li>
                <li>
                    <a href="champs-intervention.html">Champs d’intervention</a>
                </li>
                <li>
                    <a href="tarifs-dispo.html">Tarifs & disponibilités</a>
                </li>
                <li>
                    <a href="a-propos.html">A propos</a>
                </li>
                <li>
                    <a href="contact.php">Contact</a>
                </li>
            </ul>
        </nav>

        <div class="background-title">
            
            <h1 class="DM-Serif-white" id="contact">Contact</h1>

        </div>
        
        <div class="article-page" id="ancrage">

        <div class="padding-responsive"></div>

        <div class="flex-center">
            <?php
            if (isset($msg)) {
                echo '<p style="background-color: #CD5C5C; padding:10px;border-radius:5px;border:1px solid grey;text-align:center;width:50%;"><span class="material-symbols-outlined" style="vertical-align: middle;">error</span> '. $msg .'</p>';
                echo '<div class="text-margin"></div>';
            } else if(isset($successMsg)) {
                echo '<p style="background-color: #99B0AB; padding:10px;border-radius:5px;border:1px solid grey;text-align:center;width:50%"><span class="material-symbols-outlined" style="vertical-align: middle;">check</span> '.$successMsg.'</p>';
                echo '<div class="text-margin"></div>';
            }
            ?>

        </div>

        <form action="contact.php#ancrage" method="post" id="contactForm">

            <fieldset>

            <legend>
                <h1 class="DM-Serif-title">Formulaire de contact</h1>
            </legend>

            <div class="text-margin"></div>

            <div class="form">

                <?php 
                if (!empty($errorMessage)) {
                    echo $errorMessage;
                }
                ?>

                <label for="name"><p>Nom</p></label><br>
                <input type="text" name="last-name" value="<?php if(isset($lastName)) {echo htmlspecialchars($lastName);} ?>"><br>

                <label for="name"><p>Prénom</p></label><br>
                <input type="text" name="first-name" value="<?php if(isset($firstName)) {echo htmlspecialchars($firstName);} ?>"><br>


                <label for="email"><p>Adresse mail</p></label><br>
                <input type="email" name="email" value="<?php if(isset($email)) {echo htmlspecialchars($email);} ?>"><br>



                <label for="object"><p>Objet de votre message</p></label><br>
                <select name="subject" id="subject">
                    <option value="0"><p>— Veuillez choisir un sujet —</p></option>
                    <option value="RDV à domicile">Prendre RDV à votre domicile (Barcelone et alentours)</option>
                    <option value="RDV en cabinet">Prendre RDV en cabinet (à Barcelone)</option>
                    <option value="RDV en visio">Prendre RDV en vidéo consultation (à distance)</option>
                    <option value="Demande d'infos">Demande d'informations</option>
                </select><br>

                <div class="text-margin"></div>


                <label for="msg" disabled><p>Votre message</p></label><br>
                <textarea name="message" id="" cols="50" rows="10"><?php if(isset($message)) {echo htmlspecialchars($message);} ?></textarea>

                <div class="title-margin"></div>

                <input type="submit" value="Envoyer" name="submit" class="black-button">

                <div class="title-margin"></div>

            </div>

            </fieldset>

        </form>

        <div class="padding-responsive"></div>

        </div>

        <div class="footer">

            <div class="address">
                <div>
                    <span class="material-symbols-outlined">location_on</span>
                </div>
                <hr>
                <div>
                    <h3>Thomas Fromaget</h3>
                    <p>Adresse</p>
                </div>
            </div>
        
            <div class="phone">
                <div>
                    <span class="material-symbols-outlined">phone_in_talk</span>
                </div>
                <hr>
                <div>
                    <h3>Whatsapp</h3>
                    <p>06 XX XX XX XX</p>
                </div>
            </div>
        
        
                <div class="liens">
                    <h3><a href="hypnose.html">L'hypnose</a></h3>
                    <h3><a href="comment-ça-marche.html">Comment ça marche?</a></h3>
                    <h3><a href="deroulement.html">Déroulement</a></h3>
                    <h3><a href="champs-intervention.html">Champs d'intervention</a></h3>
                </div>
        
                <div class="liens">
                    <h3><a href="tarifs-dispo.html">tarifs & disponibilités</a></h3>
                    <h3><a href="contact.php">prendre contact</a></h3>
                    <h3><a href="a-propos.html">à propos</a></h3>
                </div>
        
            </div>
            
        </div>

    </div>

    <script src="script.js"></script>
    
</body>
</html>
