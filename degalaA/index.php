<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hola</title>
</head>
<body>
    <a href="index.php">home</a>
    <a href="addnew.php">addnew</a>
    <table border="1">
        <tr>
            <th>last name</th>
            <th>first name</th>
            <th>middle name</th>
            <th>age</th>
            <th>gender</th>
            <th>bdate</th>
            <th>home address</th>
            <th>civil status</th>
            <th colspan="2">Action</th>
        </tr>
        <tr>
            <?php
            $conn = new mysqli("localhost", "root", "", "degaladb");

            if ($conn->connect_error){
                die("Connection failed");
            }

            $result = $conn->query("SELECT * FROM students");

                while ($row = $result->Fetch_assoc()){
                    $lname = $row["lname"];
                    $fname = $row["fname"];
                    $mname = $row["mname"];
                    $age = $row["age"];
                    $gender = $row["gender"];
                    $bdate = $row["bdate"];
                    $address = $row["homeaddress"];
                    $status = $row["cs_id"];
                    if($status == 1){
                        $cstatus = "Single";
                    }
                    if($status == 2){
                        $cstatus = "Married";
                    }
                    if($status == 3){
                        $cstatus = "Widowed";
                    }
                    if($status == 4){
                        $cstatus = "Divorced";
                    }
                    echo "<tr><td>$lname</td><td>$fname</td><td>$mname</td><td>$age</td><td>$gender</td><td>$bdate</td><td>$address</td><td>$cstatus</td><td><a href='edit.php?id=".$row['id']."'>Edit</a></td><td><a href='delete.php?id=".$row['id']."'>Delete</a></td></tr>";
            }
            
            ?>
    </tr>
    </table>
</body>
</html>