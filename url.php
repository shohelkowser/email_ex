<?php
if (isset($_REQUEST['url'])) {
  // fetch data from specified url
  $text = file_get_contents($_REQUEST['url']);
  $id = $_REQUEST['id'];
  echo $id." ";
  // echo $email.", ";
}
  // parse emails
  if (!empty($text)) {
    $res = preg_match_all(
      "/[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}/i",
      $text,
      $matches
    );

    if ($res) {
      
      foreach(array_unique($matches[0]) as $email) {
        echo $email." ";
      
      }
    }
  }
?>