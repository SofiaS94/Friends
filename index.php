<!DOCTYPE html>
<html>

<head>
    <title>Friends List</title>
</head>

<body>
    <h1>Friends List</h1>

    <?php
    require_once 'connec.php';
    $pdo = new \PDO(DSN, USER, PASS);
    $sql = "SELECT * FROM friend";
    $statement = $pdo->query($sql);

    echo "<ul>";
    while ($row = $statement->fetch()) {
        echo "<li>{$row['firstname']} {$row['lastname']}</li>";
    }
    echo "</ul>"; ?>

    <h2>Add a friend</h2>

    <form action="" method="POST">
        <label for="firstname">Firstname:</label>
        <input type="text" name="firstname" required><br><br>

        <label for="lastname">Lastname:</label>
        <input type="text" name="lastname" required><br><br>

        <input type="submit" value="Add">
    </form>

    <?php
    if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];


        if (strlen($firstname) > 45 || strlen($lastname) > 45) {
            echo "Error: Firstnames and Lastnames must be less than 45 characters";
            exit();
        }

        $sql = "INSERT INTO friend (firstname, lastname) VALUES (:firstname, :lastname)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['firstname' => $firstname, 'lastname' => $lastname]);
        header("Location: index.php");
        exit();
    } ?>
</body>

</html>
