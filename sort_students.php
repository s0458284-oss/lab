<?php
// Database connection
$servername = "localhost";
$username = "root";      // default user for XAMPP
$password = "";          // default password is empty
$dbname = "student_db";  // database we created earlier

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

// Fetch all student records
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

$students = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
}

// --- Selection Sort Function ---
function selectionSort(&$arr, $key) {
    $n = count($arr);
    for ($i = 0; $i < $n - 1; $i++) {
        $min_index = $i;
        for ($j = $i + 1; $j < $n; $j++) {
            if ($arr[$j][$key] < $arr[$min_index][$key]) {
                $min_index = $j;
            }
        }
        // Swap
        if ($min_index != $i) {
            $temp = $arr[$i];
            $arr[$i] = $arr[$min_index];
            $arr[$min_index] = $temp;
        }
    }
}

// ✅ Sort by "id"
if (!empty($students)) {
    selectionSort($students, 'id');
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records Sorted by ID (Selection Sort)</title>
    <style>
        body {
            background: linear-gradient(135deg, #283c86, #45a247);
            font-family: 'Poppins', sans-serif;
            color: #fff;
            text-align: center;
            padding: 50px;
            margin: 0;
        }
        h1 {
            font-size: 2.2em;
            margin-bottom: 20px;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 70%;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 20px;
            border-bottom: 1px solid rgba(255,255,255,0.3);
        }
        th {
            background-color: rgba(0,0,0,0.3);
            text-transform: uppercase;
        }
        tr:hover {
            background-color: rgba(255,255,255,0.2);
        }
        footer {
            margin-top: 50px;
            font-size: 0.9em;
            color: rgba(255,255,255,0.7);
        }
    </style>
</head>
<body>

    <h1>Student Records Sorted by ID (Selection Sort)</h1>

    <?php if (!empty($students)) : ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Marks</th>
            </tr>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['id']; ?></td>
                    <td><?= htmlspecialchars($student['name']); ?></td>
                    <td><?= $student['marks']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p>No student records found.</p>
    <?php endif; ?>

    <footer>
        &copy; <?= date("Y"); ?> Student Sorting System
    </footer>

</body>
</html>
