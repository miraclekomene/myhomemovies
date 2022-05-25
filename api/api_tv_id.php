<?php
$tv = curl_init();

curl_setopt($tv, CURLOPT_URL, "https://api.themoviedb.org/3/tv/".$id_tv."?api_key=".$apikey);
curl_setopt($tv, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($tv, CURLOPT_HEADER, FALSE);
curl_setopt($tv, CURLOPT_HTTPHEADER, array("Accept :application/json"));
$tvid = curl_exec($tv);
curl_close($tv);
$tv_id = json_decode($tvid);
?>