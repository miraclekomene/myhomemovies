<?php
$page = 1;
// if the the pagination buttons are pressed get the page number
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = $page;
}

$input = $_GET['search'];
$channel = $_GET['channel'];
$search = $input;
require_once ('conf/info.php');
$title = 'Result Search | '.$input;
require_once ('header.php');
require_once ('api/api_search.php');
?>

<h3 class="text-center">Result Search:<em><?php echo $input ?></em></h3>

<hr>

<ul style="display: flex; flex-wrap: wrap;">
        
    <?php
    if($channel =="movie"){
        foreach($search->results as $results){
            $title = $results->title;
            $id = $results->id;
            $release = $results->release_date;
            $popularity = $results->popularity;


            if(!empty($release) && !is_null($release)){
                $tempyear = explode("-", $release);
                $year = $tempyear[0];
                if(!is_null($year)){
                    $title = $title.' ('.$year.')';
                }
            }

            $backdrop = $results->backdrop_path;
            if(empty($backdrop) && is_null($backdrop)){
                $backdrop = dirname($_SERVER['PHP_SELF']).'/image/no_image2.jpg';
            }else{
                $backdrop = 'http://image.tmdb.org/t/p/w300'.$backdrop;
            }
            //echo <img src="'.$imgurl_1.''. $p->poster_path .'"style="width: 100%;">
            echo '<li class="card col-3 col-md-1 col-lg-2 m-3" style=" box-shadow: 0px 5px 20px 5px"><a href="movie.php?id=' .$id.'" style="text-decoration: none; color: black;"><img src="'.$backdrop.'"style="width: 100%;">
            <h5 style="text-align: center;">' . $title .'</h5>
            <h6 style="text-align: center;">Popularity :' . $popularity .'</h6></a></li>';
        }

    }elseif($channel =="tv"){

        foreach($search->results as $results){
            $title = $results->original_name;
            $id = $results->id;
            // $release = $results->first_air_date;

            // if(!empty($release) && !is_null($release)){
            //     $tempyear = explode("-", $release);
            //     $year = $tempyear[0];
            //     if(!is_null($year)){
            //         $title = $title.' ('.$year.')';
            //     }
            // }
            $backdrop = $results->backdrop_path;
            if(empty($backdrop) && is_null($backdrop)){
                $backdrop ='image/no_image2.jpg';
            }else{
                $backdrop = 'http://image.tmdb.org/t/p/w300'.$backdrop;
            }
            echo '<li class="card col-3 col-md-1 col-lg-2 m-3" style="box-shadow: 0px 5px 20px 5px"><a href="tvshow.php?id=' .$id. '" style="text-decoration: none;"><img src="'.$backdrop.'"style="width: 100%;">
            <h5 style="text-align: center;">' . $title .'</h5></a></li>';
        }
    }
    
    $total_pages = $search->total_pages;
           
    ?>
        
        <ul class="pagination" >
    
            <li class="w-25 bg-success mx-1 p-2"><a href="?channel=<?php echo $channel; ?>&search=<?php echo $input; ?>&page=1" style="text-decoration: none; font-size: 20px; color: white;">First</a></li>
    
            <li class="<?php if($page <= 1){ echo 'disabled'; } ?> w-25 bg-success mx-1 p-2">
                <a href="<?php if($page <=  1){ echo '#'; } else { echo "?channel=$channel&search=$input&page=".($page - 1); } ?>" style="text-decoration: none; font-size: 20px; color: white;">Prev</a>
            </li>
    
            <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?> w-25 bg-success mx-1 p-2" style="text-decoration: none;">
                <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?channel=$channel&search=$input&page=".($page + 1); } ?>" style="text-decoration: none; font-size: 20px; color: white;">Next</a>
            </li>
    
        <li class="w-25 bg-success mx-1 p-2"><a href="?channel=<?php echo $channel; ?>&search=<?php echo $input; ?>&page=<?php echo $total_pages; ?>" style="text-decoration: none; font-size: 20px; color: white;">Last</a></li>
    
    </ul>
</ul>

</body>
</html>