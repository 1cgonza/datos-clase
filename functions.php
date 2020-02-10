<?php
function includeAllFunctions($functions_path = '') {
  $functions_path = !empty($functions_path) ? $functions_path : realpath(__DIR__ . '/functions');

  foreach(glob($functions_path . DIRECTORY_SEPARATOR . "*") as $path) {
    if (preg_match('/\.php$/', $path)) {
      include_once $path;
    } elseif (is_dir($path)) {
      includeAllFunctions($path);
    }  
  }
}

includeAllFunctions();