<?php
class Vote{
 
    // database connection and table name
    private $conn;
    private $table_name = "votes";
 
    // object properties
    public $que;
    public $opt;
    public $id;

    public $option1;
    public $option2;
    public $option3;
    public $option4;
    public $option5;
    public $option6;
    public $total;
    public $p_opt1;
    public $p_opt2;
    public $p_opt3;
    public $p_opt4;
    public $p_opt5;
    public $p_opt6;


 
    public function __construct($db){
        $this->conn = $db;
    }
    function update(){
     
        // update query

        if($this->opt=='option1')
        {
            $query = "UPDATE
                    " . $this->table_name . "
                SET
                    opt1 = opt1+1
                WHERE
                    question_no = :que";
        }elseif ($this->opt=='option2') {
            $query = "UPDATE
                    " . $this->table_name . "
                SET
                    opt2 = opt2+1
                WHERE
                    question_no = :que";
            # code...
        }elseif ($this->opt=='option3') {
            $query = "UPDATE
                    " . $this->table_name . "
                SET
                    opt3 = opt3+1
                WHERE
                    question_no = :que";
            # code...
        }elseif ($this->opt=='option4') {
            $query = "UPDATE
                    " . $this->table_name . "
                SET
                    opt4 = opt4+1
                WHERE
                    question_no = :que";
            # code...
        }elseif ($this->opt=='option5') {
            $query = "UPDATE
                    " . $this->table_name . "
                SET
                    opt5 = opt5+1
                WHERE
                    question_no = :que";
            # code...
        }elseif ($this->opt=='option6') {
            $query = "UPDATE
                    " . $this->table_name . "
                SET
                    opt6 = opt6+1
                WHERE
                    question_no = :que";
            # code...
        }
        

                   // update votes set opt1=opt1+1 where question_no=20;
     
        // prepare query statement
        $stmt = $this->conn->prepare($query);

       //$this->opt=htmlspecialchars(strip_tags($this->opt));
     $this->que=htmlspecialchars(strip_tags($this->que));
    

 
    // bind new values
    //$stmt->bindParam(':opt', $this->opt);
    $stmt->bindParam(':que', $this->que);
    



        // execute the query
        if($stmt->execute()){
            return true;
        }
     
        return false;
    }
    function voteAnalytics(){

        $query = "SELECT * FROM " . $this->table_name . " where question_no=" . $this->id;

        //echo $query;
        $stmt = $this->conn->prepare( $query );
        $stmt->execute();
// get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->que= $row['question_no'];
        $this->option1 = $row['opt1'];
        $this->option2 = $row['opt2'];
        $this->option3 = $row['opt3'];
        $this->option4 = $row['opt4'];
        $this->option5 = $row['opt5'];
        $this->option6 = $row['opt6'];
        $this->total = $this->option1 +$this->option2 + $this->option3 + $this->option4 + $this->option5 + $this->option6 ;
        $this->p_opt1 = (($this->option1)/$this->total)*100;
        $this->p_opt2 = (($this->option2)/$this->total)*100;
        $this->p_opt3 = (($this->option3)/$this->total)*100;
        $this->p_opt4 = (($this->option4)/$this->total)*100;
        $this->p_opt5 = (($this->option5)/$this->total)*100;
        $this->p_opt6 = (($this->option6)/$this->total)*100;

    }
 
}
?>