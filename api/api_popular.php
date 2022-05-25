<?php
// top rated
$pop = curl_init();

// curl_setopt($pop, CURLOPT_URL, "https://api.themoviedb.org/3/movie/popular?api_key=".$apikey);
curl_setopt($pop, CURLOPT_URL, "https://api.themoviedb.org/3/movie/popular?api_key=".$apikey."&page=".$page);
curl_setopt($pop, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($pop, CURLOPT_HEADER, FALSE);
curl_setopt($pop, CURLOPT_HTTPHEADER, array("Accept :application/json"));
$respop = curl_exec($pop);
curl_close($pop);
$popular = json_decode($respop);

?>