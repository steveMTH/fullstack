<?php
    session_start();
    //create connection to mysql 
    require_once "DBConnection.php";
    $db = new DBConnection();
    
    if($dbConnection = $db->getConnection())
    {
        if($_GET["id"]){
            $id = $_GET["id"];
            //delete from users table spacific id
            $query = "DELETE FROM users WHERE id = $id";
            $result = mysqli_query($dbConnection, $query);
            
            if($result){
                mysqli_close($dbConnection);
                //for alert in index.php page
                $db->alert("the removal success", "danger", "../index.php");
            }
            else{
                mysqli_close($dbConnection);
                //for alert in index.php page
                $db->alert("query failed", "danger", "../index.php");
            }
        }
        else{
            mysqli_close($dbConnection);
            //for alert in index.php page
            $db->alert("id : undefinde", "danger", "../index.php");
        }
    }
    else{
        //for alert in index.php page
        $db->alert("connection failed", "danger", "../index.php");
    }
?>