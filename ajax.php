<?


if($_GET['a'] == "livefilemtime") {
  $r->livefilemtime = filemtime('live.jpg');
}elseif($_GET['a'] == "status") {

  $archivSize = round(CalcDirectorySize('archiv/'));
  $archivCount = exec('ls -l ./archiv/ | wc -l');

  $r->archiv->count = $archivCount;
  $r->archiv->byte = $archivSize;

  exec("df -h | grep -B 1 rootfs", $r->rootfs);
}elseif($_GET['a'] == "archiv") {
  $path = "./archiv/";

  $dh  = opendir($path);
  while (false !== ($filename = readdir($dh))) {
    if (preg_match('&\.(jpg|jpeg|gif|png)$&is', $path.$filename)) {
      $archiv[] = $filename;
    }
  }
  natsort($archiv);
  $r = array_reverse($archiv);

  //$n = $_GET['n'];
  //if($n < 1 || $n > 100) {
  //  $n = 100;
  //}
  //$archiv = array_slice($archiv, 0, $n);
}

echo json_encode($r);




/**
 * Calculate the full size of a directory
 *
 * @author      Jonas John
 * @version     0.2
 * @link        http://www.jonasjohn.de/snippets/php/dir-size.htm
 * @param       string   $DirectoryPath    Directory path
 */
function CalcDirectorySize($DirectoryPath) {
 
    // I reccomend using a normalize_path function here
    // to make sure $DirectoryPath contains an ending slash
    // (-> http://www.jonasjohn.de/snippets/php/normalize-path.htm)
 
    // To display a good looking size you can use a readable_filesize
    // function.
    // (-> http://www.jonasjohn.de/snippets/php/readable-filesize.htm)
 
    $Size = 0;
 
    $Dir = opendir($DirectoryPath);
 
    if (!$Dir)
        return -1;
 
    while (($File = readdir($Dir)) !== false) {
 
        // Skip file pointers
        if ($File[0] == '.') continue; 
 
        // Go recursive down, or add the file size
        if (is_dir($DirectoryPath . $File))            
            $Size += CalcDirectorySize($DirectoryPath . $File . DIRECTORY_SEPARATOR);
        else 
            $Size += filesize($DirectoryPath . $File);        
    }
 
    closedir($Dir);
 
    return $Size;
}
