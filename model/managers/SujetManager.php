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

            $sql = "SELECT s.titreSujet, s.dateCreationSujet, s.utilisateur_id, s.id_sujet
                    FROM " .$this->tableName. " s
                    WHERE s.categorie_id = :id
                    ORDER BY s.dateCreationSujet ASC";

            return $this->getMultipleResults(
                DAO::select($sql, ["id"=>$id]), 
                $this->className
            );
        }

        public function addSujet()
        {
            $sql = "INSERT INTO sujet (titreSujet, categorie_id, utilisateur_id )
                    VALUES ('Faire un insert en SQL depuis un framework', '2', '1')";
            
            return $this->insert(
                DAO::select($sql),
                $this->className
            );
        }
    }