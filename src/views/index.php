<!DOCTYPE html>
<html>

<head>
    <title>Products</title>
</head>

<body>
    <h1>Products</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row): ?>
                <tr>
                    <td>
                        <?= $row['name'] ?>
                    </td>
                    <td>
                        <?= $row['price'] ?>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a href="create.php">Create new product</a>
</body>

</html>