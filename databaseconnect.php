<?php

class Database{
    private $conn;
    private $rowcount;
    private $rows;

    public function __construct(){
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

        $this->conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        } 
    }
    
    public function query($query){

        $results = mysqli_query($this->conn, $query);
        $this->rowcount = $results->num_rows;
    
        return $this->rows = mysqli_fetch_all($results, MYSQLI_ASSOC);
    }

    function __destruct() {

        try{
            $this->conn->close();
        }
        catch(Exception $e) {
            printf("ERROR: %s\n", $e->errorMessage()); 
        }    
    }
}