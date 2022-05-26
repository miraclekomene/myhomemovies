<?php
require_once ('conf/info.php');
$title = "Top Rated Tv Show";
require_once ('header.php');
?>

<!-- top rated tv series -->
<a href="tv-series.php"class="mx-3"><i class="fa fa-arrow-left fa-3x text-dark"></i></a>
<h3 class="text-center"> ~ Top Rated Tv Show ~ </h3>
<hr>

<div class="container">
    <div class="row">
        
        <?php
        require_once('api/api_tv.php');
            foreach($tv_top->results as $tt){
                echo '<a href="tvshow.php?id=' .$tt->id. '"class="col-11 col-md-5 pt-2 col-lg-2 m-3" style="text-decoration: none;"><div class="card h-100" style=" box-shadow: 0px 5px 30px 5px black"><img src="'.$imgurl_2.''. $tt->poster_path .'"style="width: 100%;">
                <h4 style="text-align: center; color: black;">' . $tt->original_name ."</h4>
                <h6 style='text-align: center; color: black;'><em> Rate: " . $tt->vote_average . " | vote : " . $tt->vote_count ."</em><h6>
                <h5 style='text-align: center; color: black;'>First Air Date :".date('d F Y', strtotime($tt->first_air_date))."</br >
                Popularity : ".round($tt->popularity)."</h5></div></a>";
                
            }

        $total = $tv_top->total_pages;
            
        ?>
            
        <ul class="pagination mx-3" >

            <li class="col-2 text-center bg-success mx-1 p-2"><a href="?&toppage=1" style="text-decoration: none; font-size: 20px; color: white;">First</a></li>

            <li class="<?php if($toppage <= 1){ echo 'disabled'; } ?> col-2 text-center bg-success mx-1 p-2">
                <a href="<?php if($toppage <=  1){ echo '#'; } else { echo "?&toppage=".($toppage - 1); } ?>" style="text-decoration: none; font-size: 20px; color: white;">Prev</a>
            </li>

            <li class="<?php if($toppage >= $total){ echo 'disabled'; } ?> col-2 text-center bg-success mx-1 p-2" style="text-decoration: none;">
                <a href="<?php if($toppage >= $total){ echo '#'; } else { echo "?&toppage=".($toppage + 1); } ?>" style="text-decoration: none; font-size: 20px; color: white;">Next</a>
            </li>

            <li class="col-2 text-center bg-success mx-1 p-2"><a href="?&toppage=<?php echo $total; ?>" style="text-decoration: none; font-size: 20px; color: white;">Last</a></li>

        </ul>

    </div>
</div>

</body>
</html>