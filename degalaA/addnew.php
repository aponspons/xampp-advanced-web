<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hola</title>
</head>
<body>
    <hr>
    
            <?php
            $conn = new mysqli("localhost", "root", "", "degaladb");

            if ($conn->connect_error){
                die("Connection failed");
            }
            ?>
            <a href="index.php">home</a>
            <a href="addnew.php">addnew</a>
            <form action="addnew.php" method="post">
                <table>
                    <tr>
                        <td>Last Name:</td>
                        <td><input type="text" name="lname"/></td>
                    </tr>
                     <tr>
                        <td>First Name:</td>
                        <td><input type="text" name="fname"/></td>
                    </tr>
                     <tr>
                        <td>Middle Name:</td>
                        <td><input type="text" name="mname"/></td>
                    </tr>
                     <tr>
                        <td>Age:</td>
                        <td><input type="text" name="age"/></td>
                    </tr>
                     <tr>
                        <td>Gender:</td>
                        <td><select name="gender">
                            <option value="">Select</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select><br /></td>
                    </tr>
                     <tr>
                        <td>Birth Date</td>
                        <td><input type="date" name="bdate"/></td>
                    </tr>
                     <tr>
                        <td>Home Address:</td>
                        <td><input type="text" name="homeaddress"/></td>
                    </tr>
                     <tr>
                        <td>Civil Status:</td>
                        <td><select name="cs_id">
                            <option value="">Select</option>
                            <option value="1">Single</option>
                            <option value="2">Married</option>
                            <option value="3">Widowed</option>
                            <option value="4">Divorced</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td>
                        </td>
                        <td><input type="submit" value="save" name="submit"/></td>
                    </tr>
                </table>
            </form>
            <?php
            if (isset($_POST['submit'])){
                $lname = $_POST['lname'];
                $fname = $_POST['fname'];
                $mname = $_POST['mname'];
                $age = $_POST['age'];
                $gender = $_POST['gender'];
                $bdate = $_POST['bdate'];
                $homeaddress = $_POST['homeaddress'];
                $cs_id = $_POST['cs_id'];
                $insert_query="insert into students(lname,fname,mname,age,gender,bdate,homeaddress,cs_id)
                                values('$lname','$fname','$mname','$age','$gender','$bdate','$homeaddress','$cs_id')";
                                $result =mysqli_query($conn,$insert_query);
                                if($result){
                                    echo "lol nice";
                                } else{
                                    echo "you got a bug dumbass ". $insert_query. "<br>". mysqli_error($conn);
                                }
            }
            ?>

</body>
</html>