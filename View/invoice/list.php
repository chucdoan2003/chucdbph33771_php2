<h3>Đơn hàng</h3>
<table class="table">
    <thead>
        <tr>
            <td>ID</td>
            <td>Username</td>
            <td>Product Name</td>
            <td>Quantity</td>
            <td>total</td>
            <td>Status</td>
            <td>Hủy</td>


        </tr>
    </thead>
    <tbody>
        <?php foreach($invoices as $key=> $value):?>
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
                <input type="hidden" value="<?php echo $value['total']?>" name="total">
            </td>
            <td>
                <?php if($value['status']==0){
                    echo 'Chờ Xác nhận';
                }else{
                    if($value['status']==4){
                        echo 'Đã hủy';
                    }
                }
                 ?>
            </td>

            <td><?php if($value['status']==4){?>
                <a href="?url=datlai-invoice&id=<?php echo $value['id']?>">
                    <button class="btn btn-primary">Đặt lại</button></a>
                <?php }else{if($value['status']==0){?>
                <a href="?url=cancel-invoice&id=<?php echo $value['id']?>">
                    <button class="btn btn-danger">Cancel</button></a>
                <?php  }} ?>

            </td>

        </tr>
        <?php endforeach; ?>
    </tbody>
</table>