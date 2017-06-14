<?php
$fs = glob('/var/log/*', GLOB_BRACE);
foreach($fs as $d) {
  if(is_dir($d)) {
    $fsl1 = glob($d.'/*', GLOB_BRACE);
    foreach($fsl1 as $d) {
      if(fnmatch('*.*', basename($d))) {
        if(pathinfo(basename($d))['extension'] == 'gz' || is_numeric(pathinfo(basename($d))['extension'])) {
          unlink($d);
          echo "Deleted: ".$d."\n";
        }
      }
    }
  } else {
    if(fnmatch('*.*', basename($d))) {
      if(pathinfo(basename($d))['extension'] == 'gz' || is_numeric(pathinfo(basename($d))['extension'])) {
        unlink($d);
        echo "Deleted: ".$d."\n";
      }
    }
  }
}
echo " -- Done -- \n";
