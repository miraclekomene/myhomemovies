<?php
require_once ('conf/info.php');
$title = "welcome to";
require_once ('header.php');
?>

<h1 class="text-center"> ~ Top Rated Movies ~ </h1>
<hr>
<ul style="display: flex; flex-wrap: wrap;">
    <?php 
        $page=1; 

        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = $page;
        }


		require_once ('api/api_toprated.php');
        
        foreach($toprated->results as $p){
            
            echo '<li class="card col-md-5 col-lg-2 m-3" style=" box-shadow: 0px 5px 30px 5px"><a href="movie.php?id=' .$p->id. '" style="text-decoration: none;"><img src="http://image.tmdb.org/t/p/w500'. $p->poster_path .'"style="width: 100%;">
            <h5 class="text-dark" style="text-align: center; font-family: "Maven Pro", sans-serif;">' . $p->original_title ."(" . substr($p->release_date, 0, 4) . ")</h5>
            <h6 class='text-dark' style='text-align: center; font-family: 'Maven Pro', sans-serif;'><em> Rate:" . $p->vote_average . " | vote : " . $p->vote_count ."</em><h6></a></li>";
        }
        



        $total_pages = $toprated->total_pages;
           
    ?>
    
    <ul class="pagination" >

        <li class="w-25 bg-success mx-1 p-2"><a href="?&page=1" style="text-decoration: none; font-size: 20px; color: white;">First</a></li>

        <li class="<?php if($page <= 1){ echo 'disabled'; } ?> w-25 bg-success mx-1 p-2">
            <a href="<?php if($page <=  1){ echo '#'; } else { echo "?&page=".($page - 1); } ?>" style="text-decoration: none; font-size: 20px; color: white;">Prev</a>
        </li>

        <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?> w-25 bg-success mx-1 p-2" style="text-decoration: none;">
            <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?&page=".($page + 1); } ?>" style="text-decoration: none; font-size: 20px; color: white;">Next</a>
        </li>

        <li class="w-25 bg-success mx-1 p-2"><a href="?&page=<?php echo $total_pages; ?>" style="text-decoration: none; font-size: 20px; color: white;">Last</a></li>

    </ul>

</ul>

</div>
</body>
</html>