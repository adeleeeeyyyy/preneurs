<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Voting</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-4">Statistik Voting</h1>
        <div class="mb-4">
            <h2 class="text-2xl font-bold mb-2">Podium</h2>
            <div class="grid grid-cols-3 gap-4">
                <?php
                $conn = new mysqli('localhost', 'root', '', 'voting_db');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $result = $conn->query("SELECT * FROM stands ORDER BY votes DESC LIMIT 3");
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="p-4 bg-white shadow rounded text-center">';
                    echo '<h2 class="text-xl font-bold mb-2">' . $row['name'] . '</h2>';
                    echo '<p class="text-lg">' . $row['votes'] . ' Votes</p>';
                    echo '</div>';
                }
                $conn->close();
                ?>
            </div>
        </div>
        <div>
            <h2 class="text-2xl font-bold mb-2">Stand Lainnya</h2>
            <table class="table-auto w-full bg-white shadow rounded">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Stand</th>
                        <th class="px-4 py-2">Votes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new mysqli('localhost', 'root', '', 'voting_db');
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $result = $conn->query("SELECT * FROM stands ORDER BY votes DESC LIMIT 3, 40");
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td class="border px-4 py-2">' . $row['name'] . '</td>';
                        echo '<td class="border px-4 py-2">' . $row['votes'] . '</td>';
                        echo '</tr>';
                    }
                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
