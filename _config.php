<?php

  function normalize_slashes ($path) {
    return str_replace('\\', '/', $path);
  }

  // setting our absolute file path
  $path = normalize_slashes(dirname(__FILE__) . '\_includes');
  set_include_path($path);

  // setting our absolute link path
  $document_root = normalize_slashes($_SERVER['DOCUMENT_ROOT']);
  
  $application_root = normalize_slashes(dirname(__FILE__));
  
  $link_path = str_replace($document_root, '', $application_root);
  
  define('BASE_PATH', $link_path);

?>