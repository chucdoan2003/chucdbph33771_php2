<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Add prodcut</h2>
    <form action="index.php?url=edit-product&id=<?php echo $products['id'] ?>" method="post">
        <p>name</p>
        <input type="text" name="name" value="<?php echo $products['name'] ?>">
        <p>price</p>
        <input type="number" name="price" value="<?php echo $products['price'] ?>">
        <p>Category</p>
        <select name="cate_id" id="">
            <?php foreach($categories as $value): ?>
            <option value="<?php echo $value['id'] ?>"
                <?php if($products['cate_ID']==$value['id']){echo 'selected';} ?>>
                <?php echo $value['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="edit">edit</button>
    </form>
</body>

</html>