<?php

$messages = $result["data"]['messages'];
    
?>
<h1></h1>
<h2>Réponses:</h2>

<?php
foreach($messages as $message){

    ?>
        <p><?=$messages->getTexteMessage()." De: ".$messages->getUtilisateur()." Date/Heure: ".$messages->getDateCreationMessage()?></p>
    <?php
}


  
