<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport Dashboard</title>

    <link rel="stylesheet" href="./assets/css/dashboard.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <?php require_once("assets/html/header.html") ?>

    <div class="container-lg">
        <a id="home" class="btn btn-outline-secondary" href="./"><i class="bi bi-arrow-90deg-left"></i></a>
        <div class="d-flex justify-content-center">
            <h1 class="mb-3">Sport Dashboard</h1>
        </div>
        
        <div class="dashboard">
            <table class="table table-hover" border="1">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Sports</th>
                        <th>Enrolled members</th>
                        <th colspan='2'>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach($sports as $sport){
                    echo "<tr>";
                    echo "<td>" . $sport["id"] . "</td>";
                    echo "<td>" . $sport["sport"] . "</td>";
                    echo "<td>" . $sport["enrrolled_members"] . "</td>";
                    echo "<td colspan='2' class='tg-0lax'>
                    <a class='btn btn-outline-warning' href='?controller=Sport&action=getSport&id=" . $sport["id"] ."'><i class='bi bi-pencil-fill'></i></a>
                    <a class='btn btn-outline-danger' href='?controller=Sport&action=deleteSport&id=" . $sport["id"] . "'><i class='bi bi-trash3-fill'></i></a>
                    </td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center">
            <a href="?controller=Sport&action=createSport" class="btn btn-outline-primary btn-lg w-40">
                <i class="bi bi-plus-circle-fill"></i> NEW
            </a>
        </div>
    </div>
</body>
</html>

<?php
// print_r($sports);
?>