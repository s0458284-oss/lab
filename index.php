<?php
// File to store visitor count
$counterFile = "counter.txt";

// If the file doesn't exist, create it and set count = 0
if (!file_exists($counterFile)) {
    file_put_contents($counterFile, "0");
}

// Read the current visitor count
$visitorCount = (int) file_get_contents($counterFile);

// Check if the user has already visited (using a cookie)
if (!isset($_COOKIE['visited'])) {
    // New unique visitor
    $visitorCount++;

    // Save new count to file
    file_put_contents($counterFile, $visitorCount);

    // Set a cookie valid for 1 day (86400 seconds)
    setcookie("visited", "yes", time() + 86400);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unique Visitor Counter</title>
    <style>
        body {
            background: linear-gradient(135deg, #1d976c, #93f9b9);
            font-family: 'Poppins', sans-serif;
            color: #fff;
            text-align: center;
            margin: 0;
            padding-top: 100px;
        }

        h1 {
            font-size: 2.8em;
            margin-bottom: 10px;
        }

        .counter-box {
            background-color: rgba(0, 0, 0, 0.3);
            display: inline-block;
            padding: 30px 60px;
            border-radius: 15px;
            font-size: 2em;
            font-weight: bold;
            border: 2px solid rgba(255,255,255,0.4);
            box-shadow: 0 4px 25px rgba(0,0,0,0.2);
        }

        footer {
            margin-top: 80px;
            font-size: 0.9em;
            color: rgba(255,255,255,0.8);
        }
    </style>
</head>
<body>
    <h1>Welcome to Our Website!</h1>
    <p class="counter-box">
        👥 Unique Visitors: <?php echo $visitorCount; ?>
    </p>
    <footer>
        &copy; <?php echo date("Y"); ?> Unique Visitor Counter
    </footer>
</body>
</html>
