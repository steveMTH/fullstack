<?php
session_start();
?>
<?php include("views/header.php") ?>

<div class="container p-4" style="margin-top: 100px;">
    <div class="row align-self-center">
        <div class="col-4">

            <!-- alert for result (insertion success or failed , connection success or failed) -->   
            <!-- alert -->   
            <?php if(isset($_SESSION["massage"])){?>
                <div class="alert alert-<?= $_SESSION["massage_type"];?> alert-dismissible fade show" role="alert">
                    <?= $_SESSION["massage"];?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();}?>
            <!-- alert -->

            <!-- inputs for insertion -->
            <div class="card card-body">
                <form action="./database/insert.php" method="POST">
                    <div class="form-group mb-3">
                        <input type="text" name="firstName" class="form-control form-control-lg" 
                            placeholder="first name" autofocus>
                        <input type="text" name="lastName" class="form-control form-control-lg"
                            placeholder="last name" autofocus>
                    </div>
                    <input type="submit" class="btn btn-success btn-block form-control mb-3"
                        name="insert" value="insert">
                </form>
            </div>
            <!-- inputs for insertion -->
        </div>
        
        <!-- table select from users table -->
        <div class="col-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="table-info">Id</th>
                        <th class="table-info">first name</th>
                        <th class="table-info">last name</th>
                        <th class="table-info">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        require_once "./database/DBConnection.php";
                        $db = new DBConnection();
                        $dbConnection = $db->getConnection();

                        if($dbConnection){
                            $query = "SELECT * from users";
                            $result = mysqli_query($dbConnection, $query);
                            while($row = mysqli_fetch_array($result)){
                            ?>
                            <tr>
                                <td class="col-2"><?php echo $row["id"]?></td>
                                <td class="col-4"><?php echo $row["firstName"]?></td>
                                <td class="col-4"><?php echo $row["lastName"]?></td>
                                <td class="col-2" style="display: contents;">
                                    <a href="./database/delete.php?id=<?php echo $row["id"]?>" 
                                    class="btn btn-danger col-6">Delete</a>
                                    <a href="./database/edit.php?id=<?php echo $row["id"]?>" 
                                    class="btn btn-warning col-6">Edit</a>
                                </td>
                            </tr>
                            
                        <?php }}
                        else {?>
                            <!-- if connection failed -->
                            <tr>
                                <td class="table-danger"><?php echo "connection failed"?></td>
                                <td class="table-danger"><?php echo "connection failed"?></td>
                                <td class="table-danger"><?php echo "connection failed"?></td>
                            </tr>
                        <?php }?>
                </tbody>
            </table>
        </div>
        <!-- table select from users table -->
    </div>
</div>
    
<?php include("views/footer.php") ?>