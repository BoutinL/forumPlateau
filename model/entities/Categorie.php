<?php
    namespace Model\Entities;

    use App\Entity;

    final class Categorie extends Entity{

        private $id;
        private $typeCategorie;

        public function __construct($data){         
            $this->hydrate($data);        
        }
 
        /**
         * Get the value of id
         */ 
        public function getId()
        {
                return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        /**
         * Get the value of typeCategorie
         */ 
        public function getTypeCategorie()
        {
                return $this->typeCategorie;
        }

        /**
         * Set the value of typeCategorie
         *
         * @return  self
         */ 
        public function setTypeCategorie($typeCategorie)
        {
                $this->typeCategorie = $typeCategorie;

                return $this;
        }

    }
