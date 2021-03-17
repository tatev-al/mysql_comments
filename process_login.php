<?php
//form: email and password
//submit redirect to 'process_login.php'
//process_login.php select from base user with that email and password
//if we have such a user then redirect to 'index.php' else print error
    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        function test_input($data) 
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $connection = mysqli_connect('127.0.0.1','root','','intern');

        if($connection == false)
        {
            echo 'Connection failed.<br>';
            echo mysqli_connect_error();
            exit();
        }

        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        
        if(empty($_POST['email']))
        {
            exit('Email is required.');
        }
        else if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false)
        {
            exit('Wrong email address.');
        }
        else
        {
            $email = test_input($_POST['email']);
        }

        $pass = mysqli_real_escape_string($connection, $_POST['pass']);
        if(empty($_POST['pass']))
        {
            exit('Password is required.');
        }
        $pass = md5($pass);

        $sql = "SELECT * FROM users WHERE email = '$email' and pass = '$pass'";
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
            mysqli_close($connection); 
            header('Location: index.php');
        }
    }

?>