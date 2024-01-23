<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Add prodcut</h2>
    <form action="index.php?url=add-product" method="post">
        <p>name</p>
        <input type="text" name="name">
        <p>price</p>
        <input type="number" name="price">
        <p>Category</p>
        <select name="cate_id" id="">
            <?php foreach($categories as $value): ?>
            <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit" name="them">add</button>
    </form>
</body>

</html>