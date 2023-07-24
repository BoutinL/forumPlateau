<?php
    namespace Model\Entities;

    use App\Entity;

    final class Utilisateur extends Entity{

        private $id;
        private $mailUtilisateur;
        private $pseudoUtilisateur;
        private $mdpUtilisateur;
        private $dateInscriptionUtilisateur;

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
         * Get the value of mailUtilisateur
         */ 
        public function getMailUtilisateur()
        {
                return $this->mailUtilisateur;
        }

        /**
         * Set the value of mailUtilisateur
         *
         * @return  self
         */ 
        public function setmailUtilisateur($mailUtilisateur)
        {
                $this->mailUtilisateur = $mailUtilisateur;

                return $this;
        }

                /**
         * Get the value of pseudoUtilisateur
         */ 
        public function getPseudoUtilisateur()
        {
                return $this->pseudoUtilisateur;
        }

        /**
         * Set the value of pseudoUtilisateur
         *
         * @return  self
         */ 
        public function setPseudoUtilisateur($pseudoUtilisateur)
        {
                $this->pseudoUtilisateur = $pseudoUtilisateur;

                return $this;
        }

        /**
         * Get the value of mdpUtilisateur
         */ 
        public function getMdpUtilisateur()
        {
                return $this->mdpUtilisateur;
        }

        /**
         * Set the value of mdpUtilisateur
         *
         * @return  self
         */ 
        public function setMdpUtilisateur($mdpUtilisateur)
        {
                $this->mdpUtilisateur = $mdpUtilisateur;

                return $this;
        }

        /**
         * Get the value of dateInscriptionUtilisateur
         */ 
        public function getDateInscriptionUtilisateur()
        {
                return $this->dateInscriptionUtilisateur;
        }

        /**
         * Set the value of dateInscriptionUtilisateur
         *
         * @return  self
         */ 
        public function setDateInscriptionUtilisateur($dateInscriptionUtilisateur)
        {
                $this->id = $dateInscriptionUtilisateur;

                return $this;
        }

    }
