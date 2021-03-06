<?php
require_once ('conf/info.php');
$title = "Welcome To";
require_once ('header.php');
?>

<h1 class="text-center"> ~ Top Rated Movies ~ </h1>
<hr>
<div class="container">
    <div class="row">
        <?php 
            $page=1; 

            if (isset($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                $page = $page;
            }

    
            require_once ('api/api_toprated.php');
            
            foreach($toprated->results as $p){
                
                echo '<a href="movie.php?id=' .$p->id. '"class="col-11 col-md-5 pt-2 col-lg-2 m-3" style="text-decoration: none;"><div class="card h-100" style=" box-shadow: 0px 5px 15px 5px black"><img src="http://image.tmdb.org/t/p/w500'. $p->poster_path .'"style="width: 100%;">
                <h5 class="text-dark" style="text-align: center; font-family: "Maven Pro", sans-serif;">' . $p->original_title ."(" . substr($p->release_date, 0, 4) . ")</h5>
                <h6 class='text-dark' style='text-align: center; font-family: 'Maven Pro', sans-serif;'><em> Rate:" . $p->vote_average . " | vote : " . $p->vote_count ."</em><h6></div></a>";
            }
            



            $total_pages = $toprated->total_pages;
            
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