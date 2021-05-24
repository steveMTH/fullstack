<?php
session_start();
//connection to mysql
require_once "DBConnection.php";
$db = new DBConnection();

if ($dbConnection = $db->getConnection()) {
    
    if(isset($_POST["update"])){// (update) after taking the new information
        $id = $_GET["id"];
        $newFirstName = $_POST["firstName"];
        $newLastName = $_POST["lastName"];

        $query = "UPDATE users set firstName='$newFirstName', lastName='$newLastName' where id =$id";
        $result = mysqli_query($dbConnection, $query);

        if($result){
            mysqli_close($dbConnection);
            //for alert in index.php page
            $db->alert("updated", "success", "../index.php");
        }
        else{
            mysqli_close($dbConnection);
            //for alert in index.php page
            $db->alert("update query failed", "danger", "../index.php");
        }
    }// (location change to edit.php) when coming from index.php page, control on id()
    else if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $query = "SELECT * FROM users WHERE id=$id";
        $result = mysqli_query($dbConnection, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $id = $row["id"];
            $firstName = $row["firstName"];
            $lastName = $row["lastName"];
        } else {
            mysqli_close($dbConnection);
            //for alert in index.php page
            $db->alert("id = $id not found in users table", "danger", "../index.php");
        }
    }
    else {
        mysqli_close($dbConnection);
        //for alert in index.php page
        $db->alert("id : undefinde", "danger", "../index.php");
    }
} else {
    //for alert in index.php page
    $db->alert("connection failed", "danger", "../index.php");
}

?>
<?php include"../views/header.php"?>
<!-- inputs for edit -->
<div class="container col-5" style="margin-top: 100px;">
    <div class="max-auto">
        <div class="card card-body">
            <form action="edit.php?id=<?php echo $_GET["id"]?>" method="POST">
                <div class="form-group mb-3">
                    <input type="text" name="firstName" class="form-control form-control-lg" 
                    placeholder="new first name" autofocus value="<?php echo $firstName?>">
                    <input type="text" name="lastName" class="form-control form-control-lg" 
                    placeholder="new last name" autofocus value="<?php echo $lastName?>">
                </div>
                <button class="btn btn-success btn-block form-control mb-3" name="update">
                    Update
                </button>
            </form>
        </div>
    </div>
</div>
<!-- inputs for edit -->
<?php include"../views/footer.php"?>