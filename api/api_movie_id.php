<?php
$id = curl_init();

curl_setopt($id, CURLOPT_URL, "https://api.themoviedb.org/3/movie/".$id_movie."?api_key=".$apikey);
curl_setopt($id, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($id, CURLOPT_HEADER, FALSE);
curl_setopt($id, CURLOPT_HTTPHEADER, array("Accept :application/json"));
$movieid = curl_exec($id);
curl_close($id);
$movie_id = json_decode($movieid);
?>