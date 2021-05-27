<?php
echo "<form class='needs-validation' action='index.php?type=$_GET[type]&room=$_GET[id]&form=true' method='POST'>";
echo "<fieldset>";

    echo "<legend>Customer Information</legend>";
    echo "<br class='visible-xs'>";

    echo "<div class='g-3 align-items-center'>";
        echo "<div class='col-6 input-group-lg' style='display:inline-flex'>";
            echo "<span class='input-group-text'>TRID NO/FIN</span>";
            echo "<input type='text' placeholder='PASSAPORT NO/FIN' class='form-control' name='passaport'
            pattern='[0-9]{11}' required>";
        echo "</div>";
    echo "</div>";

    echo "<br class='visible-xs'>";

    echo "<div class='input-group input-group-lg'>";
        echo "<span class='input-group-text'>Name</span>";
        echo "<input type='text' placeholder='First name' class='form-control'
            name='firstName' pattern='[A-Za-z]{}' required>";
        echo "<input type='text' placeholder='Middle name' class='form-control'
            name='middleName' pattern='[A-Za-z]{}' required>";
        echo "<input type='text' placeholder='Last name' class='form-control'
            name='lastName' pattern='[A-Za-z]{}' required>";
    echo "</div>";

    echo "<br class='visible-xs'>";

    echo "<div class='g-3 align-items-center'>";
        echo "<div class='col-4 input-group-lg' style='display:inline-flex'>";
            echo "<span class='input-group-text'>Birth date</span>";
            echo "<input type='date' placeholder='Birth date' class='form-control' name='birthDate' required>";
        echo "</div>";
    echo "</div>";

    echo "<br class='visible-xs'>";

    echo "<div class='row g-2'>";
        echo "<div class='col-md form-floating'>";
            echo "<input type='email' class='form-control' id='floatingInput' 
                placeholder='name@example.com' name='mail' required>";
            echo "<label for='floatingInput'>Email address</label>";
        echo "</div>";
        echo "<div class='col-md form-floating'>";
            echo "<input type='text' class='form-control' id='floatingInput' 
                placeholder='0090 (5**) *** ** **' name='phone' pattern='[0-9]{14}' required>";
            echo "<label for='floatingInput'>Phone</label>";
        echo "</div>";
    echo "</div>";

    echo "<br class='visible-xs'>";

    echo "<div class='input-group input-group-lg'>";
        echo "<span class='input-group-text'>Enter date - Exit date</span>";
        echo "<input type='date' placeholder='Enter date' class='form-control' name='enterDate' required>";
        echo "<input type='date' placeholder='Exit Date' class='form-control' name='exitDate' required>";
    echo "</div>";

    echo "<br class='visible-xs'>";

    //echo "<a type='submit' href='index.php?type=$_GET[type]' class='btn btn-primary float-end col-3'>Ckeck in</a>";
    echo "<input type='submit' class='btn btn-primary float-end col-3 form-control'
        name='checkIn' value='Check in' required>";
echo "</fieldset>";

echo "</form>";

?>