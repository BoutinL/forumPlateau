<?php

$categories = $result["data"]['categories'];
    
?>

<h1>liste catégories</h1>

<?php
foreach($categories as $categorie ){

    ?>
        <p><a href="index.php?ctrl=forum&action=listSujetsCategorie&id=<?= $categorie->getId() ?>"><?=$categorie->getTypeCategorie()?></a></p>
    <?php
}


  
