
<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gocheeta";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, firstname, lastname, nic, driver_license, mobile_number, username, avatar, vehical_category_id, vehical_detail_id, branch_id, status FROM driver";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>firstname</th><th>lastname</th><th>nic</th><th>driver_license</th><th>mobile_number</th><th>username</th><th>avatar
    </th><th>vehical_category_id</th><th>vehical_detail_id</th><th>branch_id</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. "</td><td> " . $row["lastname"]. "</td><td> " . $row["nic"]. " </td><td>" . $row["driver_license"]
        . "</td><td> " . $row["mobile_number"]. " </td><td>" . $row["username"]. " </td><td>" . $row["avatar"]. "</td><td> " . $row["vehical_category_id"].
        "</td><td> " . $row["vehical_detail_id"]. "</td><td> " . $row["branch_id"]. "</td><td> " . $row["status"]. "</td></tr>";}
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>


