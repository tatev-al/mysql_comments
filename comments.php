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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <link rel="shortcut icon" href="#">
  <script type="text/javascript">
    $(document).ready(function(){
        function load_data(query)
        {
            var xhr = $.ajax({
                url:"search.php",
                method:"POST",
                dataType: "json",
                data:{query:query},
                beforeSend:function() {
                    if(xhr != null) {
                        xhr.abort();
                    }
                },
                success:function(response)
                {
                    $('#result').empty();
                    
                    if (response.error) 
                    {
                        $('#result').append(response.message);
                    }
                    else
                    {
                        var result = "<div class=\"card-columns\">";
                        $.each(response["data"], function(key, value) {
                            
                            result += "<div class=\"card p-3\">" + 
                            "<blockquote class=\"blockquote mb-0 card-body\">" +
                            "<p>" + value.comment + "</p>" +
                            "<footer class=\"blockquote-footer\">" +
                            "<small class=\"text-muted\">" + value.name +
                            "<cite title=\"created at\"> " + value.created_at +
                            "</cite>" + "</small>" + "</footer>" +
                            '<a href=\"edit.php?id=' + value.id + '"' + " class=\"stretched-link\">Edit</a>" +
                            "</blockquote>"+ "</div>";
                        });
                        result += "</div>";
                            $('#result').append(result);
                    } 
                    
                },
                error:function()
                {
                    $('#result').empty();
                    $('#result').append('No result');
                    return;
                }
            });
        }
        $('#search').keyup(function()
        {
            var search = $(this).val();
            if(search.length > 2)
            {
                load_data(search);
            }
            else
            {
                $('#result').empty();
                $('#result').append('Type more than 2 characters');
            }
        });
    });
</script>  
</head>
<body>
    <div class="card-columns">
        <input type="text" class="form-control" id="search" placeholder="Search">
    </div>
    <div id="result">
    <div class="card-columns">
    <?php 

        while(($record = mysqli_fetch_assoc($result)))
        {?>
                <div class="card p-3">
                    <blockquote class="blockquote mb-0 card-body">
                        <p><?= $record['comment'] ?></p>
                        <footer class="blockquote-footer">
                            <small class="text-muted">
                                <?= $record['name'] ?> <cite title="created at"><?= $record['created_at'] ?></cite>
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
            <?php
        }
    ?>
    </div>
    </div>
         
</body>
</html>

<?php mysqli_close($connection); ?>