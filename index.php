<?php include "db.php"; ?>

<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>Spēļu saraksts</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        form { margin-bottom: 20px; }
        input { padding: 5px; margin: 5px; }
        table { border-collapse: collapse; width: 50%; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Spēļu saraksts</h1>
    <p>Jauns teksts</p>


    <form method="POST">
        <input type="text" name="name" placeholder="Spēles nosaukums" required>
        <input type="text" name="author" placeholder="Autors" required>
        <button type="submit">Pievienot</button>
    </form>

    <?php
    // Ja forma tika iesniegta
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $author = $_POST['author'];

        $sql = "INSERT INTO games (name, author) VALUES ('$name', '$author')";
        if ($conn->query($sql) === TRUE) {
            echo "<p>Spēle pievienota!</p>";
        } else {
            echo "<p>Kļūda: " . $conn->error . "</p>";
        }
    }


    $result = $conn->query("SELECT * FROM games");

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Nosaukums</th><th>Autors</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["author"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Nav nevienas spēles.</p>";
    }

    $conn->close();
    ?>
</body>
</html>
