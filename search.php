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

<div class="container">
    <div class="row">
            
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
                echo '<a href="movie.php?id=' .$id.'"class="col-11 col-md-5 pt-2 col-lg-2 m-3" style="text-decoration: none; color: black;"><div class="card h-100" style=" box-shadow: 0px 5px 20px 5px black"><img src="'.$backdrop.'"style="width: 100%;">
                <h5 style="text-align: center;">' . $title .'</h5>
                <h6 style="text-align: center;">Popularity :' . $popularity .'</h6></div></a>';
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
                echo '<a href="tvshow.php?id=' .$id. '"class="col-11 col-md-5 pt-2 col-lg-2 m-3" style="text-decoration: none;"><div class="card h-100" style="box-shadow: 0px 5px 20px 5px black"><img src="'.$backdrop.'"style="width: 100%;">
                <h5 style="text-align: center;">' . $title .'</h5></div></a>';
            }
        }
        
        $total_pages = $search->total_pages;
            
        ?>
            
            <ul class="pagination mx-3" >
        
                <li class="col-2 text-center bg-success mx-1 p-2"><a href="?channel=<?php echo $channel; ?>&search=<?php echo $input; ?>&page=1" style="text-decoration: none; font-size: 20px; color: white;">First</a></li>
        
                <li class="<?php if($page <= 1){ echo 'disabled'; } ?> col-2 text-center bg-success mx-1 p-2">
                    <a href="<?php if($page <=  1){ echo '#'; } else { echo "?channel=$channel&search=$input&page=".($page - 1); } ?>" style="text-decoration: none; font-size: 20px; color: white;">Prev</a>
                </li>
        
                <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?> col-2 text-center bg-success mx-1 p-2" style="text-decoration: none;">
                    <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?channel=$channel&search=$input&page=".($page + 1); } ?>" style="text-decoration: none; font-size: 20px; color: white;">Next</a>
                </li>
        
            <li class="col-2 text-center bg-success mx-1 p-2"><a href="?channel=<?php echo $channel; ?>&search=<?php echo $input; ?>&page=<?php echo $total_pages; ?>" style="text-decoration: none; font-size: 20px; color: white;">Last</a></li>
        
        </ul>
    </div>
</div>

</body>
</html>