<?php
$page = 1;
$toppage = 1;
// if the the pagination buttons are pressed get the page number
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = $page;
}

if(isset($_GET['toppage'])){
    $toppage = $_GET['toppage'];
}else{
    $toppage = $toppage;
}


$ctp = curl_init();

// curl_setopt($ctp, CURLOPT_URL, "https://api.themoviedb.org/3/tv/on_the_air?api_key=".$apikey);
curl_setopt($ctp, CURLOPT_URL, "https://api.themoviedb.org/3/tv/on_the_air?api_key=".$apikey."&page=".$page);
curl_setopt($ctp, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ctp, CURLOPT_HEADER, FALSE);
curl_setopt($ctp, CURLOPT_HTTPHEADER, array("Accept :application/json"));
$response12 = curl_exec($ctp);
curl_close($ctp);
$tv_onair = json_decode($response12);


$ctr = curl_init();

// curl_setopt($ctr, CURLOPT_URL, "https://api.themoviedb.org/3/tv/top_rated?api_key=".$apikey);
curl_setopt($ctr, CURLOPT_URL, "https://api.themoviedb.org/3/tv/top_rated?api_key=".$apikey."&page=".$toppage);
curl_setopt($ctr, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ctr, CURLOPT_HEADER, FALSE);
curl_setopt($ctr, CURLOPT_HTTPHEADER, array("Accept :application/json"));
$response13 = curl_exec($ctr);
curl_close($ctr);
$tv_top = json_decode($response13);

?>