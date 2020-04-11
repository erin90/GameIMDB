<?php
    require ("connect.php");


    if(isset($_POST["post"])){
        $title = mysqli_real_escape_string($dbcon, $_POST["title"]);
        $content = mysqli_real_escape_string($dbcon,$_POST["body"]);
        $rating = mysqli_real_escape_string($dbcon,$_POST["rating"]);
        $game = mysqli_real_escape_string($dbcon,$_POST["game_id"]);

        $query ="INSERT INTO comments(game_id, title, content, rating)
        VALUES ('$game', '$title', '$content', '$rating') ";

        echo "<h1> $query </h1>";
        if( !mysqli_query($dbcon, $query)){
            echo("Error description: " . mysqli_error($dbcon));
        }
    
        else{
           header('Location: index.php');
        }
    }

?>
