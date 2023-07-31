<?php
    
?>

<h1>Formulaire d'inscription</h1>

<form action="index.php?ctrl=forum&action=" method="POST">
    <label>Email:</label></br>
    <input type="email" name="email" id="email" required></br>

    <label>Mot de passe:</label></br>
    <input type="password" name="mdp" id="mdp" required></input></br>

    <label>Confirmation du mot de passe:</label></br>
    <input type="password" name="ConfirmMdp" id="ConfirmMdp" required></input></br>

    <label>Pseudo:</label></br>
    <input type="text" name="pseudo" id="pseudo"></input></br>
    
    <input type="submit" name="submit" value="Ajouter">
</form>