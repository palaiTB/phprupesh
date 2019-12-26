<?php
class Question{
 
    // database connection and table name
    private $conn;
    private $table_name = "questions";
 
    // object properties
    public $id;
    public $date;
    public $que;
    public $option1;
    public $option2;
    public $option3;
    public $option4;
    public $option5;
    public $option6;
 
    public function __construct($db){
        $this->conn = $db;
    }
 

     function readLatest(){

            $query = "SELECT * FROM " . $this->table_name . " order by date desc,question_no desc limit 1";
         
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
    // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
         
            // set values to object properties
            $this->id = $row['question_no'];
            $this->date = $row['date'];
            $this->que = $row['question'];
            $this->option1 = $row['option1'];
            $this->option2 = $row['option2'];
            $this->option3 = $row['option3'];
            $this->option4 = $row['option4'];
            $this->option5 = $row['option5'];
            $this->option6 = $row['option6'];

        }
}
?>