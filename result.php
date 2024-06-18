<!DOCTYPE html>
<html>
<head>
    <title>Quiz Result</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/styles.css">
    <link rel="icon" href="assets/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container">
        <header>
            <img src="assets/image.png" alt="Ved Academy Header">
        </header>
        <h2>Your Quiz Result</h2>
        <div class="result">
            <?php
            $score = intval($_GET['score'] ?? 0);
            echo "<p>Your score is: $score out of 50</p>";
            ?>
            <a href="index.html" class="btn btn-primary">Back to Home</a>
        </div>
    </div>
    <footer>
        <p>&copy; 2024 Examination Website. All rights reserved.</p>
    </footer>
</body>
</html>
