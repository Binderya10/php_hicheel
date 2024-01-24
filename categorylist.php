<?php
include ("header.php");
include ("database.php");

$stmt = $conn->prepare("select * from category");
$stmt->execute();
$result = $stmt->get_result();


?>

<div class="row">
    <div class="col">
        <a href="category.php" class="btn btn-success">Нэмэх</a>
    </div>
</div>

<table class="table table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Нэр</th>
            <th>Үйлдэл</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = $result->fetch_array(MYSQLI_ASSOC)){
        ?>
        <tr>
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['cat_name'];?></td>
            <td>
                <a href="#" class="btn btn-danger"
                   onclick="deleteCategory('<?php echo $row['cat_name'];?>', <?php echo $row['id'];?>)">Устгах</a>
                <a href="categoryedit.php?id=<?php echo $row['id'];?>" class="btn btn-success">Засах</a>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>



<?php
include ("footer.php");
?>
