<?php
// top rated
$ce = curl_init();


// curl_setopt($ce, CURLOPT_URL, "https://api.themoviedb.org/3/movie/upcoming?api_key=".$apikey);
curl_setopt($ce, CURLOPT_URL, "https://api.themoviedb.org/3/movie/upcoming?api_key=".$apikey."&page=".$page);
curl_setopt($ce, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ce, CURLOPT_HEADER, FALSE);
curl_setopt($ce, CURLOPT_HTTPHEADER, array("Accept :application/json"));
$response6 = curl_exec($ce);
curl_close($ce);
$upcoming = json_decode($response6);

?>