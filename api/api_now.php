<?php
// top rated
$n = curl_init();

// curl_setopt($n, CURLOPT_URL, "https://api.themoviedb.org/3/movie/now_playing?api_key=".$apikey);
curl_setopt($n, CURLOPT_URL, "https://api.themoviedb.org/3/movie/now_playing?api_key=".$apikey."&page=".$page);
curl_setopt($n, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($n, CURLOPT_HEADER, FALSE);
curl_setopt($n, CURLOPT_HTTPHEADER, array("Accept :application/json"));
$res = curl_exec($n);
curl_close($n);
$nowplaying = json_decode($res);

?>