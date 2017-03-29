<?php

 



  
try{
$conexao = new PDO('mysql:host=localhost;dbname=visa','root','Fuck@7'); 
}catch(PDOException $e){
echo 'ERROR: ' . $e->getMessage();
 

} 

?>
  
