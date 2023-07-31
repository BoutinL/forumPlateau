<?php

namespace Controller;

use App\Session;
use App\AbstractController;
use App\ControllerInterface;
use Model\Managers\UtilisateurManager;
use Model\Managers\SujetManager;
use Model\Managers\MessageManager;
use Model\Managers\CategorieManager;

class HomeController extends AbstractController implements ControllerInterface
{
    public function register()
    {
        $UtilisateurManager = new UtilisateurManager();

        if (isset($_POST['submit'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
            $password = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $pseudo = filter_input(INPUT_POST, 'pseudo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $confirmPassword = filter_input(INPUT_POST, 'confirmMdp', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $role = "ROLE_MEMBER";

            if ( $email && $password && $pseudo) {
                $UtilisateurManager = new UtilisateurManager();

                if (!$UtilisateurManager->findOneByEmail($email)) {
                    if (!$UtilisateurManager->findOneByUser($pseudo)) {
                        if (($password == $confirmPassword) and strlen($password) >= 8) {
                            //hash
                            $passwordHash = self::getPasswordHash($password);
                            $UtilisateurManager->add([
                                "pseudo" => $pseudo, 
                                "email" => $email,
                                "password" => $passwordHash,
                                "role" => $role
                            ]);
                            $this->redirectTo("security", "login");
                        }
                    }
                }
            }
        }
        return [
            "view" => VIEW_DIR . "security/register.php",
            "data" => []
        ];
    }

    private static function getPasswordHash($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}