<?php
require_once ('conf/info.php');
$title = "Tv Series";
require_once ('header.php');
?>

<?php

require_once('api/api_tv.php'); 

?>
<!-- on air series -->
<a href="toprated_tv_show.php">
<button style="float: right; border: none; outline: none; margin-right: 2rem; background-color: green;" class="py-2 rounded-pill text-white"><i class="bx bxs-star" style="color: #f79807"></i> Top Rated Tv <i class="bx bxs-star" style="color: #f79807"></i></button>
</a>
<h1 class="text-center"> ~ On Air Tv Show ~ </h3>
<hr>
<div class="container">
    <div class="row">
        <?php 

            foreach($tv_onair->results as $tp){
                $dd = date('d F Y', strtotime($tp->first_air_date));
                echo '<a href="tvshow.php?id=' .$tp->id. '"class="col-11 col-md-5 pt-2 col-lg-2 m-3" style="text-decoration: none;"><div class="card h-100" style=" box-shadow: 0px 5px 30px 5px black"><img src="'.$imgurl_1.''. $tp->poster_path .'"style="width: 100%;">
                <h5 style="text-align: center; color: black;">' .$tp->original_name."</h5>
                <h6 style='text-align: center; color: black;'>Popularity : ".round($tp->popularity)."</em><h6>
                <h6 style='text-align: center; color: black;'>First air date :".$dd."</h6></div></a>";

            }
            
            $total_pages = $tv_onair->total_pages;
        ?>

        <ul class="pagination mx-3">
            
            <li class="col-2 text-center bg-success mx-1 p-2"><a href="?&page=1" style="text-decoration: none; font-size: 20px; color: white;">First</a></li>

            <li class="<?php if($page <= 1){ echo 'disabled'; } ?> col-2 text-center bg-success mx-1 p-2">
                <a href="<?php if($page <=  1){ echo '#'; } else { echo "?&page=".($page - 1); } ?>" style="text-decoration: none; font-size: 20px; color: white;">Prev</a>
            </li>

            <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?> col-2 text-center bg-success mx-1 p-2" style="text-decoration: none;">
                <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?&page=".($page + 1); } ?>" style="text-decoration: none; font-size: 20px; color: white;">Next</a>
            </li>

            <li class="col-2 text-center bg-success mx-1 p-2"><a href="?&page=<?php echo $total_pages; ?>" style="text-decoration: none; font-size: 20px; color: white;">Last</a></li>

        </ul>  


    </div>

</div>

</body>
</html>