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

// Query to retrieve all books
$sql = "SELECT id, title, publisher, author, edition, no_of_page, price, publish_date, isbn FROM books";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Books List</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #aaa; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>

<h2>Books Data</h2>

<?php
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Title</th>
            <th>Publisher</th>
            <th>Author</th>
            <th>Edition</th>
            <th>Pages</th>
            <th>Price</th>
            <th>Publish Date</th>
            <th>ISBN</th>
          </tr>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row["id"]}</td>
                <td>{$row["title"]}</td>
                <td>{$row["publisher"]}</td>
                <td>{$row["author"]}</td>
                <td>{$row["edition"]}</td>
                <td>{$row["no_of_page"]}</td>
                <td>{$row["price"]}</td>
                <td>{$row["publish_date"]}</td>
                <td>{$row["isbn"]}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No books found.</p>";
}

$conn->close();
?>

</body>
</html>
