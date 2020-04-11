<!DOCTYPE html>
<html lang="en">

  <head>


        <?php 
        include("connect.php");
        include ('add_comment.php');
            $game_id = mysqli_real_escape_string($dbcon,$_GET["game_id"]);

            //get game details
            $query = "SELECT * from game where id=".$game_id;
            $game = mysqli_query($dbcon, $query);
            $game = mysqli_fetch_array($game, MYSQLI_ASSOC);

            //get the comments for the game
            $query2 = "SELECT * from comments where game_id=".$game_id;
            $comments = mysqli_query($dbcon, $query2);

            //get number of comments
            $query3 = "SELECT COUNT(id) from comments where game_id=".$game_id;
            $query3 = mysqli_query($dbcon, $query3);
            $query3 = mysqli_fetch_array($query3, MYSQLI_NUM);    

            $is_rated = false;
            if($query3[0]>0){
                $is_rated = true;
                 //get average rating
                 $score = 0;
                foreach($comments as $comment){
                     $score += $comment["rating"];
                 }

                 $score = $score/$query3[0];
            }
           
        ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Erin Yabut">

    <title>GameDB</title>

      <!-- Bootstrap core CSS -->
      <link href="sources/css/bootstrap.min.css" rel="stylesheet">

    <!-- Style CSS -->
      <link href="sources/css/style.css" rel="stylesheet">    

    <!-- Style CSS -->
    <link href="sources/css/style-gamepage.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
      <div class="container">
        <a class="navbar-brand" href="/GameIMDB">GameDB</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" <a href="/GameIMDB/index.html">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  <div class="container">
    <div class="row game-info">
      <div class="col-md-3">
        <img src="<?php echo $game["image"]; ?>"class="col-md-12    ">
      </div>
      <div class="col-md-9">
        <h1><?php echo $game["title"]; ?></h1>
        <p>First released:<b> <?php echo $game["initial_release"] ?></b></p>
        <p>Designer: <b><?php echo $game["designer"] ?></b></p>
        <p>Engine: <b><?php echo $game["engine"] ?></b></p>
        <p>Developer: <b><?php echo $game["developer"] ?></b></p>

        <h3> Overall Rating: 
        <?php if($is_rated)
            { 
            echo sprintf("%.2f", $score);
            }
         else {
             echo "Not yet rated";} ?>
        </h3>
      </div>
      
    </div>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
        <form method="POST" action="add_comment.php">

        <input type="hidden" name="game_id" value=<?php echo $game_id;?>>
            <div class="form-group">
                <label for="commentTitle">Title</label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="commentBody">Comment</label>
                <textarea rows="4" cols="50" class="form-control" name="body">
                </textarea> 
            </div>
          <div class="form-group">
              <label for="rating"> Rating </label>
                <select class="form-control" name="rating">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select> 
         </div>
            <button type="submit" class="btn btn-primary" name="post">Submit</button>
            </form>
        </div>
        </div>


    <?php 
      

        foreach($comments as $comment){
    ?>
        <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-7"><?php echo $comment["title"]; ?></h1>
            <p class="lead"><?php echo $comment["content"] ?></p>
            <p class="lead">Overall Score: <?php echo $comment["rating"] ?> </p>
        </div>
        </div>
    <?php
        }
    ?>
    
  </div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
