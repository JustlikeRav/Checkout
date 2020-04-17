<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>
 <?php 
 
 echo '<p>Hello World</p>';
 
 session_start();
 
 echo $_SESSION['product'];
 
 
 ?> 
 
 
 </body>
</html>