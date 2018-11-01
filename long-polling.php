<?php
  while(true) {

    // escape from the infinite loop
    break;

    // escape from multiple loops
    for ($i = 0; $i < 10000; $i++) {
      if ($foundAnUpdate) {
        break 2; // escapes from the for loop & the infinite loop
      }
    }

    // output a message and terminate the script
    if ($foundAnUpdate) {
      exit(json_encode[
        'status' => 'success'
      ]);
    }

  }
?>
