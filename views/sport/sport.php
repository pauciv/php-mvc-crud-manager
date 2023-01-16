<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="assets/css/form.css">
</head>

<body>
    <?php require_once("assets/html/header.html") ?>

    <?php 
    if (isset($this->data[0]["id"])) {
        echo "<h1 class='text-center'>Sport " . $this->data[0]["id"]."</h1>";
    } else {
        echo "<h1 class='text-center'>New sport</h1>";
    }
    
    if ($this -> action == "getSport" && (!isset($this->data) || !$this->data || sizeof($this->data) == 0)) {
        echo "<p>The sport does not exists!</p>";
    } else if (isset($error)) {
        echo "<p>$error</p>";
    }
    ?>
    <div class="container container-form">
        <main class="form">
            <form action="index.php?controller=Sport&action=<?php echo isset($this->data[0]['id']) ? "updateSport" : "createSport" ?>" method="post">
                
                <input type="hidden" name="id" value="<?php echo isset($this->data[0]['id']) ? $this->data[0]['id'] : null ?>">
                <?php //echo "input hidden: ".$this->data[0]['id']; ?>

                <div class="form-group">
                    <label for="sport">Sport</label>
                    <input required type="text" value="<?php echo isset($this->data[0]['sport']) ? $this->data[0]['sport'] : null ?>" class="form-control" id="sport" name="sport" aria-describedby="sport" placeholder="Sport">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
                <a id="return" class="btn btn-secondary" href="<?php echo "?controller=Sport&action=getAllSports"; ?>">Return</a>

            </form>
        </main>
    </div>
</body>
</html>