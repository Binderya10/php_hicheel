<?php
include ("header.php");
include ("database.php");
include ("functions/functions.php");

if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $catid = $_POST['cat'];
    $content = $_POST['content'];
    if($_FILES['imagefile']['name'] != ''){
        // Шинэ зураг хадгална
        $fileName = $_FILES['imagefile']['name'];
        $fileNameUnic = fileNameGenegerate($fileName);

        if(move_uploaded_file($_FILES['imagefile']['tmp_name'], "upload/".$fileNameUnic)){
            // Амжилттай хуулагдсан гэсэн үг
        }else{
            echo "Файл хуулахад алдаа гарлаа";
        }

        $stmt = $conn->prepare("update news set title = ?, cat_id = ?, content = ? , img_url = ?, updated_date = now() where id = ?");
        $stmt->bind_param('sssss', $title, $catid, $content, $fileNameUnic, $id);
        $stmt->execute();

        echo "<p class='text-success'>Амжилттай заслаа</p>";

    }else{
        // Зургийн нэр өөрчлөхгүйгээр хадгална
        $time = date('Y-m-d H:i:s', time());
        $stmt = $conn->prepare("update news set title = ?, cat_id = ?, content = ?, updated_date = ? where id = ?");
        $stmt->bind_param('sssss', $title, $catid, $content, $time, $id);
        $stmt->execute();

        echo "<p class='text-success'>Амжилттай заслаа</p>";
    }

}


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $title = '';
    $content = '';
    $catid = '';
    $imageUrl = '';

    $stmt = $conn->prepare("select * from news where id = ?");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if($row = $result->fetch_array(MYSQLI_ASSOC)){
        $title = $row['title'];
        $content = $row['content'];
        $catid = $row['cat_id'];
        $imageUrl = $row['img_url'];
    }
}

$stmt = $conn->prepare("select * from category");
$stmt->execute();
$result = $stmt->get_result();
$category = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
    array_push($category, $row);
}
?>

<h1> Мэдээ засах</h1>
<form action="newsedit.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Гарчиг</label>
        <input name="title" value="<?php echo $title; ?>" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        <input name="id" type="hidden" value="<?php echo $id; ?>">
    </div>
    <div class="mb-3">
        <div class="form-floating">
            <select name="cat" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option value="">Сонгоно уу ...</option>
                <?php
                foreach ($category as $cat){
                    if($catid == $cat['id']){
                        ?>
                        <option value="<?php echo $cat['id'];?>" selected> <?php echo $cat['cat_name'];?></option>
                        <?php
                    } else {
                        echo '<option value="' . $cat['id'] . '">' . $cat['cat_name'] . '</option>';
                    }
                }
                ?>

            </select>
            <label for="floatingSelect">Ангилал</label>
        </div>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Агуулга</label>
        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $content;?></textarea>
    </div>
    <div class="row mb-3">
        <div class="col">
            <img src="upload/<?php echo $imageUrl;?>" width="200">
        </div>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Зураг оруулах</label>
        <input name="imagefile" class="form-control" type="file" id="formFile">
    </div>
    <button name="submit" type="submit" class="btn btn-secondary">Хадгалах</button>
</form>



<?php
include ("footer.php");
?>
