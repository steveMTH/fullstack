<?php 
class DBConnection{
    private string $localhost;
    private string $username;
    private string $password;
    private string $database;

    public function __construct()
    {
        $this->localhost = "127.0.0.1";
        $this->username = "root";
        $this->password = "12345678";
        $this->database = "hilton_hotel" ;
    }

    public function getConnection()
    {
        $conn = mysqli_connect($this->localhost, $this->username, $this->password, $this->database);
        if($conn === false)
            return false;
        else{
            return $conn;
        }
    }

    //update data of database , make check out to customers if exit date came
    public function checkOutCustomer($conn){
        $date = date("y-m-d");

        $checkOutCustomer = mysqli_query($conn, "SELECT * from customer
        where exit_date < '$date'"); 
    
        while($row = mysqli_fetch_array($checkOutCustomer)){
            $checkOutCustomerId = $row["id"];
            mysqli_query($conn, "UPDATE room set customer_id=null where 
                customer_id= $checkOutCustomerId");
        }
    }
}
?>