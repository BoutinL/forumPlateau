<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\SujetManager;

    class SujetManager extends Manager{

        protected $className = "Model\Entities\Sujet";
        protected $tableName = "sujet";


        public function __construct(){
            parent::connect();
        }

        public function getSujetsByCategorie($id){
            $pdo = parent::connect();
            $requeteListeSujetsCategorie = $pdo->prepare("
                SELECT * 
                FROM sujet s 
                WHERE s.categorie_id = :id
                ORDER BY s.dateCreationSujet ASC
            ");

            $requeteListeSujetsCategorie->execute(["id" => $id]);
            require "view/forum/listSujetsCategorie.php";
        }
    }