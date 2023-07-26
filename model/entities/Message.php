<?php
    namespace Model\Entities;

    use App\Entity;

    final class Message extends Entity{

        private $id;
        private $texteMessage;
        private $dateCreationMessage;
        private $sujet_id;
        private $utilisateur;

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
         * Get the value of texteMessage
         */ 
        public function getTexteMessage()
        {
                return $this->texteMessage;
        }

        /**
         * Set the value of texteMessage
         *
         * @return  self
         */ 
        public function setTexteMessage($texteMessage)
        {
                $this->texteMessage = $texteMessage;

                return $this;
        }

        /**
         * Get the value of dateCreationMessage
         */ 
        public function getDateCreationMessage()
        {
                $formattedDate = $this->dateCreationMessage->format("d/m/Y, H:i:s");
                return $formattedDate;
        }

        /**
         * Set the value of dateCreationMessage
         *
         * @return  self
         */ 
        public function setDateCreationMessage($date)
        {
                $this->dateCreationMessage = new \DateTime($date);

                return $this;
        }

        /**
         * Get the value of sujet_id
         */ 
        public function getSujet_id()
        {
                return $this->sujet_id;
        }

        /**
         * Set the value of sujet_id
         *
         * @return  self
         */ 
        public function setSujet_id($sujet_id)
        {
                $this->sujet_id = $sujet_id;

                return $this;
        }

        /**
         * Get the value of utilisateur
         */ 
        public function getUtilisateur()
        {
                return $this->utilisateur;
        }

        /**
         * Set the value of utilisateur
         *
         * @return  self
         */ 
        public function setUtilisateur($utilisateur)
        {
                $this->utilisateur = $utilisateur;

                return $this;
        }

    }
