<?php

class Item {

    //1. properties
    private $server = "localhost"; //3306 (default) - 3308
    private $account = "root";
    private $password = "";
    private $database = "onbookstore_db";
    public $conn;

    //2. constructor
    public function __construct() {
        $this->conn = new mysqli($this->server, $this->account, $this->password, $this->database);
        if (mysqli_connect_error()):
            trigger_error(mysqli_connect_error());
        else:
            return $this->conn;
        endif;
    }

    //3. READ data method
    public function readData() {
        $query = "select * from book";
        $rs = $this->conn->query($query);

        if ($rs->num_rows > 0):
            while ($rows = $rs->fetch_array()):
                $data[] = $rows;
            endwhile;
            return $data;
        else:
            echo 'Record not found';
        endif;
    }

    // //4. CREATE data method
    // public function createData($post) {
    //     $code = $this->conn->real_escape_string($_POST['txtCode']);
    //     $name = $this->conn->real_escape_string($_POST['txtName']);
    //     $price = $this->conn->real_escape_string($_POST['txtPrice']);
    //     $query = "insert into Item values( '{$code}', '{$name}', '{$price}')";
    //     $rs = $this->conn->query($query);
    //     if ($rs):
    //         header("Location: Ex01_read.php?msgCreate");
    //     else:
    //         echo 'nothing to save';
    //     endif;
    // }

    // //5. Filter (READ by code) method
    // public function filterData($code) {
    //     $query = "select * from Item where Code = '{$code}' ";
    //     $rs = $this->conn->query($query);
    //     if ($rs->num_rows > 0):
    //         $rows = $rs->fetch_array();
    //         return $rows;
    //     else:
    //         echo 'nothing to display';
    //     endif;
    // }
    

    // //6. UPDATE data method
    // public function updateData($post){
    //     $code = $this->conn->real_escape_string($_POST['txtCode']);
    //     $name = $this->conn->real_escape_string($_POST['txtName']);
    //     $price = $this->conn->real_escape_string($_POST['txtPrice']);
    //     if(!empty($code)&&!empty($post)):
    //         $query = "update Item set Name ='{$name}', Price = '{$price}' where Code = '{$code}'";
    //         $rs = $this->conn->query($query);
    //         if($rs):
    //         header ("Location: Ex01_read.php?msgUpdate");
    //         else:
    //             echo'Nothing to save';
    //         endif;
    //     endif;
        
    // }
    // //7. DELETE data method
    // public function deleteData($code) {
    //     $query = "delete from Item where Code = '{$code}' ";
    //     $rs = $this->conn->query($query);
    //     if($rs):
    //         header ("Location: Ex01_read.php?msgDelete");
            
    //     else:
    //         echo 'nothing to delete';
    //     endif;
    // }
}
