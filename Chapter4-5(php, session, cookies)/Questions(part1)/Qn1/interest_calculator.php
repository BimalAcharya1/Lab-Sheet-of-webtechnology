<!DOCTYPE html>
<html>
<head>
    <title>Interest Calculator</title>
</head>
<body>

<h2>Interest Calculator</h2>
<form method="post" action="">
    <label for="principal">Principal:</label>
    <input type="number" name="principal" required step="any"><br><br>

    <label for="rate">Rate (% per annum):</label>
    <input type="number" name="rate" required step="any"><br><br>

    <label for="time">Time (in years):</label>
    <input type="number" name="time" required step="any"><br><br>

    <input type="submit" name="simple" value="Calculate Simple Interest">
    <input type="submit" name="compound" value="Calculate Compound Interest">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $principal = $_POST["principal"];
    $rate = $_POST["rate"];
    $time = $_POST["time"];

    if (isset($_POST["simple"])) {
        // Simple Interest = (P * R * T) / 100
        $si = ($principal * $rate * $time) / 100;
        echo "<h3>Simple Interest: " . number_format($si, 2) . "</h3>";
    } elseif (isset($_POST["compound"])) {
        // Compound Interest = P * (1 + R/100)^T - P
        $amount = $principal * pow((1 + $rate / 100), $time);
        $ci = $amount - $principal;
        echo "<h3>Compound Interest: " . number_format($ci, 2) . "</h3>";
    }
}
?>

</body>
</html>
