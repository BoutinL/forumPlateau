<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\UtilisateurManager;

    class UtilisateurManager extends Manager{

        protected $className = "Model\Entities\Utilisateur";
        protected $tableName = "utilisateur";


        public function __construct(){
            parent::connect();
        }

        public function getUserById($id)
        {
            $sql = "SELECT id_utilisateur, pseudoUtilisateur, mailUtilisateur, role, dateInscriptionUtilisateur
                    FROM " . $this->tableName . "
                    WHERE id_utilisateur = :id";

            return $this->getOneOrNullResult(
                DAO::select($sql, ['id' => $id]),
                $this->className
            );
        }


        public function findOneByEmail($email)
        {
            $sql = "SELECT *
            FROM " . $this->tableName . " u
            WHERE mailUtilisateur = :email";

            return $this->getOneorNullResult(
                DAO::select($sql, ['email' => $email], false),
                $this->className
            );
        }

        public function findOneByUser($pseudo)
        {
            $sql = "SELECT *
            FROM " . $this->tableName . " u
            WHERE pseudoUtilisateur = :pseudo";

            return $this->getOneorNullResult(
                DAO::select($sql, ['pseudo' => $pseudo], false),
                $this->className
            );
        }

        public function login()
        {
            $UtilisateurManager = new UtilisateurManager();
    
            if (isset($_POST['submit'])) {
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
                if ($email && $password) {
                    $dbUser = $UtilisateurManager->findOneByEmail($email);
    
                    if ($dbUser && password_verify($password, $dbUser->getPassword())) {
                        // Le mot de passe est correct, effectuez les actions appropriées
                        Session::setUser($dbUser);
                        $this->redirectTo('forum', 'listCategories');
                    } else {
                        // Le mot de passe est incorrect
                        $this->redirectTo('security', 'login');
                    }
                }
            }
    
            return [
                "view" => VIEW_DIR . "security/login.php",
                "data" => []
            ];
        }

    }