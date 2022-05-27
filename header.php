<!DOCTYPE html>
<html lang="en" style="width: 100; overflow-x: hidden;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- bootstrap 5.0.2 -->
    <link rel="stylesheet" href="inc/bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="inc/fontawesome-free-6.1.1-web/css/all.min.css">
    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro&display=swap" rel="stylesheet">
    <!-- boxicon -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">

    <title>
        <?php echo $title ?>
        <?php echo $sitename ?>
        <?php echo $tagline ?>
    </title>
</head>
<body style="overflow-x: hidden; margin: 0px; width:100%;">
    <div style="padding: 10px 10px 10px 30px; border-bottom-left-radius: 80px; border-bottom-right-radius:80px; height: 12rem; width:100%;" class="bg-dark mb-5 text-white">
        <div style="display: flex; flex: flex-wrap;">
            <a href="index.php"><img src="image/logo2.png" style="width: 70px; height: 50px;"></a>

            <h3 class="mx-3" style="padding-top: 15px;">
                <a href="index.php" style="text-decoration: none; color: white;"><?php echo $sitename ?></a>
            </h3>
        </div>

        <p>
            <small>
                "<?php echo $tagline ?>"
            </small>
        </p>

        <div class="bg-dark d-sm-block d-md-block d-block d-lg-none px-2 bg-danger" style="margin-left: -5px; margin-bottom: 3.5em;">
            <div class="dr">
                <button class="dropbtn bg-dark text-white" style="border: 1px solid grey; border-radius: 30px; outline:none; height: 35px;">Categories
                <i class="fa fa-caret-down text-white"></i>
                </button>
                <div class="dr-content">
                <a href="index.php">Home</a>
                <a href="toprated.php">Top Rated</a>
                <a href="tv-series.php">Tv Series</a>
                <a href="now-playing.php">Now Playing</a>
                <a href="upcoming.php">Upcoming</a>
                </div>
            </div>
        </div>

        <div style="float: right;" class="mb-2 mx-1">

            <form action="search.php" method="get">
                <select name="channel" class="bg-dark px-2" style="margin-left: 0px; height: 35px; border-radius: 30px; color: white; outline:none;" required>
                    <option value="movie" selected="selected"> Movie </option>
                    <option value="tv"> TV Show </option>
                </select>

                <input placeholder="search" type="text" class="col-4 col-md-6" name="search" style="padding-left: 15px; border: none; border-bottom: 1px solid #fff; border-left: 1px solid #fff; background: transparent; border-bottom-left-radius: 50px; outline: none; height: 35px; color: #fff; font-size: 16px;" required>
                
                <button type="submit" style="height: 35px; border-top-left-radius: 50px; background:linear-gradient(green,yellow); border-bottom-right-radius: 50px;  outline: none; border: none; position: relative; left: -35px; z-index:-50%; top: 0.0rem;" class="px-4"><i class ="bx bx-search"></i></button>

            </form>

        </div>

        <ul style="display: flex; flex: flex-wrap;">

            <a href="index.php" class="d-none d-sm-none d-md-none text-center d-lg-block py-2 col-2 col-md-2 h-25" style="color: #fff; font-size: 14px; font-weight: bold; text-decoration: none; background-color: green; margin-right: 8px; margin-right: 10px; border-radius:50px;">Home</a>

            <a href="toprated.php" class="d-none d-sm-none d-md-none text-center d-lg-block py-2 col-md-2 h-25" style="color: #fff; font-size: 14px; font-weight: bold; text-decoration: none; background-color: green; margin-right: 8px; border-radius:50px;">Top Rated</a>

            <a href="tv-series.php" class="d-none d-none d-sm-none text-center d-md-none d-lg-block py-2 col-md-2 h-25" style="color: #fff; font-size: 14px; font-weight: bold; text-decoration: none; background-color: green; margin-right: 8px; border-radius:50px;">TV Series</a>
            
            <a href="now-playing.php" class="d-none d-sm-none text-center d-md-none d-lg-block py-2 col-md-3 h-25" style="color: #fff; font-size: 14px; font-weight: bold; text-decoration: none; background-color: green;  margin-right: 8px; border-radius:50px;">Now Playing</a>

            <a href="upcoming.php" class="d-none d-sm-none text-center d-md-none d-lg-block py-2 col-md-2  h-25" style="color: #fff; font-size: 14px; font-weight: bold; text-decoration: none; background-color: green; margin-right: 8px; border-radius:50px;">Upcoming</a>

        </ul>

    </div>
