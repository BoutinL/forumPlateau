<?php
    
?>

<h1>Formulaire de connexion</h1>

<form action="index.php?ctrl=forum&action=" method="POST">
    <label>Email:</label></br>
    <input type="email" name="mail" id="mail" required></br>

    <label>Mot de passe:</label></br>
    <textarea type="password" name="mdp" id="message" required></textarea></br>

    <input type="submit" name="submit" value="Se connecter">
</form>