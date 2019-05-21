<?php

use PhpTheDay\Health;

// TODO: use autoload
require_once(__DIR__.'/vendor/autoload.php');

if (!empty($_POST)) {
    $weight = $_POST['weight'] ?? 0;
    $height = $_POST['height'] ?? 0;

    // TODO: apply BMI package
    $health = new Health();
    $bmi = $health->bmi($height, $weight);
    $result = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP The Day - BMI</title>
    <link href="https://unpkg.com/bootstrap@4.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/bootstrap@4.3.1"></script>
</head>
<body>

    <div class="container">

        <h1 class="mt-4">PHP The Day - BMI Calculator</h1>

        <?php if (isset($bmi)): ?>
        <div class="alert alert-success">
            <h3 class="mb-3 h5">計算結果：</h3>
            <p>體重：<?= $weight ?> kg</p>
            <p>身高：<?= $height ?> cm</p>
            <p>BMI：<?= $bmi ?> kg/m<sup>2</sup></p>
            <?php echo isset($result) ? "<p>判定結果： $result</p>" : ""; ?>
        </div>
        <?php endif ?>

        <div class="box mt-4">
            <form action="index.php" method="post">
                <div class="form-group">
                    <label>體重</label>
                    <input type="text" name="weight" class="form-control" placeholder="kg">
                </div>
                <div class="form-group">
                    <label>身高</label>
                    <input type="text" name="height" class="form-control" placeholder="cm">
                </div>
                <button type="submit" class="btn btn-primary">計算 BMI</button>
            </form>
        </div>

    </div>

</body>
</html>
