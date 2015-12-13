<?php
	class TextMining {
		function tokenizing($kalimat){
			//$tolower = strtolower($kalimat);		
			// $remove_string = "";
			// if(preg_match('/(\/|\?|:|,|\.|;|\'|\"|{|}|[|]|!|@|#|\$|%|\^|&|\*|\t|\n)/i',$kalimat)){
			$remove_string = preg_replace('/[^[:alnum:][:space:]]/ui'," ",$kalimat);
			// }
			$splitted = explode(" ", $remove_string);
			// print_r($splitted);

			$array[] = array();
			$i = 0;
			foreach ($splitted as $string){	
				if($string != ""){
					$array[$i] = $string;	
					$i++;
				}
			}		
			return $array;
		}
		
		function filtering($kalimat, $stopword){
			// $kalimat = explode(" ", $kalimat);
			$stopword = explode("\n", $stopword);
			$array[] = array();
			$a = 0;
			for($i=0;$i<count($kalimat);$i++){
				$kal = $kalimat[$i];
				$sama = false;
				for($j=0;$j<count($stopword);$j++){
					$stop = $stopword[$j];
					if($kal == $stop){
						$sama = true;
					}
				}
				if(!$sama){
					$array[$a] = $kal;	
					$a++;
				}
			}
			return $array;
		}
		
		function analyzing($dokumen, $keywords){
			$array[] = array();
			for($i=0;$i<count($keywords);$i++){
				$key = $keywords[$i];
				$a = 0;
				for($j=0;$j<count($dokumen);$j++){
					$doc = $dokumen[$j];
					if($key == $doc){					
						$a++;
					}
				}
				$array[$i] = $a;
			}
			return $array;
		}
	}
?>