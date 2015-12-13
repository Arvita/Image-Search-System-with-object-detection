<?php

// Filename: ColorCompare.php
// Copyright (C) 2011 Chris Gosling
// Licence: GNU Lesser General Public License, http://www.gnu.org/copyleft/lesser.html

class ColorCompare
{
    // max width and height for testing and resampling
    static private $resize_dim = 5;

    // define colour swatches
    static public $hasil = array( "1","2","3","4","5","6","7","8","9","10",
                                     "11","12","13","14","15","16","17","18","19","20",
                                     "21","22","23","24","25","26","27","28","29","30",
                                     "31","32","33","34","35","36","37","38","39","40",
                                     "41","42","43","44","45","46","47","48","49","50",
                                     "51","52","53","54","55","56","57","58","59","60",
                                     "61","62","63","64","65","66","67","68","69","70",
                                     "71","72","73","74","75","76","77","78","79","80",
                                     "81","82","83","84","85","86","87","88","89","90",
                                     "91","92","93","94","95","96","97","98","99","100",
                                     "101","102","103","104","105","106","107","108","109","110",
                                     "111","112","113","114","115","116","117","118","119","120",
                                     "121","122","123","124","125"
    );
    static public $swatches = array(    
        "WHITE"             =>     "FFFFFF",
        "CREAM"             =>     "F2EAC6",
        "YELLOW"            =>    "F8E275",
        "ORANGE"            =>    "FA9A4D",
        "PEACH"             =>    "F9A986",    
        "PINK"              =>    "FAACA8",
        "MAGENTA"          =>    "FC6D99",
        "RED"               =>    "FF0000",
        "BURGANDY"          =>    "AC2424",
        "PURPLE"            =>    "A746B1",
        "LAVENDER"          =>    "C791F1",
        "LIGHT_BLUE"        =>    "A4A6FD",
        "DARK_BLUE"         =>    "1D329D",
        "TURQUIOSE"         =>    "2CCACD",
        "AQUA"              =>    "9CD8F4",
        "DARK_GREEN"        =>    "62854F",
        "LIGHT_GREEN"       =>    "A9CB6C",
        "TAN"               =>    "CAB775",
        "BROWN"             =>    "815B10",
        "GRAY"              =>    "777777",
        "BLACK"             =>    "000000"
    );

    // this will be the swatch index for each color        
    // eg: $swatch_index[0] = "WHITE" and so on  
    static public $swatch_index;

    // this image contains the palette the test image will be compared to 
    static private $comp_palette = false;

    // percentage that colour needs to reach of total
    // pixels for colour to be considered significant
    static public $threshold_filter = 0.0001;

    static public $BIN = 0;

    // ------------------------------------------------------
    // ACCEPTS: max number of colours to return
    //                     filename of image
    //                    comparison method id
    //                        1 = resize method
    // RETURNS: array (up to max_colors) containing indexed with the color
    //                        name and
    //                    the value will be the pixel count in order of highest to
    //                        lowest pixels
    //                    eg: "TAN" => 1000, "PINK" => 800, "MAGENTA" => 600
    //                    or false if failed
    static public function compare($max_colors, $filename)
    {
        $tally = array();

        // size image to something managable (256 x 256)
        $image_data = getimagesize($filename);

        // if small image then use its current size
        /*if ($image_data[0] < self::$resize_dim
            && $image_data[1] < self::$resize_dim)
        {*/
            $image = self::createImage($filename, $image_data[2]);    
            $width = $image_data[0];
            $height = $image_data[1];
        /*}    
        else     // resize the image
        {
            $res = self::createResizedImage($filename, $image_data[0],
                $image_data[1], $image_data[2]);

            if ($res == false)
            {
                print "[failed on resize]";
                return false;
            }    
            else
            {
                $image = $res[0];
                $width = $res[1];
                $height = $res[2];
            }                    
        } */   

        // create the comparison palette
        self::createComparisonPalette();

        // loop through x axis
        $nilai1= 0;
        $nilai2= 0;
        $nilai3= 0;
        $nilai4= 0;
        $nilai5= 0;
        $nilai6= 0;
        $nilai7= 0;
        $nilai8= 0;
        $nilai9= 0;
        $nilai10= 0;
        $nilai11= 0;
        $nilai12= 0;
        $nilai13= 0;
        $nilai14= 0;
        $nilai15= 0;
        $nilai16= 0;
        $nilai17= 0;
        $nilai18= 0;
        $nilai19= 0;
        $nilai20= 0;
        $nilai21= 0;
        $nilai22= 0;
        $nilai23= 0;
        $nilai24= 0;
        $nilai25= 0;
        $nilai26= 0;
        $nilai27= 0;
        $nilai28= 0;
        $nilai29= 0;
        $nilai30= 0;
        $nilai31= 0;
        $nilai32= 0;
        $nilai33= 0;
        $nilai34= 0;
        $nilai35= 0;
        $nilai36= 0;
        $nilai37= 0;
        $nilai38= 0;
        $nilai39= 0;
        $nilai40= 0;
        $nilai41= 0;
        $nilai42= 0;
        $nilai43= 0;
        $nilai44= 0;
        $nilai45= 0;
        $nilai46= 0;
        $nilai47= 0;
        $nilai48= 0;
        $nilai49= 0;
        $nilai50= 0;
        $nilai51= 0;
        $nilai52= 0;
        $nilai53= 0;
        $nilai54= 0;
        $nilai55= 0;
        $nilai56= 0;
        $nilai57= 0;
        $nilai58= 0;
        $nilai59= 0;
        $nilai60= 0;
        $nilai61= 0;
        $nilai62= 0;
        $nilai63= 0;
        $nilai64= 0;
        $nilai65= 0;
        $nilai66= 0;
        $nilai67= 0;
        $nilai68= 0;
        $nilai69= 0;
        $nilai70= 0;
        $nilai71= 0;
        $nilai72= 0;
        $nilai73= 0;
        $nilai74= 0;
        $nilai75= 0;
        $nilai76= 0;
        $nilai77= 0;
        $nilai78= 0;
        $nilai79= 0;
        $nilai80= 0;
        $nilai81= 0;
        $nilai82= 0;
        $nilai83= 0;
        $nilai84= 0;
        $nilai85= 0;
        $nilai86= 0;
        $nilai87= 0;
        $nilai88= 0;
        $nilai89= 0;
        $nilai90= 0;
        $nilai91= 0;
        $nilai92= 0;
        $nilai93= 0;
        $nilai94= 0;
        $nilai95= 0;
        $nilai96= 0;
        $nilai97= 0;
        $nilai98= 0;
        $nilai99= 0;
        $nilai100= 0;
        $nilai101= 0;
        $nilai102= 0;
        $nilai103= 0;
        $nilai104= 0;
        $nilai105= 0;
        $nilai106= 0;
        $nilai107= 0;
        $nilai108= 0;
        $nilai109= 0;
        $nilai110= 0;
        $nilai110= 0;
        $nilai111= 0;
        $nilai112= 0;
        $nilai113= 0;
        $nilai114= 0;
        $nilai115= 0;
        $nilai116= 0;
        $nilai117= 0;
        $nilai118= 0;
        $nilai119= 0;
        $nilai120= 0;
        $nilai121= 0;
        $nilai122= 0;
        $nilai123= 0;
        $nilai124= 0;
        $nilai125= 0;

        for ($x = 0; $x < $width; $x++)
        {        
            // loop through y axis
            for ($y = 0; $y < $height; $y++)
            {        
                // compare to find colest match and tally
                list($red, $green, $blue) = self::getRGBFromPixel($image, $x, $y);
                // $index = imagecolorclosest(self::$comp_palette, $red, $green, $blue);
                // $tally[$index] = $tally[$index] + 1;
                list($BIN) = self::RGBtoBIN($red,$green,$blue);
                //for($a=0; $a<=count($hasil); $a++){
                    if ($BIN==1){
                        $nilai1++;
                    }
                    else if ($BIN==2){
                        $nilai2++;
                    }
                    else if ($BIN==3){
                        $nilai3++;
                    }
                    else if ($BIN==4){
                        $nilai4++;
                    }
                    else if ($BIN==5){
                        $nilai5++;
                    }
                    else if ($BIN==6){
                        $nilai6++;
                    }
                    else if ($BIN==7){
                        $nilai7++;
                    }
                    else if ($BIN==8){
                        $nilai8++;
                    }
                    else if ($BIN==9){
                        $nilai9++;
                    }
                    else if ($BIN==10){
                        $nilai10++;
                    }
                    else if ($BIN==11){
                        $nilai11++;
                    }
                    else if ($BIN==12){
                        $nilai12++;
                    }
                    else if ($BIN==13){
                        $nilai13++;
                    }
                    else if ($BIN==14){
                        $nilai14++;
                    }
                    else if ($BIN==15){
                        $nilai15++;
                    }
                    else if ($BIN==16){
                        $nilai16++;
                    }
                    else if ($BIN==17){
                        $nilai17++;
                    }
                    else if ($BIN==18){
                        $nilai18++;
                    }
                    else if ($BIN==19){
                        $nilai19++;
                    }
                    else if ($BIN==20){
                        $nilai20++;
                    }
                    else if ($BIN==21){
                        $nilai21++;
                    }
                    else if ($BIN==22){
                        $nilai22++;
                    }
                    else if ($BIN==23){
                        $nilai23++;
                    }
                    else if ($BIN==24){
                        $nilai24++;
                    }
                    else if ($BIN==25){
                        $nilai25++;
                    }
                    else if ($BIN==26){
                        $nilai26++;
                    }
                    else if ($BIN==27){
                        $nilai27++;
                    }
                    else if ($BIN==28){
                        $nilai28++;
                    }
                    else if ($BIN==29){
                        $nilai29++;
                    }
                    else if ($BIN==30){
                        $nilai30++;
                    }
                    else if ($BIN==31){
                        $nilai31++;
                    }
                    else if ($BIN==32){
                        $nilai32++;
                    }
                    else if ($BIN==33){
                        $nilai33++;
                    }
                    else if ($BIN==34){
                        $nilai34++;
                    }
                    else if ($BIN==35){
                        $nilai35++;
                    }
                    else if ($BIN==36){
                        $nilai36++;
                    }
                    else if ($BIN==37){
                        $nilai37++;
                    }
                    else if ($BIN==38){
                        $nilai38++;
                    }
                    else if ($BIN==39){
                        $nilai39++;
                    }
                    else if ($BIN==40){
                        $nilai40++;
                    }
                    else if ($BIN==41){
                        $nilai41++;
                    }
                    else if ($BIN==42){
                        $nilai42++;
                    }
                    else if ($BIN==43){
                        $nilai43++;
                    }
                    else if ($BIN==44){
                        $nilai44++;
                    }
                    else if ($BIN==45){
                        $nilai45++;
                    }
                    else if ($BIN==46){
                        $nilai46++;
                    }
                    else if ($BIN==47){
                        $nilai47++;
                    }
                    else if ($BIN==48){
                        $nilai48++;
                    }
                    else if ($BIN==49){
                        $nilai49++;
                    }
                    else if ($BIN==50){
                        $nilai50++;
                    }
                    else if ($BIN==51){
                        $nilai51++;
                    }
                    else if ($BIN==52){
                        $nilai52++;
                    }
                    else if ($BIN==53){
                        $nilai53++;
                    }
                    else if ($BIN==54){
                        $nilai54++;
                    }
                    else if ($BIN==55){
                        $nilai55++;
                    }
                    else if ($BIN==56){
                        $nilai56++;
                    }
                    else if ($BIN==57){
                        $nilai57++;
                    }
                    else if ($BIN==58){
                        $nilai58++;
                    }
                    else if ($BIN==59){
                        $nilai59++;
                    }
                    else if ($BIN==60){
                        $nilai60++;
                    }
                    else if ($BIN==61){
                        $nilai61++;
                    }
                    else if ($BIN==62){
                        $nilai62++;
                    }
                    else if ($BIN==63){
                        $nilai63++;
                    }
                    else if ($BIN==64){
                        $nilai64++;
                    }
                    else if ($BIN==65){
                        $nilai65++;
                    }
                    else if ($BIN==66){
                        $nilai66++;
                    }
                    else if ($BIN==67){
                        $nilai67++;
                    }
                    else if ($BIN==68){
                        $nilai68++;
                    }
                    else if ($BIN==69){
                        $nilai69++;
                    }
                    else if ($BIN==70){
                        $nilai70++;
                    }
                    else if ($BIN==71){
                        $nilai71++;
                    }
                    else if ($BIN==72){
                        $nilai72++;
                    }
                    else if ($BIN==73){
                        $nilai73++;
                    }
                    else if ($BIN==74){
                        $nilai74++;
                    }
                    else if ($BIN==75){
                        $nilai75++;
                    }
                    else if ($BIN==76){
                        $nilai76++;
                    }
                    else if ($BIN==77){
                        $nilai77++;
                    }
                    else if ($BIN==78){
                        $nilai78++;
                    }
                    else if ($BIN==79){
                        $nilai79++;
                    }
                    else if ($BIN==80){
                        $nilai80++;
                    }
                    else if ($BIN==81){
                        $nilai81++;
                    }
                    else if ($BIN==82){
                        $nilai82++;
                    }
                    else if ($BIN==83){
                        $nilai83++;
                    }
                    else if ($BIN==84){
                        $nilai84++;
                    }
                    else if ($BIN==85){
                        $nilai85++;
                    }
                    else if ($BIN==86){
                        $nilai86++;
                    }
                    else if ($BIN==87){
                        $nilai87++;
                    }
                    else if ($BIN==88){
                        $nilai88++;
                    }
                    else if ($BIN==89){
                        $nilai89++;
                    }
                    else if ($BIN==90){
                        $nilai90++;
                    }
                    else if ($BIN==91){
                        $nilai91++;
                    }
                    else if ($BIN==92){
                        $nilai92++;
                    }
                    else if ($BIN==93){
                        $nilai93++;
                    }
                    else if ($BIN==94){
                        $nilai94++;
                    }
                    else if ($BIN==95){
                        $nilai95++;
                    }
                    else if ($BIN==96){
                        $nilai96++;
                    }
                    else if ($BIN==97){
                        $nilai97++;
                    }
                    else if ($BIN==98){
                        $nilai98++;
                    }
                    else if ($BIN==99){
                        $nilai99++;
                    }
                    else if ($BIN==100){
                        $nilai100++;
                    }
                    else if ($BIN==101){
                        $nilai101++;
                    }
                    else if ($BIN==102){
                        $nilai102++;
                    }
                    else if ($BIN==103){
                        $nilai103++;
                    }
                    else if ($BIN==104){
                        $nilai104++;
                    }
                    else if ($BIN==105){
                        $nilai105++;
                    }
                    else if ($BIN==106){
                        $nilai106++;
                    }
                    else if ($BIN==107){
                        $nilai107++;
                    }
                    else if ($BIN==108){
                        $nilai108++;
                    }
                    else if ($BIN==109){
                        $nilai109++;
                    }
                    else if ($BIN==110){
                        $nilai110++;
                    }
                    else if ($BIN==111){
                        $nilai111++;
                    }
                    else if ($BIN==112){
                        $nilai112++;
                    }
                    else if ($BIN==113){
                        $nilai113++;
                    }
                    else if ($BIN==114){
                        $nilai114++;
                    }
                    else if ($BIN==115){
                        $nilai115++;
                    }
                    else if ($BIN==116){
                        $nilai116++;
                    }
                    else if ($BIN==117){
                        $nilai117++;
                    }
                    else if ($BIN==118){
                        $nilai118++;
                    }
                    else if ($BIN==119){
                        $nilai119++;
                    }
                    else if ($BIN==120){
                        $nilai120++;
                    }
                    else if ($BIN==121){
                        $nilai121++;
                    }
                    else if ($BIN==122){
                        $nilai122++;
                    }
                    else if ($BIN==123){
                        $nilai123++;
                    }
                    else if ($BIN==124){
                        $nilai124++;
                    }
                    else if ($BIN==125){
                        $nilai125++;
                    }
                    
            //}
                $hasilBIN [] = $BIN;
                
            }    

        }
        return ['BIN 1'=> $nilai1, 'BIN 2'=> $nilai2, 'BIN 3'=>$nilai3, 'BIN 4'=>$nilai4, 'BIN 5' =>$nilai5, 'BIN 6'=>$nilai6, 'BIN 7'=>$nilai7, 'BIN 8'=>$nilai8 , 'BIN 9'=>$nilai9,'BIN 10'=>$nilai10,
                'BIN 11'=> $nilai11, 'BIN 12'=> $nilai12, 'BIN 13'=>$nilai13, 'BIN 14'=>$nilai14, 'BIN 15' =>$nilai15, 'BIN 16'=>$nilai16, 'BIN 17'=>$nilai17, 'BIN 18'=>$nilai18 , 'BIN 19'=>$nilai19,'BIN 20'=>$nilai20,
                'BIN 21'=> $nilai21, 'BIN 22'=> $nilai22, 'BIN 23'=>$nilai23, 'BIN 24'=>$nilai24, 'BIN 25' =>$nilai25, 'BIN 26'=>$nilai26, 'BIN 27'=>$nilai27, 'BIN 28'=>$nilai28 , 'BIN 29'=>$nilai29,'BIN 30'=>$nilai30,
                'BIN 31'=> $nilai31, 'BIN 32'=> $nilai32, 'BIN 33'=>$nilai33, 'BIN 34'=>$nilai34, 'BIN 35' =>$nilai35, 'BIN 36'=>$nilai36, 'BIN 37'=>$nilai37, 'BIN 38'=>$nilai38 , 'BIN 39'=>$nilai39,'BIN 40'=>$nilai40,
                'BIN 41'=> $nilai41, 'BIN 42'=> $nilai42, 'BIN 43'=>$nilai43, 'BIN 44'=>$nilai44, 'BIN 45' =>$nilai45, 'BIN 46'=>$nilai46, 'BIN 47'=>$nilai47, 'BIN 48'=>$nilai48 , 'BIN 49'=>$nilai49,'BIN 50'=>$nilai50,
                'BIN 51'=> $nilai51, 'BIN 52'=> $nilai52, 'BIN 53'=>$nilai53, 'BIN 54'=>$nilai54, 'BIN 55' =>$nilai55, 'BIN 56'=>$nilai56, 'BIN 57'=>$nilai57, 'BIN 58'=>$nilai58 , 'BIN 59'=>$nilai59,'BIN 60'=>$nilai60,
                'BIN 61'=> $nilai61, 'BIN 62'=> $nilai62, 'BIN 63'=>$nilai63, 'BIN 64'=>$nilai64, 'BIN 65' =>$nilai65, 'BIN 66'=>$nilai66, 'BIN 67'=>$nilai67, 'BIN 68'=>$nilai68 , 'BIN 69'=>$nilai69,'BIN 70'=>$nilai70,
                'BIN 71'=> $nilai71, 'BIN 72'=> $nilai72, 'BIN 73'=>$nilai73, 'BIN 74'=>$nilai74, 'BIN 75' =>$nilai75, 'BIN 76'=>$nilai76, 'BIN 77'=>$nilai77, 'BIN 78'=>$nilai78 , 'BIN 79'=>$nilai79,'BIN 80'=>$nilai80,
                'BIN 81'=> $nilai81, 'BIN 82'=> $nilai82, 'BIN 83'=>$nilai83, 'BIN 84'=>$nilai84, 'BIN 85' =>$nilai85, 'BIN 86'=>$nilai86, 'BIN 87'=>$nilai87, 'BIN 88'=>$nilai88 , 'BIN 89'=>$nilai89,'BIN 90'=>$nilai90,
                'BIN 91'=> $nilai91, 'BIN 92'=> $nilai92, 'BIN 93'=>$nilai93, 'BIN 94'=>$nilai94, 'BIN 95' =>$nilai95, 'BIN 96'=>$nilai96, 'BIN 97'=>$nilai97, 'BIN 98'=>$nilai98 , 'BIN 99'=>$nilai99,'BIN 100'=>$nilai100,
                'BIN 101'=> $nilai101, 'BIN 102'=> $nilai102, 'BIN 103'=>$nilai103, 'BIN 104'=>$nilai104, 'BIN 105' =>$nilai105, 'BIN 106'=>$nilai106, 'BIN 107'=>$nilai107, 'BIN 108'=>$nilai108 , 'BIN 109'=>$nilai109,'BIN 110'=>$nilai110,
                'BIN 111'=> $nilai111, 'BIN 112'=> $nilai112, 'BIN 113'=>$nilai113, 'BIN 114'=>$nilai114, 'BIN 115' =>$nilai115, 'BIN 116'=>$nilai116, 'BIN 117'=>$nilai117, 'BIN 118'=>$nilai118 , 'BIN 119'=>$nilai119,'BIN 120'=>$nilai120,
                'BIN 121'=> $nilai121, 'BIN 122'=> $nilai122, 'BIN 123'=>$nilai123, 'BIN 124'=>$nilai124, 'BIN 125' =>$nilai125
               ];
        // $countBIN = array_count_values($hasilBIN);
        // print_r($countBIN);
        //return $hasilBIN;
        //sort the tally results
        //arsort($tallys);
        /*$ret_array = array();        
        $i = 0;    
        //$threshold = ($width * $height) * (self::$threshold_filter / 100);

        // build the return array of the top results
        foreach($hasilBIN as $key => $count)
        {
            // make sure the count is high enough to be considered significant
            //  if (self::$hasil[$i])
            //  {
            //     print_r($count);
            //     $ret_array[] = $i;
            //     $i++;
            //  }
            //  else
            //      break; 

            // // if ($i >= $max_colors)
            // //     break;
        }
        //print_r(self::$hasil);
        //$ret_array = array();        
        //echo count(self::$hasil);
        print_r($ret_array);

        $array_new = array();
        for ($i = 0; $i<COUNT(self::$hasil); $i++) {
            if(!isset($ret_array[$hasilBIN[$i]]) || $ret_array[$hasilBIN[$i]] == 0 || $ret_array[$hasilBIN[$i]] == NULL)
                $array_new[$hasilBIN[$i]] = 0;
            else
                $array_new[$hasilBIN[$i]] = $ret_array[$hasilBIN[$i]];
        }

        // print_r($array_new);
        // exit;


        return $array_new;*/
    }

    // --------------------------------------------------------
    // ACCEPTS: image resource
    //                    x/y coordinate
    // RETURNS: array contain red, green, blue value of pixel    
    static private function getRGBFromPixel($image, $x, $y)
    {
        $rgb = imagecolorat($image, $x, $y);
        $red = ($rgb >> 16) & 0xFF;
        $green = ($rgb >> 8) & 0xFF;
        $blue = $rgb & 0xFF;
        return array ($red, $green, $blue);
    }    

    // -------------------------------------------------------
    // Creates the comparison palette if not already created
    static private function createComparisonPalette()
    {
        if (self::$comp_palette === false)
        {
            $swatch_index = array();
            self::$comp_palette = imagecreate(16, 16);

            foreach(self::$swatches as $name => $hex)
            {
                $color = self::hexToRGB($hex);
                $index = imagecolorallocate(self::$comp_palette,
                    $color['red'], $color['green'], $color['blue']);
                self::$swatch_index[$index] = $name;
            }
        }
    }

    // new RGB to BIN Histogram    
    static private function RGBtoBIN($r, $g, $b)
    {
        $red = round($r/64);
        $green = round($g/64);
        $blue = round($b/64);
        $hasilBIN = 25 * $red + 5 * $green + $blue;
        $BIN = $hasilBIN + 1;
        return array ($BIN);
        // return self::rgbToHsl($red, $green, $blue);        
    }

    // ------------------------------------------------------
    // ACCEPTS: hex color value without the # (eg: FF0000)
    // RETURNS: associative array with values for ref, green and blue
    static private function hexToRGB($hexStr)
    {
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
        return $rgbArray;
    }

    // ------------------------------------------------------
    // ACCEPTS: filename of input image,
    //                    original width and height of image
    //                    type of image
    // RETURNS: resized image or false if failed
    static private function createResizedImage($filename, $width, $height, $type)
    {        
        // create image from file
        $image = self::createImage($filename, $type);

        if (!$image)
            return false;

        //calculate dimensions based on smallest size
        $new_width = $width < self::$resize_dim ? $width : self::$resize_dim;
        $new_height = $height < self::$resize_dim ? $height : self::$resize_dim;

        // create resampled image
        $new_image = imagecreatetruecolor($new_width, $new_height);

        if ($new_image === false)
            return false;

        if (imagecopyresampled($new_image, $image, 0, 0, 0, 0, $new_width,
            $new_height, $width, $height))
            return array($new_image, $new_width, $new_height);
        else
            return false;
    }

    // ---------------------------------------------------
    // Creates an image object for the supplied image file and type
    // ACCEPTS: the filename of the image and the image type
    // RETURNS: image object
    static private function createImage($filename, $image_type)
    {
        // determine image type
        switch ($image_type)
        {
            case IMAGETYPE_GIF:
                $image = imagecreatefromgif($filename);
                break;

            case IMAGETYPE_JPEG:
                $image = imagecreatefromjpeg($filename);
                break;

            case IMAGETYPE_PNG:
                $image = imagecreatefrompng($filename);
                break;

            default:
                return false;    
        }    

        return $image;
    }
    //========================================================================= Hitung Kemiripan Cosin
    function calcCosine($arrayMeta, $arrayQuery){ //130x80 dan 130x1 500x126 dan 125 x 1
        $row = count($arrayMeta);           //130 metadata
        $col = count($arrayMeta[0]);        //11
        $rowQuery = count($arrayQuery);         //11 query
        $colQuery = count($arrayQuery[0]);      //1
        // echo $row."/n";
        // echo $col."/n";
        // echo $rowQuery."/n";
        // echo $colQuery."/n";
        $temp = array();
        $hasil = array();
        $nilai = 0;
        for($i = 0; $i < $row; $i++){ //12
            for($j = 0; $j < $colQuery; $j++){ //1
                $x = 0.0;
                $y = 0.0;
                $temp[$i][$j] = 0;
                for($l = 0; $l < $col; $l++){ //11
                    $temp[$i][$j] = $temp[$i][$j] + ($arrayMeta[$i][$l] * $arrayQuery[$l]);
                    $x = $x + ($arrayMeta[$i][$l] * $arrayMeta[$i][$l]);
                    $y = $y + ($arrayQuery[$l] * $arrayQuery[$l]);
                    //echo $arrayQuery[$l]." ";
                }
                // echo "<br>";
                // echo "<br>";
                $x = sqrt($x);
                $y = sqrt($y);
                if($temp[$i][$j] == 0)
                    $hasil[$i][$j] = 0;
                else
                    $hasil[$i][$j] = ($temp[$i][$j]) / ($x * $y);
            }
        }       
        arsort($hasil);
        //print_r($hasil);
        return $hasil;
    }
}    

?>