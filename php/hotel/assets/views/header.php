<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Hilton Holtel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" 
        crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    
    <div class="container">
        <!-- navbar-->
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">
                    <img src="./modules/WW.svg" alt="Hilton logo">
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Check in</a>
                <ul class="dropdown-menu bg-secondary">
                    <li><a class="dropdown-item" href="?type=0">one person rooms</a></li>
                    <li><a class="dropdown-item" href="?type=1">Multy person room</a></li>
                    <li><a class="dropdown-item" href="?type=2">Sweet</a></li>
                </ul>
            </li>
        </ul>
    </div><!-- navbar-->

    