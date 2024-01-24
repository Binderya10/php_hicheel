<?php
include ("header.php");
include ("database.php");

if(isset($_POST['tobvchshuu'])){
    $catname = $_POST['cat'];

    $time = date("Y-m-d H:i:s", time());
//    $stmt = $conn->prepare("insert into category (cat_name, created_date) values (?, ?)");
    $stmt = $conn->prepare("insert into category (cat_name, created_date) values (?, now())");
//    $stmt->bind_param('ss',$catname, $time);
    $stmt->bind_param('s',$catname);
    $stmt->execute();
    echo "<p class='text-success'>Амжилттай нэмлээ</p>";
}
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">  <!-- category.php -->
    <h1>Ангилал нэмэх</h1>
    <div class="row">
        <div class="col py-2">
            <label class="form-label">Нэр</label>
            <input type="text" name="cat" class="form-control">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" name="tobvchshuu" class="btn btn-secondary">Хадгалах</button>
        </div>
    </div>
</form>

<?php
include("footer.php");
?>
