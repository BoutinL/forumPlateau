<?php

$sujet = $result['data']['sujet'];
$messages = $result["data"]['messages'];
?>
<h1><?=$sujet->getTitreSujet()?></h1>
<section class="form-container">
    <form action="index.php?ctrl=forum&action=addMessage&id=<?= $sujet->getId() ?>" method="POST">
        <label>Votre réponse:</label></br>
        <textarea name="message" id="message" required></textarea></br>
        <input type="submit" name="submit" value="Ajouter">
    </form>
</section>
<h2>Réponses:</h2>
<?php
if (!empty($messages)) {
    foreach($messages as $message) {?> 
        <div class="message-container"> 
                <p><?=$message->getUtilisateur()?></p>
                <p><?=$message->getDateCreationMessage()?></p>
                <p><?=$message->getTexteMessage()?></p>
            </div>
        <?php
    }
} else {
        echo "Aucune réponse n'a été soumise.";
        }
