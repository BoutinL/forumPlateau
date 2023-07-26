<?php

$sujets = $result["data"]['sujets'];
?>

<h1>liste sujets / catégorie</h1>

<?php
foreach($sujets as $sujet ){

    ?>
    <p><?=$sujet->getTitreSujet()?></p>
    <?php
}


  
