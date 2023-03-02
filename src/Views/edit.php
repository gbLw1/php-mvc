<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?= $student['name'] ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?= $student['email'] ?>" required><br>
        <label for="phone">Phone:</label>
        <input type="tel" id="phone" name="phone" value="<?= $student['phone'] ?>" required><br>
        <input type="submit" value="Update">
    </form>
</body>
</html>