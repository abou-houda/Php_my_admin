<?php
    include( "../DB/DataAccess.php");
    class Table extends classeMereTable{
        private $id;
        private $nom;
        private $DBnom;
        private $contrainte;

        function __construct($id, $nom, $DBnom, $contrainte)
        {
            $this->id=$id;
            $this->nom=$nom;
            $this->DBnom=$DBnom;
            $this->contrainte=$contrainte;
        }

        public function Select($nomtable){
            return DataAccess::selection("SELECT * FROM $nomtable");
        }

        protected function createTable($fields)  
        {
            $this->create($this->nom,$fields);  // from classeMereTable
        }

        protected function insertTable($fields)
        {
            $this->Insert($this->nom,$fields);  // from ClasseMere
        }

        protected function deleteTable($nomTable,$id)
        {
            $query = "DELETE FROM $nomTable WHERE id = $id";
            self::miseajour($query);
            return 0;
        }

        protected function updateTable($values,$id)
        {
            $this->update($this->nom, $values, $id); // from ClasseMere
        }
       
    }
?>