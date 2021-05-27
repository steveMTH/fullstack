<div class="main" style="margin-top: 70px;"><!-- main -->

<?php
    session_start();

    //form controller and make inset into room table by roomId , customer information
    if(isset($_GET["form"])){
        if(isset($_POST["checkIn"])){
            $passaport = $_POST["passaport"];
            $firstName = $_POST["firstName"];
            $middleName = $_POST["middleName"];
            $lastName = $_POST["lastName"];
            $birthDate = $_POST["birthDate"];
            $mail = $_POST["mail"];
            $phone = $_POST["phone"];
            $enterDate = $_POST["enterDate"];
            $exitDate = $_POST["exitDate"];

            
            require_once "./assets/db/DBConnection.php";
            $db = new DBConnection();
            if ($conn = $db->getConnection()) {
                $query = "INSERT INTO customer values(default, '$passaport' , '$firstName', '$middleName', '$lastName', '$birthDate', '$phone', '$mail', '$enterDate', '$exitDate')";
                $queryCustomer = "SELECT id from customer where TC = $passaport";

                if($result  = mysqli_query($conn, $query) && $resulCustomer = mysqli_query($conn, $queryCustomer)){
                    //search to cutomerid
                    if (mysqli_num_rows($resulCustomer) == 1) {
                        $row = mysqli_fetch_array($resulCustomer);
                        $id = $row["id"];
                        mysqli_query($conn, "UPDATE room SET customer_id =$id WHERE id = $_GET[room]");
                        
                        $_SESSION["massage"] = "check in successfully";
                        $_SESSION["massage_type"] = "success";
                    }
                    else{
                        $_SESSION["massage"] = "query is failed";
                        $_SESSION["massage_type"] = "danger";
                    }

                }
                else{
                    $_SESSION["massage"] = "query is failed";
                    $_SESSION["massage_type"] = "danger";

                }
                mysqli_close($conn);
            }
            else {
                $_SESSION["massage"] = "db connection is failed";
                $_SESSION["massage_type"] = "danger";
            }
        }
        else{
            $_SESSION["massage"] = "check in failed";
            $_SESSION["massage_type"] = "danger";
        }
    }
    //when click on check in and select room type
    if(isset($_GET["type"]) && !isset($_GET["id"])){

        //toast massages
        if(isset($_SESSION["massage"])){
            echo "<div class='alert alert-$_SESSION[massage_type] alert-dismissible fade show' role='alert'>";
                echo "<h4>$_SESSION[massage]</h4>";
                echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'>";
                $_SESSION["massage"] = null;
                echo "</button>";
            echo "</div>";
        }
        
        $roomType = $_GET["type"];
        
        //create connection with database
        require_once "./assets/db/DBConnection.php";
        $db = new DBConnection();
        if ($conn = $db->getConnection()) {
            
            //update data , make check out to customers if exit date came
            $db->checkOutCustomer($conn);

            $query = "SELECT * FROM room WHERE room_type = $roomType";
            $result = mysqli_query($conn, $query);
            if ($result) {
                while ($row = mysqli_fetch_array($result)) {
                    //selected from room table
                    $roomId = $row["id"];
                    $roomType = $row["room_type"];
                    $customerId = $row["customer_id"];

                    if($customerId !== null){
                        //selected from customer ,for give us exit date
                        $queryCuctomer = "SELECT * FROM customer WHERE id = $customerId";
                        $resultCustomer = mysqli_query($conn, $queryCuctomer);
                        $exitDate = "";
                        if (mysqli_num_rows($resultCustomer) == 1) {
                            $rowCustomer = mysqli_fetch_array($resultCustomer);
                            $exitDate = $rowCustomer["exit_date"];
                        } else {
                            $exitDate = null;
                            $_SESSION["massage"] = "db upgrade";
                            $_SESSION["massage_type"] = "danger";
                        }
                    }

                    //create room on interface
                    if($customerId !== null){
                        echo "<a href='#' class='pe-none col-3 room'>";    
                    }
                    else{
                        echo "<a href='?type=$roomType&id=$roomId' class='pe-auto col-3 room'>";
                    }
                        echo "<div class='position-relative'>";
                            echo "<img src='./modules/$roomType.jpg' width='340' height='300'>";
                            echo "<div class='room-situation max-auto'>";
                                echo "<span>Room NO: $roomId</span>";
                                echo "<br>";
                                if ($roomType == 0) {
                                    echo "<span>Room Type : 1 person</span>";
                                } else if ($roomType == 1) {
                                    echo "<span>Room Type : multy person</span>";
                                } else if ($roomType == 2) {
                                    echo "<span>Room Type : sweet</span>";
                                }
                                echo "<br>";
                                if ($customerId === null) {
                                    echo "<span>empty</span>";
                                } else {
                                    echo "<span style='color: red; font-size: 1.2em;'>
                                            full to $exitDate</span>";
                                    echo "<br>";
                                }
                            echo "</div>";
                        echo "</div>";
                    echo "</a>";
                    $exitDate = null;
                }
            } else {
                $_SESSION["massage"] = "query is failed";
                $_SESSION["massage_type"] = "danger";
            }
            mysqli_close($conn);
        } else {
            $_SESSION["massage"] = "db connection is failed";
            $_SESSION["massage_type"] = "danger";
        }
    }
    else if(isset($_GET["type"]) && isset($_GET["id"])){
        include "./assets/views/form.php";
        
    }
    else{
        echo "<div>";
            echo "<img src='./modules/background.jpg'>";
        echo "</div>";
    }

?>
</div><!-- main -->