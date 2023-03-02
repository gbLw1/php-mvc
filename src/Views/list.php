<!DOCTYPE html>
<html>
<head>
    <title>List Students</title>
</head>
<body>
    <h1>List Students</h1>
    <ul>
        <?php foreach ($students as $student): ?>
        <li>
            <?= $student['name'] ?> - <?= $student['email'] ?> - <?= $student['phone'] ?>
            [<a href="edit.php?id=<?= $student['id'] ?>">Edit</a>]
            [<a href="delete.php?id=<?= $student['id'] ?>">Delete</a>]
        </li>
        <?php endforeach; ?>
    </ul>
    <p><a href="add.php">Add Student</a></p>
</body>
</html>