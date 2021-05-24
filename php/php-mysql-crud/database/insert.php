<?php
session_start();
//create connection to mysql 
require_once "DBConnection.php";
$db = new DBConnection();

if($dbConnection = $db->getConnection())
{
    //insertion when pressing on insert button 
    if(isset($_POST["insert"]))
    {
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        
        $query = "INSERT INTO users VALUES(default, '$firstName', '$lastName')";
        $result = mysqli_query($dbConnection, $query);
        
        if(!$result)
        {
            mysqli_close($dbConnection);
            //for alert in index.php page
            $db->alert("insertion failed", "warning", "../index.php");
        }
        else
        {
            mysqli_close($dbConnection);
            //for alert in index.php page
            $db->alert("insertion success", "success", "../index.php");
        }     
    }
}
else
{
    //for alert in index.php page
    $db->alert("connection failed", "danger", "../index.php");
}

?>