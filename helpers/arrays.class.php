<?php
	class Arrays {
		function printArray($array){
			echo "<pre><p align = 'left'>";
			print_r($array);
			echo "</p></pre>"; 
		}

		function sorting($array) {
			$temp = 0;
			$arr_tmp = $array;
			$counter1 = 0;
			//print_r($array);

			
			for ($i=0; $i<COUNT($array); $i++) {
				for ($j=0; $j<COUNT($array); $j++) {
					if($array[$j]['total'] > $array[$i]['total']) {
						$t = $array[$i];
						$array[$i] = $array[$j];
						$array[$j] = $t;
					}
				}
			}
			return $array;
		}
	}
?>