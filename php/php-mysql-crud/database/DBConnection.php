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
        $this->database = "mysql_php" ;
    }

    public function getConnection()
    {
        $conn = mysqli_connect($this->localhost, $this->username, $this->password, $this->database);
        if($conn === false)
            return false;
        else
            return $conn;
    }

    //set alert details
    public function alert($massage, $massage_type, $path){
        $_SESSION["massage"] = $massage;
        $_SESSION["massage_type"] = $massage_type;
        header("Location: $path");
    }
}
?>