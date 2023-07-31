<?php
    
?>

<h1>Formulaire de connexion</h1>

<form action="index.php?ctrl=forum&action=" method="POST">
    <label>Email:</label></br>
    <input type="email" name="mail" id="mail" required></br>

    <label>Mot de passe:</label></br>
    <input type="password" name="mdp" id="mdp" required></input></br>

    <input type="submit" name="submit" value="Se connecter">
</form>