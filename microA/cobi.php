<?php 
    $array1 = array("Merah", "Hijau", "Biru");
    $array2 = array("Apel", "Mangga", "Pisang");

    foreach ($array1 as $key => $value) {
      echo $value;
      echo $array2[$key];
    }
  ?>