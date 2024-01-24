<?php
include ("header.php");
include ("database.php");
?>

<div class="row">
    <div class="col py-5 text-end pe-5">
        <a href="news.php" class="btn btn-success">Нэмэх</a>
    </div>
</div>

<?php
$stmt = $conn->prepare("select * FROM news");
$stmt->execute();
$result = $stmt->get_result();
?>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Зураг</th>
        <th scope="col">Гарчиг</th>
        <th scope="col">Огноо</th>
        <th scope="col">Үйлдэл</th>
    </tr>
    </thead>
    <tbody>
<?php
while ($row = $result->fetch_array(MYSQLI_ASSOC)){
    // news хүснэгтийн утга хэвлэх
//    print_r($row);
    ?>
    <tr>
      <th scope="row"><?php echo $row['id'];?></th>
      <td><img src="upload/<?php echo $row['img_url'];?>" width="100px"></td>
      <td><a href="newsedit.php"> <?php echo $row['title'];?> </a></td>
      <td><?php echo $row['created_date']; ?></td>
      <td><a href="#" class="btn btn-danger" onclick="deleteNews('<?php echo $row['title'];?>', <?php echo $row['id'];?>);">Устгах</a> <a href="newsedit.php" class="btn btn-success">Засах</a></td>
    </tr>
<?php
}
?>
    </tbody>
</table>


<?php
include("footer.php");
?>
