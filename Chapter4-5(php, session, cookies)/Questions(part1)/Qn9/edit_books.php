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

$success = $error = "";

// Handle update
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $publisher = $_POST["publisher"];
    $author = $_POST["author"];
    $edition = $_POST["edition"];
    $no_of_page = $_POST["no_of_page"];
    $price = $_POST["price"];
    $publish_date = $_POST["publish_date"];
    $isbn = $_POST["isbn"];

    $stmt = $conn->prepare("UPDATE books SET title=?, publisher=?, author=?, edition=?, no_of_page=?, price=?, publish_date=?, isbn=? WHERE id=?");
    if ($stmt) {
        $stmt->bind_param("ssssidsdi", $title, $publisher, $author, $edition, $no_of_page, $price, $publish_date, $isbn, $id);
        if ($stmt->execute()) {
            $success = "Book updated successfully!";
        } else {
            $error = "Update failed: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $error = "Prepare failed: " . $conn->error;
    }
}

// If editing, fetch data
$book_to_edit = null;
if (isset($_GET["edit_id"])) {
    $edit_id = $_GET["edit_id"];
    $res = $conn->query("SELECT * FROM books WHERE id = $edit_id");
    if ($res && $res->num_rows > 0) {
        $book_to_edit = $res->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Books</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; }
        th { background: #f0f0f0; }
    </style>
</head>
<body>

<h2>Edit Book Details</h2>

<?php
if ($error) echo "<p style='color:red;'>$error</p>";
if ($success) echo "<p style='color:green;'>$success</p>";
?>

<?php if ($book_to_edit): ?>
<form method="POST">
    <input type="hidden" name="id" value="<?= $book_to_edit['id'] ?>">

    Title: <input type="text" name="title" value="<?= htmlspecialchars($book_to_edit['title']) ?>" required><br><br>
    Publisher: <input type="text" name="publisher" value="<?= htmlspecialchars($book_to_edit['publisher']) ?>"><br><br>
    Author: <input type="text" name="author" value="<?= htmlspecialchars($book_to_edit['author']) ?>" required><br><br>
    Edition: <input type="text" name="edition" value="<?= htmlspecialchars($book_to_edit['edition']) ?>"><br><br>
    No. of Pages: <input type="number" name="no_of_page" value="<?= $book_to_edit['no_of_page'] ?>"><br><br>
    Price: <input type="number" step="0.01" name="price" value="<?= $book_to_edit['price'] ?>"><br><br>
    Publish Date: <input type="date" name="publish_date" value="<?= $book_to_edit['publish_date'] ?>"><br><br>
    ISBN: <input type="text" name="isbn" value="<?= htmlspecialchars($book_to_edit['isbn']) ?>"><br><br>

    <input type="submit" name="update" value="Update Book">
</form>
<hr>
<?php endif; ?>

<h2>All Books</h2>
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
        <td><a href="?edit_id=<?= $row['id'] ?>">Edit</a></td>
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
