<?php
	error_reporting(true);
	$awal = microtime(true);
	set_time_limit(0);

	$treshold = 100000;

if(is_array($_FILES)) {
	if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {
	$sourcePath = $_FILES['userImage']['tmp_name'];
	$targetPath = "image/query/".$_FILES['userImage']['name'];
	if(move_uploaded_file($sourcePath,$targetPath)) {
  	    $filename = $targetPath;
		$max_colors = 10;

		// include composer autoloader
		// require_once __DIR__ . '/vendor/autoload.php';
		require_once __DIR__ . '/helpers/colorcompare.class.php';
		require_once __DIR__ . '/helpers/arrays.class.php';
		require_once __DIR__ . '/helpers/mysql.class.php';
		// require_once __DIR__ . '/helpers/textmining.class.php';

		$result = ColorCompare::compare($max_colors, $filename);

		$j = 0;
		$arrayQuery = array();
        foreach ($result as $color => $count)
        {
            $arrayQuery[$j] = $count;
            $j++;
        }

        $db=new MySQL();
	    $db->connect();
	    $query = "SELECT * FROM images";
	    $db->execute($query);
	    $arrayMeta = $db->get_dataset();
	    $hasilquery = array();
	    //echo count($arrayMeta);

	    //----------------------cosin
	 //    for($h=0; $h<COUNT($arrayMeta); $h++) {
	 //    	$arquery = array();
	 //        for($i=0; $i<125; $i++)
	 //        {
	 //        	$arquery[] = $arrayMeta[$h][$i+2];
	 //        }
	 //        $hasilquery[] = $arquery;  
	 //    }

	 //    $urut1 = array();
	 //    $urut1 = ColorCompare::calcCosine($hasilquery,$arrayQuery);
	 //    //print_r($urut1);
	 //    //print_r($arrayMeta);
	 //    // cosin
	 //    //echo COUNT($urut1);
	 //    $counter = 0;
	 //    $compared = array();
	 //    $urut = array();
	 //    foreach($urut1 as $key => $value){	
		//         	$urut[$counter] = array(
		//         	"img"   => $arrayMeta[$key][1],
		//         	"total" => $urut1[$key][0]
		//         	);
		//         	$counter++;
		// }
		
	    //----------------------------- ecluidiens
	    $counter = 0;
	    $compared = array();
	    for($h=0; $h<COUNT($arrayMeta); $h++) {
	    	
	        $total = 0;
	      for($i=0; $i<=count($arrayMeta[0]); $i++)
	        {
	            //$color = ColorCompare::$hasilBin[$i];
	            $tmp_selisih = abs($arrayMeta[$h][$i + 2] - $arrayQuery[$i]);
	            $total += $tmp_selisih;

	        }  
	        
	        //echo $total;
	        //echo "<br>";
	         if($total <= $treshold) {
		        // $compared[$h] = array();
		        $compared[$counter] = array(
		        	"img"	=> $arrayMeta[$h][1],
		        	"total"	=> $total
		        );
		        $counter++;
		    }

	        // $counter++;
	    }


	    $arrays = new Arrays;
	    $urut = $arrays->sorting($compared);

		}

	} 		
}

	$akhir = microtime(true);

	// echo "hai";
?>

<hr />


<div class="div-title">
	Result
</div>
<br />

<div class="row">
	<?php 
		$i=1;
		foreach ($urut as $u) { 
	?>
		<div class="col-md-3">
			<img src="<?=$u['img'];?>" height="20%" widht="20%" class="img-thumbnail">
			<?=$u['total'];?>
			<!-- <div class="small" style="color:#fff; text-align: center;"><?=$u['total'];?></div> -->
		</div>
	<?php 
			if($i%4 == 0)
				echo '</div><hr /><div class="row">';

			$i++;
		} 
	?>
</div>

<hr />
<div>
	<?php $lama = $akhir-$awal; echo "Time elapsed: <strong>$lama second</strong>"; ?>
</div>