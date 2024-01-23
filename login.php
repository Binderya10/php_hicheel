<html>
<head>
    <title>Профайл сайт</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>


<?php
echo 'PHP код байна';
?>


<div class="container text-left">
    <form action="check.php" method="post">
    <div class="row">
        <div class="col-md-4 col-2">

        </div>
        <div class="col-md-4 col-8">
            <?php
            if (isset($_GET['error']) && $_GET['error'] == 1) {
            ?>
                <div class="alert alert-warning" role="alert">
                    Нэвтрэх нэр эсвэл нууц үг буруу
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_GET['error']) && $_GET['error'] == 1) {
                echo ' <div class="alert alert-warning" role="alert">
                    Нэвтрэх нэр эсвэл нууц үг буруу
                </div>';
            } elseif (isset($_GET['error']) && $_GET['error'] == 2){
                echo ' <div class="alert alert-warning" role="alert">
                    session дууссан байна. Дахин нэвтэрч орно уу.
                </div>';
            } elseif (isset($_GET['error']) && $_GET['error'] == 3){
                echo ' <div class="alert alert-warning" role="alert">
                    Системээс гарлаа.
                </div>';
            } else {
                // эсрэг нөхцөл

            }
            ?>


            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Нэтрэх нэр</label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="имэйл оруулна уу">
            </div>
        </div>
        <div class="col-md-4 col-2">

        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-2"></div>
        <div class="col-md-4 col-8">
            <div class="mb-3">
                <label class="form-label">Нууц үг</label>
                <input name="pass" type="password" placeholder="Нууц үг оруулна уу" class="form-control">

            </div>
        </div>
        <div class="col-md-4 col-2"></div>
    </div>
    <div class="row">
        <div class="col-md-4 col-2"></div>
        <div class="col-md-4 col-8">
            <div class="mb-3">
                <button type="submit" class="btn btn-primary" >Нэтрэх</button>

            </div>
        </div>
        <div class="col-md-4 col-2"></div>
    </div>
    </form>
</div>



<script src="script/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>