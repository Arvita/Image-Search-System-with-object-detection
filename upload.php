<?php
error_reporting();
require_once("helpers/colorcompare.class.php");
require_once("helpers/mysql.class.php");

if (isset($_FILES['files'] )) {
    $file_name =array();
    $file_tmp =array();
    $file_size =array();
    $filenames =array();
    $errors= array();
    $desired_dir="upload";
    $counter = 0;
    foreach($_FILES['files']['tmp_name'] as $key => $tmp_name ){
        $file_size =$_FILES['files']['size'][$key];
        $file_name = $_FILES['files']['name'][$key];
        $file_size =$_FILES['files']['size'][$key];
        $file_tmp =$_FILES['files']['tmp_name'][$key];
        if($file_size > 2097152){
            $errors[]='File size must be less than 2 MB';
        }
        //print_r($file_name);   
        //if(move_uploaded_file($sourcePath,$targetPath)) {
        
        if (empty($errors)==true) {
             $loc = "upload/".$file_name;
                if(file_exists($loc)){
                    $increment = 0;
                    list($name, $ext) = explode('.', $loc);
                    while(file_exists($loc)) {
                        $increment++;
                        $loc = $name."-".$increment . '.' . $ext;
                        $file_name = $name."-".$increment . '.' . $ext;
                    }
                move_uploaded_file($file_tmp,$loc);
                $filenames  = $loc;
                }
                else{
                move_uploaded_file($file_tmp,"upload/".$file_name);
                $filenames  = "upload/".$file_name;
                }
                
                $db=new MySQL();
                $db->connect();        
                
                $max_colors = 10;
                
                //print_r($file_name);
                /*for ($i = 0; $i < count($filenames); $i++)
                {*/
                    $result = ColorCompare::compare($max_colors, $filenames);
                    //print_r($result);
                    if ($result == false)
                        print "<tr><td>[failed]</td></tr>\n";
                    else
                    {    
                        $db=new MySQL();
                        $db->connect();
                        $query = "INSERT INTO images (image_id, image_name, bin1, bin2, bin3, bin4, bin5, bin6, bin7, bin8, bin9, bin10, bin11, bin12, bin13, bin14, bin15, bin16, bin17, bin18, bin19, bin20, bin21, bin22, bin23, bin24, bin25, bin26, bin27, bin28, bin29, bin30, bin31, bin32, bin33, bin34, bin35, bin36, bin37, bin38, bin39, bin40, bin41, bin42, bin43, bin44, bin45, bin46, bin47, bin48, bin49, bin50, bin51, bin52, bin53, bin54, bin55, bin56, bin57, bin58, bin59, bin60, bin61, bin62, bin63, bin64, bin65, bin66, bin67, bin68, bin69, bin70, bin71, bin72, bin73, bin74, bin75, bin76, bin77, bin78, bin79, bin80, bin81, bin82, bin83, bin84, bin85, bin86, bin87, bin88, bin89, bin90, bin91, bin92, bin93, bin94, bin95, bin96, bin97, bin98, bin99, bin100, bin101, bin102, bin103, bin104, bin105, bin106, bin107, bin108, bin109, bin110, bin111, bin112, bin113, bin114, bin115, bin116, bin117, bin118, bin119, bin120, bin121, bin122, bin123, bin124, bin125) VALUES ('', '$filenames', ";

                        $j = 1;

                        foreach ($result as $hasil => $count) {
                        
                         if($j == 1)
                                $query .= "'$count'";
                            else
                                $query .= ", '$count'";

                            $j++;
              
                        }

                        $query .= ")";
                        
                        $db->execute($query);        
                    }        
        }
        else{
            echo $errors;
            }
                // }
        //}
            $counter++;
    }
    //print_r($filenames);
    if(empty($error)){
        echo "<script>alert('Success Upload $counter images');location.href='query.php';</script>";
        
     }
    //print_r($result);

}
?> 
