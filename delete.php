<?php
require_once("helpers/mysql.class.php");
if(isset($_GET['id'])){
  $hap = unlink($_GET['nm']);
  if($hap){
    $db=new MySQL();
      $db->connect();
      $query = "DELETE FROM images WHERE image_id=".$_GET['id'];
      $db->execute($query);
          echo "<script>alert('Delete File From Harddisk')</script>";
          echo "<script>location.href='query.php'</script>";
   } 
  else{
      echo "<script>alert('No Delete File From Harddisk')</script>";
      echo "<script>location.href='query.php'</script>";
      }
  
}
?>