<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

    <main class="login">
        <form class="needs-validation" id="login-form" method="POST" action="index.php?controller=Login&action=validLogin">      
            <img class="mb-4" src="./assets/img/logotr.png" alt="Hamilton Sports Center's Logo" />

            <h1 class="text-center">Hamilton SC</h1>

            <div class="form-group was-validated">
                <label class="form-label" for="email">Email address</label>
                <input class="form-control" type="email" id="email" name="user-email" required />
                <div class="invalid-feedback">
                    Please enter your email adress
                </div>
            </div>

            <div class="form-group was-validated">
                <label class="form-label" for="password">Password</label>
                <input class="form-control" type="password" id="password" name="user-password" required />
                <div class="invalid-feedback">
                    Please enter your password
                </div>
            </div>

            <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] == "1") {
                        ?>
                        <div class="alert alert-danger incorrect-credentials-alert" role="alert">
                            Email not registered
                        </div>
                        <?php
                    } else if ($_GET["error"] == "2") {
                        ?>
                        <div class="alert alert-danger incorrect-credentials-alert" role="alert">
                            Incorrect password
                        </div>
                        <?php
                    }
                } 
            ?>

            <input class="btn btn-success w-100" type="submit" value="Login" name="login" />

            <p class="mt-5 mb-3 text-muted">&copy; 2022 Hamilton Sports Center, Inc</p>
        </form>
    </main>

</body>
</html>


<!--  tony -->



<?php

// echo "<pre>";
// print_r($this->data);
// echo "</pre>";

// foreach ($this->data as $index => $loginData) {
//     echo "loginData = ";
//     echo "<pre>";
//     print_r($loginData);
//     echo "</pre>";

//     $pwdInput = "r123";
//     $pwdHashedInDb = $loginData["password"];
//     $pwdVerify = password_verify($pwdInput, $pwdHashedInDb);

    // if ($loginData["email"] === "rafanadal@gmail.com" && $loginData["password"] === $pwdInput) {
    //     if ($pwdVerify) {
    //         echo "GO TO MAIN";
    //     }
    // } else {
    //     echo "GO TO LOGIN AGAIN";
    // }
// }