<?php
require_once ('conf/info.php');

$id_movie = $_GET['id'];
include_once "api/api_movie_id.php";
include_once "api/api_movie_video_id.php";
include_once "api/api_movie_similar.php";
$title = "Detail Movie(".$movie_id->original_title.")";
require_once ('header.php');

?>

<?php
if(isset($_GET['id'])){
    $id_movie = $_GET['id'];
}
?>
<div class="container">
<h1><?php echo $movie_id->original_title ?></h1>
<?php 
    echo "<h5>  ".$movie_id->tagline."  </h5>";
?>
<div class="card bg-dark text-white" style="border-radius: 40px;">
    <div class="p-3 mb-2" style="background-image:url(<?php echo $imgurl_2 ?><?php echo $movie_id->backdrop_path ?>); border-radius: 40px; width:100%;
        background-size: cover; background-position: center; background-repeat: no-repeat;">

        <div style="background-color: rgba(0, 0, 0, 0.5); border-radius: 40px;">

            <img src="<?php echo $imgurl_2 ?><?php echo $movie_id->poster_path ?>" class="col-6 col-md-3" alt="This Movie Does Not have An Image" style="border-radius: 40px; border: 1px solid grey;">
        </div>
    </div>

    <div class="px-4 pt-4">
    <u><h2 class="text-center"><?php echo $movie_id->original_title ?></h2></u>
    <p><i class="bx bx-purchase-tag fa-2x"></i>  <?php echo $movie_id->tagline ?></p>
    <p><strong>Genre : </strong>
        <?php 
        foreach($movie_id->genres as $g){
            echo '<span>'.$g->name.'</span>';
        }
        ?>
    </p>
    <p><strong>Overview : </strong><?php echo $movie_id->overview ?></p>
    <p><strong>Production company : </strong>
        <?php 
        foreach($movie_id->production_companies as $pc){
            echo $pc->name." ";
        }
        ?>
    </p>

    <p><i class="fa-solid fa-calendar-days fa-2x"> </i> <?php $rel = date('d F Y', strtotime($movie_id->release_date));
    echo $rel ?></p>
    
    <p><i class="fa-solid fa-flag fa-2x"></i> 
        <?php 
        foreach($movie_id->production_countries as $pco){
            echo $pco->name." ;&nbsp;&nbsp;";
        }
        ?>
    </p>
    <p><i class="fa-solid fa-language fa-2x"></i> 
        <?php 
        foreach($movie_id->spoken_languages as $pco){
            echo $pco->name."&nbsp;&nbsp;";
        }
        ?>
    </p>
    <p><strong><i class="fa-solid fa-sack-dollar fa-2x"></i></strong> $<?php echo $movie_id->budget ?></p>
    <p><strong><i class="fa-solid fa-thumbs-up fa-2x"></i> </strong><?php echo $movie_id->vote_count ?></p>
    <p><strong>vote average : </strong><?php echo $movie_id->vote_average ?></p>
    </div>
    </div>
    <hr>

<!-- <h3>Trailer</h3> -->
<ul>
    <?php
    // $count= 4;
    // $output="";
    
    //     foreach($similar_id->results as $sim){
    //         $output .='<li><a href="movie.php?id='.$sim->id.'"><img src="http://image.tmdb.org/t/p/w300'.$sim->backdrop_path.'"></a></li>';
    //         echo $sim->name."&nbsp;&nbsp;";
    //     }
        
    ?>
</ul>


</div>
<div class="offset-lg-2 offset-md-2 offset-1">
<?php
    foreach($movie_video_id->results as $video){
        echo '<iframe height="285" class="m-1 col-11 col-md-4 col-lg-3" src="'."https://www.youtube.com/embed/".$video->key.'"frameborder="0"
            allowfullscreen></iframe>';
    }

?>
</div>

</body>
</html>