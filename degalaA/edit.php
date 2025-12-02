<?php
$conn = new mysqli("localhost", "root", "", "degaladb");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id          = $_POST['id'];
    $lname       = $_POST['lname'];
    $fname       = $_POST['fname'];
    $mname       = $_POST['mname'];
    $age         = $_POST['age'];
    $gender      = $_POST['gender'];
    $bdate       = $_POST['bdate'];
    $homeaddress = $_POST['homeaddress'];
    $cs_id       = $_POST['cs_id'];


    $update_query = "UPDATE students SET
        lname = '$lname',
        fname = '$fname',
        mname = '$mname',
        age = '$age',
        gender = '$gender',
        bdate = '$bdate',
        homeaddress = '$homeaddress',
        cs_id = '$cs_id'
        WHERE id = '$id'";

    $result = mysqli_query($conn, $update_query);

    if ($result) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM students WHERE id='$id'");
    $row = $result->fetch_assoc();

    $lname   = $row['lname'];
    $fname   = $row['fname'];
    $mname   = $row['mname'];
    $age     = $row['age'];
    $gender  = $row['gender'];
    $bdate   = $row['bdate'];
    $address = $row['homeaddress'];
    $status  = $row['cs_id'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Student</title>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <table>
            <tr><td>Last Name:</td><td><input type="text" name="lname" value="<?php echo $lname; ?>"></td></tr>
            <tr><td>First Name:</td><td><input type="text" name="fname" value="<?php echo $fname; ?>"></td></tr>
            <tr><td>Middle Name:</td><td><input type="text" name="mname" value="<?php echo $mname; ?>"></td></tr>
            <tr><td>Age:</td><td><input type="text" name="age" value="<?php echo $age; ?>"></td></tr>
            <tr>
                <td>Gender:</td>
                <td>
                    <select name="gender">
                        <option value="">Select</option>
                        <option value="M" <?php echo ($gender=="M"?"selected":""); ?>>Male</option>
                        <option value="F" <?php echo ($gender=="F"?"selected":""); ?>>Female</option>
                    </select>
                </td>
            </tr>
            <tr><td>Birth Date:</td><td><input type="date" name="bdate" value="<?php echo $bdate; ?>"></td></tr>
            <tr><td>Home Address:</td><td><input type="text" name="homeaddress" value="<?php echo $address; ?>"></td></tr>
            <tr>
                <td>Civil Status:</td>
                <td>
                    <select name="cs_id">
                        <option value="">Select</option>
                        <option value="1" <?php echo ($status==1?"selected":""); ?>>Single</option>
                        <option value="2" <?php echo ($status==2?"selected":""); ?>>Married</option>
                        <option value="3" <?php echo ($status==3?"selected":""); ?>>Widowed</option>
                        <option value="4" <?php echo ($status==4?"selected":""); ?>>Divorced</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Update">
                    <a href="index.php">Cancel</a>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
