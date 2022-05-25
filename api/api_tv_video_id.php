<?php
$tvv = curl_init();

curl_setopt($tvv, CURLOPT_URL, "https://api.themoviedb.org/3/tv/".$id_tv."/videos?api_key=".$apikey);
curl_setopt($tvv, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($tvv, CURLOPT_HEADER, FALSE);
curl_setopt($tvv, CURLOPT_HTTPHEADER, array("Accept :application/json"));
$tvvideo = curl_exec($tvv);
curl_close($tvv);
$tv_video_id = json_decode($tvvideo);
?>