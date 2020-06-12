<?php
    class Quote{
        private $conn;
        private $table = 'maiq_db';
        public $id;
        public $tekst;
        public function __construct($db) {
            $this->conn = $db;
        }

        public function read() {
            $query = 'SELECT id, 
                tekst
                FROM ' . $this->table . '';
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
      
            return $stmt;
        }

        public function read_single(){
            $query = 'SELECT id, 
            tekst
            FROM ' . $this->table . '
            WHERE id = ?
            LIMIT 0,1';
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->tekst = $row['tekst'];
        }
            
        


    }