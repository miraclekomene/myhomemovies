<?php
$ci = curl_init();

curl_setopt($ci, CURLOPT_URL, "https://api.themoviedb.org/3/movie/similar".$id_movie."?api_key=".$apikey);
curl_setopt($ci, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ci, CURLOPT_HEADER, FALSE);
curl_setopt($ci, CURLOPT_HTTPHEADER, array("Accept :application/json"));
$response2 = curl_exec($ci);
curl_close($ci);
$similar_id = json_decode($response2);
?>