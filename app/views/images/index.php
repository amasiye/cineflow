<?php
switch (Router::get_request_file_extension())
{
  case '.jpg':
    imagejpeg(RESPATH . 'images/movies.jpg');
    break;

  default:
    # code...
    break;
}
?>
