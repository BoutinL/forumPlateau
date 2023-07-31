<?php

    namespace Controller;

    use App\Session;
    use App\AbstractController;
    use App\ControllerInterface;
        use Model\Managers\SujetManager;
        use Model\Managers\MessageManager;
        use Model\Managers\CategorieManager;
    
    class ForumController extends AbstractController implements ControllerInterface{

        public function index(){

            $sujetManager = new SujetManager();

            return [
                "view" => VIEW_DIR."forum/listSujets.php",
                "data" => [
                    "sujets" => $sujetManager->findAll(["dateCreationSujet", "ASC"])
                ]
            ];
        
        }

        public function listCategories(){
            $categorieManager = new CategorieManager();
            $categories = $categorieManager->findAll(["typeCategorie", "ASC"]);

            return [
                "view" => VIEW_DIR."forum/listCategories.php",
                "data" => [
                    "categories" => $categories
                ]
            ];
        }
        
        public function listSujetsCategorie($id)
        {
            $categorieManager = new CategorieManager();
            $sujetManager = new SujetManager();
    
            $categorie = $categorieManager->findOneById($id);
            $sujets = $sujetManager->getSujetsByCategorie($id); 
    
            return [
                "view" => VIEW_DIR . "forum/listSujetsCategorie.php",
                "data" => [
                    "categorie" => $categorie,
                    "sujets" => $sujets
                ]
            ];
        }

        public function listMessages($id)
        {
            $sujetManager = new SujetManager();
            $messageManager = new MessageManager();

            $sujet = $sujetManager->findOneById($id);
            $messages = $messageManager->getMessagesBySujet($id);

            return [
                "view" => VIEW_DIR . "forum/listMessages.php",
                "data" => [
                    "sujet" => $sujet,
                    "messages" => $messages
                ]
            ];
        }
        
        public function addSujet($id)
        {
            $sujetManager = new SujetManager();
            $messageManager = new MessageManager();

            if(isset($_POST['submit']))
            {
                if (isset($_POST['titre']) && (!empty($_POST['titre'])))
                {
                    $titre = filter_input(INPUT_POST, "titre", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $utilisateur_id = 1;

                    if($titre && $message && $utilisateur_id)
                    {
                        $nouveauSujetId = $sujetManager->add([
                            "titreSujet" => $titre,
                            "utilisateur_id" => $utilisateur_id,
                            "categorie_id" => $id
                        ]);

                        $messageManager->add([
                            "texteMessage" => $message,
                            "sujet_id" => $nouveauSujetId,
                            "utilisateur_id" => $utilisateur_id
                        ]);
                    }

                    header("Location:index.php?ctrl=forum&action=listSujetsCategorie&id=$id");
                    exit;
                }
            }
        }

        public function addMessage($id)
        {
            $sujetManager = new SujetManager();
            $messageManager = new MessageManager();

            if(isset($_POST['submit']))
            {
                if (isset($_POST['message']))
                {
                    $message = filter_input(INPUT_POST, "message", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                    $utilisateur_id = 1;

                    if($message && $utilisateur_id)
                    {
                        $sujetId = $sujetManager->findOneById($id)->getId();
                        $messageManager->add([
                            "texteMessage" => $message,
                            "sujet_id" => $sujetId,
                            "utilisateur_id" => $utilisateur_id
                        ]);
                    }

                    header("Location:index.php?ctrl=forum&action=listMessages&id=$id");
                    exit;
                }
            }
        }

        public function deleteSujet($id)
        {
            $sujetManager = new sujetManager;
            $sujet = $sujetManager->findOneById($id);

            $sujetManager->delete($id);
            $this->redirectTo('forum', 'listSujetsCategorie', $sujet->getCategorie_id());
        }
    }