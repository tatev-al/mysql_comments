<?php
    if(isset($_POST["query"]))
    {
        require "db_config.php";
        session_start();
        $connection = mysqli_connect($servername, $username, $password, $db_name);
        $text = $_POST['query'];
        sleep(2);
        $sql = "SELECT comments.*, users.name FROM comments INNER JOIN users ON user_id = users.id AND comment LIKE '%$text%'";
        $result = mysqli_query($connection, $sql);
        $array = [];
        if(mysqli_num_rows($result) > 0)
        {
            while($record = mysqli_fetch_assoc($result))
            {
                $array[] = $record;
            }
            echo json_encode(['error' => false, 'data' => $array]);
        }
        else
        {
            echo json_encode(['error' => true, 'message' => 'No result']);
        }
    }