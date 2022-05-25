<?php
require_once ('conf/info.php');
$title = "Now Playing Movies";
require_once ('header.php');
?>

<h1 class="text-center"> ~ Now Playing Movies ~ </h1>

    <div class="text-center">
    <?php 
    $page = 1;

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = $page;
    }
        require_once ('api/api_now.php');
        $min = date('d F Y', strtotime($nowplaying->dates->minimum));
        $max = date('d F Y', strtotime($nowplaying->dates->maximum));
        echo "<h5><sub>From </sub><span>".$min."</span>,<sub> until </sub><span>".$max."</span></h5>";
    ?>
    </div>

<hr>
<ul style="display: flex; flex-wrap: wrap;">
        
    <?php
        foreach($nowplaying->results as $p){
            $backdrop = $p->poster_path;
            if(empty($backdrop) && is_null($backdrop)){
                $backdrop ='image/no_image2.jpg';
            }else{
                $backdrop = 'http://image.tmdb.org/t/p/w300'.$backdrop;
            }
            echo '<li class="card col-md-5 col-lg-2 m-3" style=" box-shadow: 0px 5px 30px 5px"><a href="movie.php?id=' .$p->id. '" style="text-decoration: none;"><img src="'.$backdrop.'"style="width: 100%;">
            <h5 style="text-align: center; color: black;">' . $p->original_title ."(" . substr($p->release_date, 0, 4) . ")</h5>
            <h6 style='text-align: center; color: black;'><em> Rate: " . $p->vote_average . " | vote : " . $p->vote_count ."  | Popularity : ".$p->popularity."</em><h6>
            </a></li>";

        }

        $total_pages = $nowplaying->total_pages;
    ?>

    <ul class="pagination">

        <li class="w-25 h-100 bg-success mx-1 p-2"><a href="?&page=1" style="text-decoration: none; font-size: 20px; color: white;">First</a></li>
        
        <li class="<?php if($page <= 1){ echo 'disabled'; } ?> w-25 bg-success mx-1 p-2">
            <a href="<?php if($page <=  1){ echo '#'; } else { echo "?&page=".($page - 1); } ?>" style="text-decoration: none; font-size: 20px; color: white;">Prev</a>
        </li>

        <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?> w-25 bg-success mx-1 p-2" style="text-decoration: none;">
            <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?&page=".($page + 1); } ?>" style="text-decoration: none; font-size: 20px; color: white;">Next</a>
        </li>

        <li class="w-25 bg-success mx-1 p-2"><a href="?&page=<?php echo $total_pages; ?>" style="text-decoration: none; font-size: 20px; color: white;">Last</a></li>

    </ul>

</ul>

</body>
</html>