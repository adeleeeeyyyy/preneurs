<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Stand Terbaik</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-4">Vote Stand Terbaik</h1>
        <div class="grid grid-cols-4 gap-4">
            <?php
            $conn = new mysqli('localhost', 'root', '', 'voting_db');
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $result = $conn->query("SELECT * FROM stands");
            while ($row = $result->fetch_assoc()) {
                echo '<div class="p-4 bg-white shadow rounded text-center">';
                echo '<h2 class="text-xl font-bold mb-2">' . $row['name'] . '</h2>';
                echo '<form action="vote.php" method="POST">';
                echo '<input type="hidden" name="stand_id" value="' . $row['id'] . '">';
                echo '<button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Vote</button>';
                echo '</form>';
                echo '</div>';
            }
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
