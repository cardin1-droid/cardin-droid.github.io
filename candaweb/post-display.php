<?php
include "db_connect.php";
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch posts from the database
$sql = "SELECT * FROM posts ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Posts</title>
    <style>
        .post {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h2>Posts</h2>
    <?php
    // Display posts
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='post'>";
            echo "<p>" . $row["content"] . "</p>";
            echo "<form method='post' action='like_post.php'>";
            echo "<input type='hidden' name='post_id' value='" . $row["id"] . "'>";
            echo "<button type='submit'>Like</button>";
            echo "</form>";
            echo "<form method='post' action='comment_post.php'>";
            echo "<input type='hidden' name='post_id' value='" . $row["id"] . "'>";
            echo "<textarea name='comment' rows='2' cols='30'></textarea><br>";
            echo "<button type='submit'>Comment</button>";
            echo "</form>";
            echo "</div>";
        }
    } else {
        echo "No posts yet.";
    }
    ?>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
