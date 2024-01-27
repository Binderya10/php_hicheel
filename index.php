<?php
include "headerweb.php";

$stmt = $conn->prepare("select * from news order by id desc limit 3");
$stmt->execute();
$result = $stmt->get_result();

$news = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
array_push($news, $row);
}

//$stmt = $conn->prepare("select * from news where cat_id = 1");
$stmt = $conn->prepare("select * from news n join category c on c.cat_name = 'Слайд'
where n.cat_id = c.id
order by n.id desc
limit 5");
$stmt->execute();
$result = $stmt->get_result();

$slide = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
array_push($slide, $row);
}
?>

    <div class="row">
        <div class="col">
            <div id="carouselExampleDark" class="carousel carousel-dark slide">
                <div class="carousel-indicators">
                    <?php
                    $i = 0;
                    foreach ($slide as $s) {
                        echo '<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="'.$i.'" 
                        class="active" aria-current="true" aria-label="Slide '.($i + 1).'">
                            </button>';
                        $i++;
                    }
                    ?>
                </div>
                <div class="carousel-inner">
                    <?php
                    $j = 1;
                    foreach ($slide as $s){
                        ?>
                        <div class="carousel-item <?php if($j == 1) echo 'active';?> myDiv" data-bs-interval="10000">
                            <a href="newsmore.php?id=<?php echo $s['id'];?>">
                                <img src="upload/<?php echo $s['img_url'];?>" class="d-block myImage" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5><?php echo $s['title'];?></h5>
                                    <p><?php echo truncate($s['content'], 10);?></p>
                                </div>
                            </a>
                        </div>
                    <?php
                        $j++; // 2 , 3 , 4, 5 (j = j + 1)
                    }
                    ?>
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
                            <a href="newsmore.php?id=<?php echo $n['id'];?>" class="btn btn-primary">Дэлгэрэнгүй</a>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>




        </div>
    </div>
<?php
include "footerweb.php";
?>