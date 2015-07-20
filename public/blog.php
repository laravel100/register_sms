<?php
$mysqli=new mysqli('localhost','root','','laravel');
$mysqli->query("SET NAMES 'utf8'");
$query=$mysqli->query("SELECT beer.name as bn, dist.name as dn FROM beer 
								LEFT JOIN beer_dist on beer.id=beer_dist.beer_id
								LEFT JOIN dist on beer_dist.dist_id=dist.id_dist
								WHERE beer.id=157");
print_r($query->fetch_array());
while($popular_1 = $query->fetch_array()){
	echo $popular_1['bn']."---";
}
?>