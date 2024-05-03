<?php
include "db_connect.php";

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize user input
    $content = $_POST["content"] ?? "";
    $content = htmlspecialchars($content);
    
    // Insert user input into database
    $sql = "INSERT INTO posts (content) VALUES ('$content')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
<body>
    <h2>What's on your mind?</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <textarea name="content" rows="4" cols="50"></textarea><br><br>
        <input type="submit" value="Post">
    </form>
</body>
</html>
