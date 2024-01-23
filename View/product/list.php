<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button class="btn btn-primary"><a href="index.php?url=add-product">Add product</a></button>
    <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Price</td>
                <td>Category</td>
                <td>Quantity</td>
                <td>Edit</td>
                <td>Delete</td>
                <td>ad to cart</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach($products as $value):?>
            <tr>
                <form action="?url=add-cart&id=<?php echo $value['id']?>" method="POST">
                    <th scope="row">
                        <?php echo $value['id']?>
                    </th>
                    <td>
                        <?php echo $value['name']?>
                    </td>
                    <td>
                        <?php echo $value['price']?>
                        <input type="hidden" value="<?php echo $value['price']?>" name="price">
                    </td>
                    <td>
                        <?php echo$value['category_name']?>
                    </td>
                    <td><input type="number" min=1 name="quantity"></td>
                    <td><a href="?url=edit-product&id=<?php echo $value['id']?>"><button
                                class="btn btn-warning">edit</button></a></td>
                    <td><a onclick="return confirm('Bạn có muốn xóa sản phẩm không ?')"
                            href="?url=delete-product&id=<?php echo $value['id']?>">
                            <button class="btn btn-danger">delete</button></a></td>
                    <td><button type="submit" class="btn btn-success">Add to cart</button></td>
                </form>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>