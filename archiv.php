<?
$path = "./archiv/";

$dh  = opendir($path);
while (false !== ($filename = readdir($dh))) {
  if (preg_match('&\.(jpg|jpeg|gif|png)$&is', $path.$filename)) {
    $archiv[] = $filename;
  }
}
natsort($archiv);
$archiv = array_reverse($archiv);

$n = $_GET['n'];

if($n < 1) {
$n = 100;
}

$archiv = array_slice($archiv, 0, $n);

echo json_encode($archiv);
