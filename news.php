<?php
include ("header.php");
include ("database.php");
include ("functions/functions.php");
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    // …
//}
if(isset($_POST['submit'])){
    // Хадгална
//   echo $_POST['title'];
    $titleVar = $_POST['title'];
    $contentVar = $_POST['content'];
    $fileVar = $_FILES['imagefile']['name'];
    $catid = $_POST['cat'];

    $fileName = fileNameGenegerate($fileVar); // upload/nom.jpg  upload/nom-324523dsfsf.jpg

    echo $titleVar;
    echo "<br>";
    echo $contentVar;
    echo "<br>";
    echo  $fileVar;
    echo "<br>";

    if(file_exists($fileName)){
        echo "Файлын нэр давхардаж байна";
        exit();
    }

    echo fileNameGenegerate($fileVar);
    echo basename($_FILES['imagefile']['name'])."<br>";
    echo pathinfo($fileVar, PATHINFO_EXTENSION)."<br>";
    echo "file iin hemjee:". $_FILES['imagefile']['size'] . "<br>";
    if($_FILES['imagefile']['size'] > 500000){
        echo "Файлын хэмжээ том байна.";
        exit();
    }

    if(move_uploaded_file($_FILES['imagefile']['tmp_name'], "upload/".$fileName)){
        echo "OK";
    }else{
        echo "Файл хуулахад алдаа гарлаа";
    }


    $time = date('Y-m-d H:i:s', time());

    $stmt = $conn->prepare("insert into news (title, content,	img_url,	cat_id,	created_date) values 
        (? , ?, ?, ?, now())");
    $stmt->bind_param('ssss',$titleVar, $contentVar, $fileName, $catid);

    $stmt->execute();

}

$stmt = $conn->prepare("select * from category");
$stmt->execute();
$result = $stmt->get_result();
$category = array();
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
    array_push($category, $row);
}
//print_r($category);
?>

<form action="news.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Гарчиг</label>
        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="mb-3">
        <div class="form-floating">
            <select name="cat" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                <option value="">Сонгоно уу ...</option>
                <?php
                foreach ($category as $cat){
                    echo '<option value="'.$cat['id'].'">'.$cat['cat_name'].'</option>';
                }
                ?>

            </select>
            <label for="floatingSelect">Ангилал</label>
        </div>
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Агуулга</label>
        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Зураг оруулах</label>
        <input name="imagefile" class="form-control" type="file" id="formFile">
    </div>
    <button name="submit" type="submit" class="btn btn-secondary">Хадгалах</button>
</form>
<script>
    $( ".nextpage" ).on( "click", function() {
        // alert( "Handler for `click` called." );
        window.location.href = 'news.php';

    } );
</script>
<?php
include("footer.php");
?>
