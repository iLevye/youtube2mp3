<?
//$youtube = "http://www.youtube.com/watch?v=Pib8eYDSFEI&feature=g-all-lik";
$youtube = $_GET['url'];
$youtube = explode("v=", $youtube);
$youtube = explode("&", $youtube[1]);

$video_id = $youtube[0];
$url = "http://www.youtube-mp3.org/api/itemInfo/?video_id=$video_id&ac=www";
$data = file_get_contents($url);
$data = explode("info = ", $data);
$data = explode(";", $data[1]);
$data = json_decode($data[0]);
//print_r($data);

$file = file_get_contents("http://www.youtube-mp3.org/get?video_id=$video_id&h=" . $data->h);
header('Content-Disposition: attachment; filename="' . $data->title . '"');
header("Content-Type: audio/mpeg");
echo $file;


?>
