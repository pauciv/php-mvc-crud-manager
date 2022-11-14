<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome</title>
  <link href="../../assets/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous" defer></script>
  <!-- icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
  <?php require_once("assets/html/header.html") ?>

  <!-- <div class="mt-5 d-grid gap-2 d-md-flex justify-content-md-end">
    <a class="btn btn-primary me-md-4" href="?controller=Login&action=closeSession">Logout</a>
  </div> -->
  <div class="container text-center mt-5">
    <h1 class="title">Welcome to Hamilton Sport Center</h1>
  </div>

  <div class="container py-5 text-center">
        <div class="row gx-5">

            <div class="col">
                <h2 class="list-group p-3 border bg-primary bg-opacity-10 fs-5">
                    <a class="list-group-item list-group-item-action" href="?controller=Member&action=getAllMembers">
                        <i class="bi bi-people-fill"></i> Members
                    </a>
                </h2>
            </div>

            <div class="col">
                <h2 class="list-group p-3 border bg-primary bg-opacity-10 fs-5">
                    <a class="list-group-item list-group-item-action" href="?controller=Sport&action=getAllSports">
                    <i class="bi bi-trophy-fill"></i> Sports
                    </a>
                </h2>
            </div>

        </div>
    </div>
</body>

</html>