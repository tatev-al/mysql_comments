<?php
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
        session_start();
        if(isset($_SESSION["email"]))
        {
            header('Location: index.php');
        }
        if($connection == false)
        {
            echo 'Connection failed.<br>';
            echo mysqli_connect_error();
            exit();
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

        $name = mysqli_real_escape_string($connection, test_input($_POST['name']));
        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        
        $pass = $_POST['pass'];
        $pass = md5($pass);

        $sql = "SELECT id FROM users WHERE email = '$email'";
        $result = mysqli_query($connection, $sql);
        if(mysqli_num_rows($result) > 0)
        {
            echo 'Such user already exists.<br>';
            ?>
            <a href="login.php">Login page</a>
            <a href="reg.php">Registration page</a>
            <?php
        }
        else
        {
            $sql = "INSERT INTO `users` (`name`, `email`, `pass`) VALUES ('$name', '$email', '$pass')";

            if (!(mysqli_query($connection, $sql))) 
            {
                echo "Error: " . $sql . "<br>" . mysqli_error($connection);
                exit();   
            } 
            
            $_SESSION['email'] = $_POST['email'];
            mysqli_close($connection); 
            header('Location: index.php');
        }
        
    }
?>