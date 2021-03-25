<?php
    if(isset($_POST["query"]))
    {
        require "db_config.php";
        $connection = mysqli_connect($servername, $username, $password, $db_name);
        $text = $_POST['query'];
        $sql = "SELECT comments.*, users.name FROM comments, users WHERE user_id = users.id AND comment LIKE '%$text%'";
        $result = mysqli_query($connection, $sql);
        //var_dump(mysqli_fetch_assoc($result));exit();
        echo '<div class="table-responsive">
        <table class="table table bordered">
         <tr>
          <th>Comment</th>
          <th>Name</th>
          <th>Created at</th>
         </tr>';
        if(mysqli_num_rows($result) > 0 && strlen($text) > 2)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                echo "	<tr>
                            <td>".$row['comment']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['created_at']."</td>
                        </tr>";
            }
        }
        else
        {
            echo "<tr><td>0 result's found</td></tr>";
        }
    }