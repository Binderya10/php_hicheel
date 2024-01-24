<?php
include ("header.php");
include ("database.php");

if(isset($_POST['tobvchshuu'])){
    $catname = $_POST['cat'];
    $id = $_POST['id'];

    $time = date("Y-m-d H:i:s", time());
    $stmt = $conn->prepare("update category set cat_name = ? where id = ?");
    $stmt->bind_param('ss',$catname, $id);
    $stmt->execute();
    echo "<p class='text-success'>Амжилттай хадгаллаа</p>";
}

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $stmt = $conn->prepare("select * from category where id = ?");
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $cat_name = '';
    if($row = $result->fetch_array(MYSQLI_ASSOC)){
        $cat_name = $row['cat_name'];
    }
}
echo $id;
?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] . '?id=' . $id;?>">  <!-- category.php -->
    <h1>Ангилал засах</h1>
    <div class="row">
        <div class="col py-2">
            <label class="form-label">Нэр</label>
            <input type="text" name="cat" class="form-control" value="<?php echo $cat_name;?>">
            <input type="hidden" name="id" value="<?php echo $id;?>">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" name="tobvchshuu" class="btn btn-secondary">Хадгалах</button>
        </div>
    </div>
</form>


<?php
include ("footer.php");
?>
