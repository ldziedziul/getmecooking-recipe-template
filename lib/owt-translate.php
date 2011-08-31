<?php

include('spyc.php');

$owt_lang="en";
$owt_translations = Spyc::YAMLLoad(dirname(__FILE__).'/../text/gmc-'.$owt_lang.'.yaml');

//error_log(print_r($owt_translations, 1));

function owt_t($key) {
  global $owt_translations;

  $k=explode(".",$key);

  return owt_t_get($k, $owt_translations);
}

function owt_t_get($key, $data) {
  if (is_array($key) && count($key)!=1) {
    $k=array_shift($key);
    return owt_t_get($key, $data[$k]);
  } else {
    return $data[$key[0]];
  }
}

?>
