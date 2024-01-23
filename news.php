<?php
include ("header.php");
include ("database.php");
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    // …
//}
if(isset($_POST['submit'])){
    // Хадгална
//   echo $_POST['title'];
    $titleVar = $_POST['title'];
    $contentVar = $_POST['content'];
    $fileVar = $_FILES['imagefile']['name'];

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
        (? , ?, ?, 1, now())");
    $stmt->bind_param('sss',$titleVar, $contentVar, $fileName);

    $stmt->execute();

}

function fileNameGenegerate($file){
    // ном.doc
    $extention = pathinfo($file, PATHINFO_EXTENSION); // doc

    $onlyName = str_replace($extention, '', $file); // ном.
    $onlyNameShuu = str_replace('.', '', $onlyName); // ном

    $ret = $onlyNameShuu. "-". uniqid(). ".".$extention; // ном-!23asasfsdf.doc

    return $ret;
}

?>

<form action="news.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Гарчиг</label>
        <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
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
include ("foother.php");
?>
