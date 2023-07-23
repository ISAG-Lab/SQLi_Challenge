<?php

$host = '';
$dbUsername = '';
$dbPassword = '';
$dbName = '';

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
$output = "PLEASE ENTER USERNAME AND PASSWORD .";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle the sign-in form submission
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT password FROM user WHERE username = '$username' AND password = '$password'";
    try {
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $output = "SIGN IN SUCCESS ! => ";
            if ($username == "admin") {
                $output =  $output."HI, ADMIN .";
            } else {
                $output = $output."ISAG{Ba5ic_5ql_inJ3c7i0n!!!}";
            }
            
        } else {
            $output = "INCORRECT USERNAME OR PASSWORD !";
        }
    } catch (Exception $e) {
        $output = $e;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
    <title>S0M3TH1NG CHALLENGE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #181818;

        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffffff;
        }

        form {
            max-width: 300px;
            margin: 0 auto;
            color: #ffffff;
            
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-size: 12px;

        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
            margin-top: 20px;
            color: #ffffff;
            font-size: 12px;
        }
        /* Hint : SQLI Bypass Login */
    </style>
</head>

<body>
    <h2>S0M3TH1NG</h2>
    <p><?php echo "<script>alert('" . $output . "');</script>"; ?></p>
    <form method="POST" action="">
        <label for="username">USERNAME</label>
        <input type="text" name="username" required>
        <label for="password">PASSWORD</label>
        <input type="password" name="password" required>
        
        <input type="submit" name="submit" value="SIGN IN">
    </form>

    <p>NOTE : SIGN IN FOR GET SOMETHING .</p>
    
</body>

</html>
