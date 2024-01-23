<h3>Cart</h3>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td><input type="checkbox"></td>
            <td>Username</td>
            <td>Product Name</td>
            <td>Quantity</td>
            <td>total</td>
            <td>Delete</td>
            <td>Invoice</td>

        </tr>
    </thead>
    <tbody>
        <?php foreach($listCarts as $key=> $value):?>
        <tr>
            <form action="?url=add-invoice&id=<?php echo $value['id_cart'] ?>" method="POST">
                <th scope="row">
                    <?php echo $key+1?>
                </th>
                <td><input type="checkbox"></td>

                <td>
                    <?php echo $value['username']?>
                </td>
                <td>
                    <?php echo $value['name']?>
                    <input type="hidden" value="<?php echo $value['id_sp']?>" name="id_sp">

                </td>
                <td>
                    <?php echo $value['quantity']?>
                    <input type="hidden" value="<?php echo $value['quantity']?>" name="quantity">
                </td>
                <td>
                    <?php echo $value['total']?>
                    <input type="hidden" value="<?php echo $value['total']?>" name="total">


                </td>

                <td><a onclick="return confirm('Bạn có muốn xóa khỏi giỏ hàng phẩm không ?')"
                        href="?url=delete-cart&id=<?php echo $value['id']?>">
                        <button class="btn btn-danger">delete</button></a></td>
                <td>
                    <button type="submit" class="btn btn-primary">Invoice</button>
                </td>
            </form>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>