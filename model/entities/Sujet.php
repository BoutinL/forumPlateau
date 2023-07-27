<?php
    namespace Model\Entities;

    use App\Entity;

    final class Sujet extends Entity{

        private $id;
        private $titreSujet;
        private $utilisateur;
        private $dateCreationSujet;
        private $categorie_id;
        private $verrouillerSujet;

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
         * Get the value of titreSujet
         */ 
        public function getTitreSujet()
        {
                return $this->titreSujet;
        }

        /**
         * Set the value of titreSujet
         *
         * @return  self
         */ 
        public function setTitreSujet($titreSujet)
        {
                $this->titreSujet = $titreSujet;

                return $this;
        }

        /**
         * Get the value of utilisateur_id
         */ 
        public function getUtilisateur()
        {
                return $this->utilisateur;
        }

        /**
         * Set the value of utilisateur_id
         *
         * @return  self
         */ 
        public function setUtilisateur($utilisateur)
        {
                $this->utilisateur = $utilisateur;

                return $this;
        }

        /**
         * Get the value of dateCreationSujet
         */ 
        public function getDateCreationSujet()
        {
                $formattedDate = $this->dateCreationSujet->format("d/m/Y, H:i:s");
                return $formattedDate;
        }

        /**
         * Set the value of dateCreationSujet
         *
         * @return  self
         */ 
        public function setDateCreationSujet($date)
        {
                $this->dateCreationSujet = new \DateTime($date);

                return $this;
        }

        /**
         * Get the value of categorie_id
         */ 
        public function getCategorie_id()
        {
                return $this->categorie_id;
        }

        /**
         * Set the value of categorie_id
         *
         * @return  self
         */ 
        public function setCategorie_id($categorie_id)
        {
                $this->categorie_id = $categorie_id;

                return $this;
        }

        /**
         * Get the value of verrouillerSujet
         */ 
        public function getVerrouillerSujet()
        {
                return $this->verrouillerSujet;
        }

        /**
         * Set the value of verrouillerSujet
         *
         * @return  self
         */ 
        public function setVerrouillerSujet($verrouillerSujet)
        {
                $this->verrouillerSujet = $verrouillerSujet;

                return $this;
        }
    }
