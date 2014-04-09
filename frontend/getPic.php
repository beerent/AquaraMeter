<html>
  <body>
    <?php

      header('Location: /load.php');
      error_reporting(E_ALL);
      //echo "opening socket.<br>";
      $host = "127.0.0.1";
      $port = 5677;
      $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
      if($socket == false) {
        echo "failed socket creation.<br>";
      }
      //echo "socket created.<br>";
      $result = socket_connect($socket, $host, $port);
      if(result == false){
        echo"failed connection to server.<br>";
      }   
      //echo "connection made.<br>";

      $out = "P";
      socket_write($socket, $out, strlen($out));
      //echo "data sent.<br>";

      $buf = 'This is my buffer.';
      if (false !== ($bytes = socket_recv($socket, $buf, 2048, 0))) {
      } else {
        echo "socket_recv() failed; reason: " . socket_strerror(socket_last_error($socket)) . "\n";
      }

      if(strcmp($buf, "1") ==0){
        echo"request sent.<br>";
      }
      //echo $buf . "<br>";
      $out = "4";
      socket_write($socket, $out, strlen($out));
      //echo "data sent.<br>";

      $buf = 'This is my buffer.';
      if (false !== ($bytes = socket_recv($socket, $buf, 2048, 0))) {
        } else {
        echo "socket_recv() failed; reason: " . socket_strerror(socket_last_error($socket)) . "\n";
      }
      //echo $buf . "<br>";
      if(strcmp($buf, "1") ==0){
        echo"request accepted.";
      }

      fclose($socket); 
      //sleep(7);     
      ?>
  </body>
</html>
