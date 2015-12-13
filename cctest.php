<?php
error_reporting();
date_default_timezone_set("Indonesia/Jakarta");
require_once("helpers/colorcompare.class.php");
require_once("helpers/mysql.class.php");

// files to be tested
// $filenames = array(    
//     "img/1.jpg",
//     "img/2.jpg",
//     "img/3.jpg",
//     "img/5.jpg",
//     "img/6.jpg",
//     "img/7.jpg",
//     "img/8.jpg",
//     "img/9.jpg",
//     "img/10.jpg",
//     "img/11.jpg",
//     "img/12.jpg",
//     "img/13.jpg",
//     "img/14.jpg",
//     "img/avatar2.png");

$filenames = array(    
    /*"image.orig/800.jpg",
    "image.orig/801.jpg",
    "image.orig/802.jpg",
    "image.orig/803.jpg",
    "image.orig/804.jpg",
    "image.orig/805.jpg",
    "image.orig/806.jpg",
    "image.orig/807.jpg",
    "image.orig/808.jpg",
    "image.orig/809.jpg",
    "image.orig/810.jpg",
    "image.orig/811.jpg",
    "image.orig/812.jpg",
    "image.orig/813.jpg",
    "image.orig/814.jpg",
    "image.orig/815.jpg",
    "image.orig/816.jpg",
    "image.orig/817.jpg",
    "image.orig/818.jpg",
    "image.orig/819.jpg",
    "image.orig/820.jpg",
    "image.orig/821.jpg",
    "image.orig/822.jpg",
    "image.orig/823.jpg",
    "image.orig/824.jpg",
    "image.orig/825.jpg",
    "image.orig/826.jpg",
    "image.orig/827.jpg",
    "image.orig/828.jpg",
    "image.orig/829.jpg",
    "image.orig/830.jpg",
    "image.orig/831.jpg",
    "image.orig/832.jpg",
    "image.orig/833.jpg",
    "image.orig/834.jpg",
    "image.orig/835.jpg",
    "image.orig/836.jpg",
    "image.orig/837.jpg",
    "image.orig/838.jpg",
    "image.orig/839.jpg",
    "image.orig/840.jpg",
    "image.orig/841.jpg",
    "image.orig/842.jpg",
    "image.orig/843.jpg",
    "image.orig/844.jpg",
    "image.orig/845.jpg",
    "image.orig/846.jpg",
    "image.orig/847.jpg",
    "image.orig/848.jpg",
    "image.orig/849.jpg"
*/
/*
    "image.orig/850.jpg",
    "image.orig/851.jpg",
    "image.orig/852.jpg",
    "image.orig/853.jpg",
    "image.orig/854.jpg",
    "image.orig/855.jpg",
    "image.orig/856.jpg",
    "image.orig/857.jpg",
    "image.orig/858.jpg",
    "image.orig/859.jpg",
    "image.orig/860.jpg",
    "image.orig/861.jpg",
    "image.orig/862.jpg",
    "image.orig/863.jpg",
    "image.orig/864.jpg",
    "image.orig/865.jpg",
    "image.orig/866.jpg",
    "image.orig/867.jpg",
    "image.orig/868.jpg",
    "image.orig/869.jpg",
    "image.orig/870.jpg",
    "image.orig/871.jpg",
    "image.orig/872.jpg",
    "image.orig/873.jpg",
    "image.orig/874.jpg",
    "image.orig/875.jpg",
    "image.orig/876.jpg",
    "image.orig/877.jpg",
    "image.orig/878.jpg",
    "image.orig/879.jpg",
    "image.orig/880.jpg",
    "image.orig/881.jpg",
    "image.orig/882.jpg",
    "image.orig/883.jpg",
    "image.orig/884.jpg",
    "image.orig/885.jpg",
    "image.orig/886.jpg",
    "image.orig/887.jpg",
    "image.orig/888.jpg",
    "image.orig/889.jpg",
    "image.orig/890.jpg",
    "image.orig/891.jpg",
    "image.orig/892.jpg",
    "image.orig/893.jpg",
    "image.orig/894.jpg",
    "image.orig/895.jpg",*/
 /*   "image.orig/896.jpg",
    "image.orig/897.jpg",
    "image.orig/898.jpg",
    "image.orig/899.jpg"*/
    );

// max colors
$max_colors = 10;

$db=new MySQL();
$db->connect();
/*$query = "TRUNCATE images";
$db->execute($query);*/

// loop through each test pattern
$a = 596;
for ($i = 0; $i < count($filenames); $i++)
{
    //print "<table><tr><td><img src='{$filenames[$i]}' width='200px'></td>\n";
    $result = ColorCompare::compare($max_colors, $filenames[$i]);
    //print_r($result);
    //print "<td><table width='200' border='1'>";
    
    if ($result == false)
        print "<tr><td>[failed]</td></tr>\n";
    else
    {    
        //print "<tr><td><b>BIN</b></td><td><b>JUMLAH</b></td></tr>";
        // $temp

        $db=new MySQL();
        $db->connect();
        $query = "INSERT INTO images (image_id, image_name, bin1, bin2, bin3, bin4, bin5, bin6, bin7, bin8, bin9, bin10, bin11, bin12, bin13, bin14, bin15, bin16, bin17, bin18, bin19, bin20, bin21, bin22, bin23, bin24, bin25, bin26, bin27, bin28, bin29, bin30, bin31, bin32, bin33, bin34, bin35, bin36, bin37, bin38, bin39, bin40, bin41, bin42, bin43, bin44, bin45, bin46, bin47, bin48, bin49, bin50, bin51, bin52, bin53, bin54, bin55, bin56, bin57, bin58, bin59, bin60, bin61, bin62, bin63, bin64, bin65, bin66, bin67, bin68, bin69, bin70, bin71, bin72, bin73, bin74, bin75, bin76, bin77, bin78, bin79, bin80, bin81, bin82, bin83, bin84, bin85, bin86, bin87, bin88, bin89, bin90, bin91, bin92, bin93, bin94, bin95, bin96, bin97, bin98, bin99, bin100, bin101, bin102, bin103, bin104, bin105, bin106, bin107, bin108, bin109, bin110, bin111, bin112, bin113, bin114, bin115, bin116, bin117, bin118, bin119, bin120, bin121, bin122, bin123, bin124, bin125) VALUES ('', '$filenames[$i]', ";

        $j = 1;

        foreach ($result as $hasil => $count) {
        //print "<tr><td width='50'>BIN-$j</td><td>".$count."</td></tr>\n";
         if($j == 1)
                $query .= "'$count'";
            else
                $query .= ", '$count'";

            $j++;

             
        }

        // foreach ($result as $color => $count)
        // {
        //     print "<tr><td width='50' bgcolor='#".ColorCompare::$swatch_index[$color]
        //         ."'>&nbsp;</td><td>".$count."</td></tr>\n";

        //    /* if($j == 0)
        //         $query .= "'$count'";
        //     else
        //         $query .= ", '$count'";
        //         */

        //     $j++;
        // }

        $query .= ")";

        $db->execute($query);
        

        // print "<tr><td width='50' bgcolor='#".ColorCompare::$swatches[$color]
        //     ."'>&nbsp;</td><td>".$count."</td></tr>\n";
    }        

    //print "</table></td></tr></table>\n";    

}
echo "berhasil";
?>