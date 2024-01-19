<?php
include ("header.php");
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    // …
//}
if(isset($_POST['submit'])){
    // Хадгална
//   echo $_POST['title'];
    $titleVar = $_POST['title'];
    $contentVar = $_POST['content'];
    $fileVar = $_FILES['imagefile']['name'];

    echo $titleVar;
    echo "<br>";
    echo $contentVar;
    echo "<br>";
    echo  $fileVar;
    echo "<br>";

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
