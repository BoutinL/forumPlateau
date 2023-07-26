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

    }