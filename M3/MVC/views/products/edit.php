<form action="index.php?action=update&id=<?= $row['id'];?>" method="post">
    tên :<input type="text" name="name" value="<?= $row['name'];?>"> <br>
    email: <input type="text" name="email" value="<?= $row['email'];?>"> <br>
    địa chỉ: <input type="text" name="address" value="<?= $row['address'];?>"> <br>

    <input type="submit" value="Cap nhat">
</form>