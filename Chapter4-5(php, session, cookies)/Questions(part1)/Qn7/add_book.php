<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "labreport4";

// Create connection
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = $success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = trim($_POST["title"]);
    $publisher = $_POST["publisher"];
    $author = $_POST["author"];
    $edition = $_POST["edition"];
    $no_of_page = $_POST["no_of_page"];
    $price = $_POST["price"];
    $publish_date = $_POST["publish_date"];
    $isbn = $_POST["isbn"];

    // Basic validation
    if (empty($title) || empty($author)) {
        $error = "Title and Author are required.";
    } else {
        $stmt = $conn->prepare("INSERT INTO books (title, publisher, author, edition, no_of_page, price, publish_date, isbn) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        if (!$stmt) {
            $error = "Prepare failed: " . $conn->error;
        } else {
            $stmt->bind_param("ssssidsd", $title, $publisher, $author, $edition, $no_of_page, $price, $publish_date, $isbn);
            if ($stmt->execute()) {
                $success = "Book added successfully!";
            } else {
                $error = "Error inserting data: " . $stmt->error;
            }
            $stmt->close();
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head><title>Add Book</title></head>
<body>
<h2>Add Book Information</h2>

<?php if ($error) echo "<p style='color:red;'>$error</p>"; ?>
<?php if ($success) echo "<p style='color:green;'>$success</p>"; ?>

<form method="POST">
    Title: <input type="text" name="title" required><br><br>
    Publisher: <input type="text" name="publisher"><br><br>
    Author: <input type="text" name="author" required><br><br>
    Edition: <input type="text" name="edition"><br><br>
    No. of Pages: <input type="number" name="no_of_page"><br><br>
    Price: <input type="number" step="0.01" name="price"><br><br>
    Publish Date: <input type="date" name="publish_date"><br><br>
    ISBN: <input type="text" name="isbn"><br><br>

    <input type="submit" value="Add Book">
</form>
</body>
</html>
