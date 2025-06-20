<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "labreport4";

// Connect to database
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success = $error = "";

// Handle delete request
if (isset($_GET["delete_id"])) {
    $delete_id = $_GET["delete_id"];

    $stmt = $conn->prepare("DELETE FROM books WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $delete_id);
        if ($stmt->execute()) {
            $success = "Book deleted successfully.";
        } else {
            $error = "Delete failed: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $error = "Prepare failed: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Book</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background: #f2f2f2; }
    </style>
</head>
<body>

<h2>Books List</h2>

<?php
if ($success) echo "<p style='color:green;'>$success</p>";
if ($error) echo "<p style='color:red;'>$error</p>";
?>

<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Publisher</th>
        <th>Author</th>
        <th>Edition</th>
        <th>Pages</th>
        <th>Price</th>
        <th>Publish Date</th>
        <th>ISBN</th>
        <th>Action</th>
    </tr>

<?php
$result = $conn->query("SELECT * FROM books");
if ($result->num_rows > 0):
    while ($row = $result->fetch_assoc()):
?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['publisher']) ?></td>
        <td><?= htmlspecialchars($row['author']) ?></td>
        <td><?= htmlspecialchars($row['edition']) ?></td>
        <td><?= $row['no_of_page'] ?></td>
        <td><?= $row['price'] ?></td>
        <td><?= $row['publish_date'] ?></td>
        <td><?= htmlspecialchars($row['isbn']) ?></td>
        <td><a href="?delete_id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this book?');">Delete</a></td>
    </tr>
<?php
    endwhile;
else:
    echo "<tr><td colspan='10'>No books found.</td></tr>";
endif;
?>

</table>

</body>
</html>

<?php $conn->close(); ?>
