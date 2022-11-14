<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members Dashboard</title>

    <link rel="stylesheet" href="./assets/css/dashboard.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body">
    <?php require_once("assets/html/header.html") ?>
    
    <div class="container">
        <a id="home" class="btn btn-outline-secondary" href="./"><i class="bi bi-arrow-90deg-left"></i></a>
        <div class="d-flex justify-content-center">
            <h1 class="mb-3">Members Dashboard</h1>
        </div>

        <div class="dashboard">
            <table class="table table-hover" border="1" width="80%">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name users</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Sport</th>
                        <th colspan='2'>Actions</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach($members as $member) {
                    echo "<tr>";
                    echo "<td>" . $member["id"] . "</td>";
                    echo "<td>" . $member["name"] . "</td>";
                    echo "<td>" . $member["last_name"] . "</td>";
                    echo "<td>" . $member["email"] . "</td>";
                    echo "<td>" . $member["sport"] . "</td>";
                    echo "<td colspan='2' class='tg-0lax'>
                    <a class='btn btn-outline-warning' href='?controller=Member&action=getMember&id=" . $member["id"] . "'><i class='bi bi-pencil-fill'></i></a>
                    <a class='btn btn-outline-danger' href='?controller=Member&action=deleteMember&id=" . $member["id"] . "'><i class='bi bi-trash3-fill'></i></a>
                    </tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            <a href="?controller=Member&action=createMember" class="btn btn-outline-primary btn-lg w-40">
                <i class="bi bi-plus-circle-fill"></i> NEW
            </a>
        </div>
    </div>

</body>
</html>

<!-- pau -->