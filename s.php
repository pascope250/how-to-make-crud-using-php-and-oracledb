<?php
include('connection.php');
include('setting.php');
if(!ORACLE_DEV_CAT){
    exit;
}
// select data

if (isset($_GET['all_product'])) {
    $sql = "SELECT * FROM products";
    $stid = oci_parse($conn, $sql);

    oci_execute($stid);
    $count = 1;
    while ($row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS)) {
        echo "<tr>";
?>
        <td>
            <?= $count++; ?>
        </td>
        <td><?= $row['NAMES'] ?></td>
        <td><?= $row['COLOR'] ?></td>
        <td><?= $row['QUANTITY'] ?></td>
        <td><?= $row['PRICE'] ?></td>
        <td><a href="javascript:void(0)" id="deletep" data-id="<?= $row['ID'] ?>">delete</a></td>
        <td><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="edit" data-id="<?= $row['ID'] ?>">Update</a></td>
        </tr>
    <?php }
}

if (isset($_POST['insert'])) {
    $id = rand(11111, 99999);
    $name = $_POST['names'];
    $color = $_POST['color'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $sql = "INSERT INTO products (ID,NAMES, COLOR, QUANTITY,PRICE) VALUES ('$id','$name', '$color', '$quantity','$price')";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
}


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM products WHERE id = $id";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    echo "Data Deleted";
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $sql = "SELECT * FROM products WHERE id = $id";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    $row = oci_fetch_array($stid, OCI_ASSOC + OCI_RETURN_NULLS);
    ?>

    <div class="form-group">
        <input type="hidden" name="id" id="" value="<?= $row['ID'] ?>" class="form-control" />
    </div>

    <div class="form-group">
        <label for="names">Product names</label>
        <input type="text" name="names" value="<?= $row['NAMES'] ?>" id="" class="form-control" required />
    </div>

    <div class="form-group">
        <label for="names">Product Color</label>
        <input type="text" name="color" value="<?= $row['COLOR'] ?>" id="" class="form-control" required />
    </div>

    <div class="form-group">
        <label for="q">Product Quantity</label>
        <input type="text" name="quantity" value="<?= $row['QUANTITY'] ?>" id="" class="form-control" required />
    </div>

    <div class="form-group">
        <label for="q">Product Price</label>
        <input type="text" name="price" value="<?= $row['PRICE'] ?>" id="" class="form-control" required />
    </div>
<?php
}



if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['names'];
    $color = $_POST['color'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $sql = "UPDATE products SET names = '$name', color = '$color',price='$price', quantity = '$quantity' WHERE id = $id";
    $stid = oci_parse($conn, $sql);
    oci_execute($stid);
    echo "Data Updated";
}
?>