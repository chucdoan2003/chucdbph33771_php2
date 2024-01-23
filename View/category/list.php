    <h3>List Category</h3>
    <button class="btn btn-success"><a href="index.php?url=add-category">Add category</a></button>
    <table border=1 class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Decription</td>
                <td>Content</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>

        <?php foreach($categories as $value):?>
        <tr>
            <td>
                <?php echo $value['id']?>
            </td>
            <td>
                <?php echo$value['name']?>
            </td>
            <td>
                <?php echo$value['decription']?>
            </td>
            <td>
                <?php echo$value['content']?>
            </td>
            <td><a href="?url=edit-category&id=<?php echo $value['id']?>"><button
                        class="btn btn-warning">edit</button></a></td>
            <td><a onclick="return confirm('Bạn có muốn xóa sản phẩm không ?')"
                    href="?url=delete-category&id=<?php echo $value['id']?>"><button
                        class="btn btn-danger">delete</button></a></td>
        </tr>
        <?php endforeach; ?>

    </table>