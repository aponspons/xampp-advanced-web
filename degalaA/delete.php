<?php
$conn = new mysqli("localhost", "root", "", "degaladb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_query = "DELETE FROM students WHERE id = '$id'";
    $result = mysqli_query($conn, $delete_query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "No ID provided!";
}
?>