<?php

    class Hero{

        public $Id;
        public $Imgg;
        public $Name;
        public $Apellido;
        public $Description;
        public $CompanyId;
        public $Status;

        public function __construct($id,$imgg,$name,$apellido,$description,$companyId,$status)
        {

            $this->Id = $id;
            $this->Name = $name;
            $this->Apellido = $apellido;
            $this->Imgg = $imgg;
            $this->Description = $description;
            $this->CompanyId = $companyId;
            $this->Status = $status;

            
        }

    }

?>