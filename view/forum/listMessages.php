<?php

$sujet = $result['data']['sujet'];
$messages = $result["data"]['messages'];

    
?>
<h1><?=$sujet->getTitreSujet()?></h1>
<h2>Réponses:</h2>

<?php
foreach($messages as $message){

    ?>  <div class="message-container"> 
            <p><?=$message->getUtilisateur()?></p>
            <p><?=$message->getDateCreationMessage()?></p>
            <p><?=$message->getTexteMessage()?></p>
        </div>
    <?php
}


  
