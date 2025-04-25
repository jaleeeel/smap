<?php
    // Start the session
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Registration Options</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        header {
            background-color: #585656;
            color: white;
            padding: 20px;
            text-align: center;
        }
        main {
            padding: 20px;
            text-align: center;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin: 15px 0;
        }
        a {
            text-decoration: none;
            color: #585656;
            background-color: #ffffff;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        a:hover {
            background-color: #e0e0e0;
        }
        footer {
            text-align: center;
            padding: 10px;
            background-color: #faf8f8;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Registration Options</h1>
    </header>
    <main>
        <h2>Select a Registration Type</h2>
        <ul>
            <li><a href="baptismReg.php">Registration for Baptism</a></li>
            <li><a href="communionReg.php">Registration for Communion</a></li>
            <li><a href="confirmationReg.php">Registration for Confirmation</a></li>
            <li><a href="marriageReg.php">Registration for Marriage</a></li>
        </ul>
    </main>
    <footer>
        <p>&copy; 2023 Saint Michael the Archangel Parish. All rights reserved.</p>
    </footer>
</body>
</html>
