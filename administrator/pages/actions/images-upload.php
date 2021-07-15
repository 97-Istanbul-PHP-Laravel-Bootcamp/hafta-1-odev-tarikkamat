<?php 

require_once('settings.config.php');

if(count($_FILES["Image"]["tmp_name"]) > 0){
    
    
    for($i = 0; $i < count($_FILES["Image"]["tmp_name"]); $i++) {
      
        
           $uzanti = substr($_FILES["Image"]["name"][$i],-4,4);
           $adi    = uniqid().$uzanti;
           $yol    = "Image/".$adi;
          
          move_uploaded_file($_FILES["Image"]["tmp_name"][$i],$yol);
        
          $query = $db->prepare("insert into uyeler set resim = :Image");
          $query->execute(["Image" => $yol]);
          $ok = $query->rowCount();  
        
        
    }
 
   if($ok){
   
       echo "images uploaded successfully";
       
   }else {
   
     echo "There was a problem uploading the image.";
       
   }

}

?>
