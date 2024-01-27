<?php
include "headerweb.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $title = '';
    $content = '';
    $img_url = '';
    $createdDate = '';
    $catname = '';
    $stmt = $conn->prepare("select * from news n join category c on c.id = n.id where n.id = ?");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($row = $result->fetch_array(MYSQLI_ASSOC)){
        $catname = $row['cat_name'];
        $title = $row['title'];
        $content = $row['content'];
        $img_url = $row['img_url'];
        $createdDate = $row['created_date'];
    }
}else{
    echo 'ID дамжуулаагүй байна';
    exit();
}
?>

<div class="row">
    <div class="col">
        <?php if($img_url != '') { ?>
            <img src="upload/<?php echo $img_url;?>" class="w-75">
        <?php }?>
        <h1>
            <?php echo $title;?>
        </h1>
        <p>
            <?php echo $catname;?> | <?php echo $createdDate?>
        </p>
        <p class="py-5">
            <?php echo $content;?>
        </p>
    </div>
</div>
<?php
include "footerweb.php";
?>
