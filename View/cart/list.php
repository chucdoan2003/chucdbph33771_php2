<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Product Name</td>
            <td>Quantity</td>
            <td>total</td>
            <td>Delete</td>

        </tr>
    </thead>
    <tbody>
        <?php foreach($listCarts as $key=> $value):?>
        <tr>

            <th scope="row">
                <?php echo $key+1?>
            </th>
            <td>
                <?php echo $value['username']?>
            </td>
            <td>
                <?php echo $value['name']?>
            </td>
            <td>
                <?php echo $value['quantity']?>
            </td>
            <td>
                <?php echo $value['total']?>

            </td>

            <td><a onclick="return confirm('Bạn có muốn xóa khỏi giỏ hàng phẩm không ?')"
                    href="?url=delete-cart&id=<?php echo $value['id']?>">
                    <button class="btn btn-danger">delete</button></a></td>
            </form>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>