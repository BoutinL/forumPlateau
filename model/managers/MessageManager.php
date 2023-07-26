<?php
    namespace Model\Managers;
    
    use App\Manager;
    use App\DAO;
    use Model\Managers\MessageManager;
    use Model\Managers\SujetManager;
    use Model\Managers\CategorieManager;

    class MessageManager extends Manager{

        protected $className = "Model\Entities\Message";
        protected $tableName = "message";


        public function __construct(){
            parent::connect();
        }

        public function getMessagesBySujet($id)
        {
            $sql = "SELECT m.texteMessage, m.dateCreationMessage, m.utilisateur_id
            FROM ".$this->tableName. " m
            WHERE m.sujet_id = :id
            ORDER BY m.dateCreationMessage ASC";

            return $this->getMultipleResults(
                DAO::select($sql, ["id"=>$id]),
                $this->className
            );
        }
    }