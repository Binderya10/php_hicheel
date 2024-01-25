<?php
include "config.php";
include "database.php";
include "functions/functions.php";

$stmt = $conn->prepare("select * from news order by id desc limit 3");
$stmt->execute();
$result = $stmt->get_result();

$news = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
    array_push($news, $row);
}
?>
<html>
<head>
    <title><?php echo $SITE_TITLE;?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="css/custome.css" rel="stylesheet">
    <script src="script/jquery-3.7.1.min.js"></script>
    <script src="script/scriptweb.js"></script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col py-3">
            <img src="image/mongol.jpg" width="200">
        </div>
        <div class="col text-end py-3">
            <a href="login.php">Нэвтрэх</a>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <nav class="nav">
                <a class="nav-link active" aria-current="page" href="#">Нүүр</a>
                <a class="nav-link" href="#">Мэдээ</a>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div id="carouselExampleDark" class="carousel carousel-dark slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active myDiv" data-bs-interval="10000">
                        <img src="image/mongol.jpg" class="d-block myImage" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item myDiv" data-bs-interval="2000">
                        <img src="image/chuluunhad.jpg" class="d-block myImage" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item myDiv">
                        <img src="image/sarlag.jpg" class="d-block myImage" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="row">
                <?php
                foreach ($news as $n){
                    ?>
                <div class="col col-sm-4">
                    <div class="card" style="width: 18rem;">
                        <img src="upload/<?php echo $n['img_url'];?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $n['title'];?></h5>
                            <p class="card-text"><?php echo truncate($n['content'], 10);?></p>
                            <a href="newsmore.php" class="btn btn-primary">Дэлгэрэнгүй</a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>




        </div>
    </div>
</div>

<script src="script/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>