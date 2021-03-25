<?php
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {       
        session_start();
        if(isset($_SESSION["id"]))
        {
            header('Location: index.php');
        }
        require "db_config.php";
        function test_input($data) 
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $connection = mysqli_connect($servername, $username, $password, $db_name);
        if($connection == false)
        {
            die("Connection failed: " . mysqli_connect_error());
        }
        if(empty($_POST['email']))
        {
            exit('Email is required.');
        }
        else if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false)
        {
            exit('Wrong email address.');
        }        
        if(empty($_POST['pass']))
        {
            exit('Password is required.');
        }

        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

        $pass = $_POST['pass'];
        $pass = md5($pass);

        $sql = "SELECT id FROM users WHERE email = '$email' and pass = '$pass'";
        $result = mysqli_query($connection, $sql);
        if(mysqli_num_rows($result) == 0)
        {
            echo 'There is no such user.<br>';
            ?>
            <a href="reg.php">Registration page</a> 
            <?php
        }
        else
        {
            $record = mysqli_fetch_assoc($result);
            $_SESSION['id'] = $record['id'];
            mysqli_close($connection); 
            header('Location: index.php');
        }
    }

?>