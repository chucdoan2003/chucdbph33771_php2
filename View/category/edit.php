<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>edit category</h2>
    <form action="index.php?url=edit-category&id=<?php echo $categories['id'] ?>" method="post">
        <p>name</p>
        <input type="text" name="name" value="<?php echo $categories['name']  ?>">
        <p>decription</p>
        <input type="text" name="decription" value="<?php echo $categories['decription']  ?>">
        <p>content</p>
        <input type="text" name="content" value="<?php echo $categories['content']  ?>">
        <button type="submit" name="edit">edit</button>
    </form>
</body>

</html>