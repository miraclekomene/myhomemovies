<?php
require_once ('conf/info.php');
$title = "Top Rated Tv Show";
require_once ('header.php');
?>

<!-- top rated tv series -->
<h3 class="text-center"> ~ Top Rated Tv Show ~ </h3>
<hr>

<ul style="display: flex; flex-wrap: wrap;">
        
    <?php
    require_once('api/api_tv.php');
        foreach($tv_top->results as $tt){
            echo '<li class="card col-md-5 col-lg-2 m-3" style=" box-shadow: 0px 5px 30px 5px"><a href="tvshow.php?id=' .$tt->id. '" style="text-decoration: none;"><img src="'.$imgurl_2.''. $tt->poster_path .'"style="width: 100%;">
            <h4 style="text-align: center; color: black;">' . $tt->original_name ."</h4>
            <h6 style='text-align: center; color: black;'><em> Rate: " . $tt->vote_average . " | vote : " . $tt->vote_count ."</em><h6>
            <h5 style='text-align: center; color: black;'>First Air Date :".date('d F Y', strtotime($tt->first_air_date))."</br >
            Popularity : ".round($tt->popularity)."</h5></a></li>";
            

        }

     $total = $tv_top->total_pages;
           
    ?>
        
    <ul class="pagination" >

        <li class="w-25 bg-success mx-1 p-2"><a href="?&toppage=1" style="text-decoration: none; font-size: 20px; color: white;">First</a></li>

        <li class="<?php if($toppage <= 1){ echo 'disabled'; } ?> w-25 bg-success mx-1 p-2">
            <a href="<?php if($toppage <=  1){ echo '#'; } else { echo "?&toppage=".($toppage - 1); } ?>" style="text-decoration: none; font-size: 20px; color: white;">Prev</a>
        </li>

        <li class="<?php if($toppage >= $total){ echo 'disabled'; } ?> w-25 bg-success mx-1 p-2" style="text-decoration: none;">
            <a href="<?php if($toppage >= $total){ echo '#'; } else { echo "?&toppage=".($toppage + 1); } ?>" style="text-decoration: none; font-size: 20px; color: white;">Next</a>
        </li>

        <li class="w-25 bg-success mx-1 p-2"><a href="?&toppage=<?php echo $total; ?>" style="text-decoration: none; font-size: 20px; color: white;">Last</a></li>

    </ul>

</ul>