<?php
require_once ('conf/info.php');

$id_tv = $_GET['id'];
// include_once "api/api_movie_similar.php";
include_once "api/api_tv_id.php";
include_once "api/api_tv.php";
$title = "Detail Tv Series(".$tv_id->name.")";
require_once ('header.php');

?>

<?php
if(isset($_GET['id'])){
    $id_tv = $_GET['id'];
}
?>
<div class="container">

<h1><?php echo $tv_id->name ?></h1>
<?php 
    echo "<h5>  ".$tv_id->tagline."  </h5>";
?>
<div class="card bg-dark text-white" style="border-radius: 40px;">
    <div class="p-3 mb-2" style="background-image:url(<?php echo $imgurl_2 ?><?php echo $tv_id->backdrop_path ?>); border-radius: 40px; width:100%;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;">
    <div style="background-color: rgba(0, 0, 0, 0.5); border-radius: 40px;">

    <img src="<?php echo $imgurl_2 ?><?php echo $tv_id->poster_path ?>" alt="This Tv Series Does Not have An Image" style="border-radius: 40px; border: 1px solid grey;">
    </div>
    </div>

    <div class="px-4 pt-4">
    <u><h2 class="text-center"><?php echo $tv_id->name ?></h2></u>
    <p><i class="bx bx-purchase-tag fa-2x"></i> <?php echo $tv_id->tagline ?></p>
    <p><strong>Genre : </strong> 
        <?php 
        foreach($tv_id->genres as $g){
            echo '<span>'.$g->name.'</span>';
        }
        ?>
    </p>

    <p><strong>Overview : </strong> <?php echo $tv_id->overview ?></p>

    <p><strong>Air Date : </strong> 
        <?php
        foreach($tv_id->seasons as $sea){
            $rel = date('d F Y', strtotime($sea->air_date));
            echo $rel.", ";
        }
        ?>
    </p>

    <p><strong>Production company :</strong>  
        <?php 
        foreach($tv_id->production_companies as $pc){
            echo $pc->name." ";
        }
        ?>
    </p>

    <p><strong>Status : </strong> <?php echo $tv_id->status ?></p>
    <p><strong>Type : </strong> <?php echo $tv_id->type ?></p>
    <p><strong>vote_average : </strong> <?php echo $tv_id->vote_average ?></p>

    <p><i class="fa-solid fa-flag fa-2x"></i>  
        <?php 
        foreach($tv_id->production_countries as $pco){
            echo $pco->name." ;&nbsp;&nbsp;";
        }
        ?>
    </p>

    <p><i class="fa-solid fa-language fa-2x"></i> 
        <?php 
        foreach($tv_id->spoken_languages as $sp){
            echo $sp->name." ;&nbsp;&nbsp;";
        }
        ?>
    </p>

    <p><i class="fa-solid fa-thumbs-up fa-2x"></i> <?php echo $tv_id->vote_count ?></p>

    </div>
    </div>
    <hr>

<!-- <h3>Similar Shows</h3> -->
<ul>
    <?php
    // $count= 4;
    // $output="";

    //     foreach($similar_id->results as $sim){
    //         $output .='<li><a href="movie.php?id='.$sim->id.'"><img src="http://image.tmdb.org/t/p/w300'.$sim->backdrop_path.'"></a></li>';
    //         echo $pco->name."&nbsp;&nbsp;";
    //     }
        
    ?>
</ul>

<?php
    // foreach($movie_video_id->results as $video){
    //     echo '<iframe width="560" height="315" class="m-1" src="'."https://www.youtube.com/embed/".$video->key.'"frameborder="0"
    //         allowfullscreen></iframe>';
    // }

?>
</div>

</body>
</html>