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

            $sql = "SELECT * 
                    FROM " .$this->tableName. " s
                    WHERE s.categorie_id = :id
                    ORDER BY s.dateCreationSujet ASC";

            return $this->getMultipleResults(
                DAO::select($sql, ["id"=>$id]), 
                $this->className
            );

        }
    }