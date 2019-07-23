#!/usr/bin/php
<?php

if ($argc <= 1)
    return;
    
function get_data($url)
{
	$fd = curl_init();
	curl_setopt($fd, CURLOPT_URL, $url);
    curl_setopt($fd, CURLOPT_RETURNTRANSFER, 1);
	$data = curl_exec($fd);
	curl_close($fd);
	return ($data);
}
$data = get_data($argv[1]);

$images = array();
//defini le protocole web...
preg_match_all('/^(http)s?/', $argv[1], $webhttp);
$web = NULL;
if ($webhttp[0][0] != NULL)
    $web = $webhttp[0][0];
// Cherchez url et creer dossier target[0]
$target = preg_replace('#^https?://#', '', $argv[1]);
$target = explode("/", $target);
if (!file_exists($target[0]))
{   
    mkdir($target[0]);
}
//prendre les elem de src
function get_url_src($src, $site)
{
    if (preg_match('/^https?/U', $src))
        $url = $src;
    else
        $url = $site . $src;
    return ($url);
}
preg_match_all('/<img(.*?)src="(.*?)"(.*?)>/', $data, $images);
// telecharger chaque image...finalement src == url_imgage
foreach($images[2] as $src)
{
    $url_image = get_url_src($src, $target[0]);
    $content_image = get_data("$web://$url_image");
    $indice_nom_image = explode("/", $url_image);
    $indice = count($indice_nom_image) - 1;
    file_put_contents("./" . $target[0] . "/" . $indice_nom_image[$indice], $content_image);
}

?>