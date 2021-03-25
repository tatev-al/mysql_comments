<?php
include "weather.php";
get_weather();
require "db_config.php";

$connection = mysqli_connect($servername, $username, $password, $db_name);
session_start();
if($connection == false)
{
    die("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($connection, "SELECT users.name,comments.comment,comments.created_at ,comments.user_id,comments.id FROM users 
                                        INNER JOIN comments ON users.id = comments.user_id ORDER BY created_at");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Comments</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="card-columns">
        <input type="text" class="form-control" id="search" placeholder="Search">
    </div>
    <div id="result"></div>
    <?php 
    if(isset($_SESSION['id']))
    {
        $session_id = $_SESSION['id'];
        if(mysqli_query($connection, "SELECT `name` FROM users WHERE users.id = $session_id"))
        {
            while(($record = mysqli_fetch_assoc($result)))
            {?>
                <div class="card-columns">
                    <div class="card p-3">
                        <blockquote class="blockquote mb-0 card-body">
                            <p><?= $record['comment'] ?></p>
                            <footer class="blockquote-footer">
                                <small class="text-muted">
                                    <?= $record['name'] ?> <cite title="created aty"><?= $record['created_at'] ?></cite>
                                </small>
                            </footer>
                            <?php 
                            if(isset($_SESSION['id']) && $record['user_id'] == $_SESSION['id'])
                            {?>
                                <small>
                                    <a href="edit.php?id= <?= $record['id'] ?>" class="stretched-link">Edit</a>
                                </small>
                            <?php
                            }
                            ?>
                        </blockquote>
                    </div>
                </div>
                <?php
            }
        }
    }
    else
    {
        while(($record = mysqli_fetch_assoc($result)))
        {?>
            <div class="card-columns">
                <div class="card p-3">
                    <blockquote class="blockquote mb-0 card-body">
                        <p><?= $record['comment'] ?></p>
                        <footer class="blockquote-footer">
                            <small class="text-muted">
                                <?= $record['name'] ?> <cite title="created at"><?= $record['created_at'] ?></cite>
                            </small>
                        </footer>
                    </blockquote>
                </div>
            </div>
            <?php
        }
    }
    ?> 
    <script type="text/javascript">
    $(document).ready(function(){
            load_data();
            function load_data(query)
            {
                $.ajax({
                    url:"search.php",
                    method:"POST",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
            }
            $('#search').keyup(function()
            {
                var search = $(this).val();
                if(search != '')
                {
                    load_data(search);
                }
                else
                {
                    load_data();
                }
            });
        });
    </script>           
</body>
</html>

<?php mysqli_close($connection); ?>