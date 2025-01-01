<!DOCTYPE html>
<html>
<head>
    <title><?= isset($user) ? 'Edit User' : 'Add User' ?></title>
</head>
<body>
    <h1><?= isset($user) ? 'Edit User' : 'Add User' ?></h1>
    <form method="POST">
        <label>Name:</label>
        <input type="text" name="name" value="<?= $user['name'] ?? '' ?>" required>
        <br>
        <label>Email:</label>
        <input type="email" name="email" value="<?= $user['email'] ?? '' ?>" required>
        <br>
        <button type="submit"><?= isset($user) ? 'Update' : 'Create' ?></button>
    </form>
</body>
</html>
