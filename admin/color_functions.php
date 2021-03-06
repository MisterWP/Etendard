<?php
function etendard_HTMLToRGB($htmlCode)
{
	if($htmlCode[0] == '#') $htmlCode = substr($htmlCode, 1);
    
	if (strlen($htmlCode) == 3){
		$htmlCode = $htmlCode[0] . $htmlCode[0] . $htmlCode[1] . $htmlCode[1] . $htmlCode[2] . $htmlCode[2];
	}

	$r = hexdec($htmlCode[0] . $htmlCode[1]);
	$g = hexdec($htmlCode[2] . $htmlCode[3]);
	$b = hexdec($htmlCode[4] . $htmlCode[5]);
	
	return $b + ($g << 0x8) + ($r << 0x10);
}

function etendard_RGBToHSL($RGB) {
	$r = 0xFF & ($RGB >> 0x10);
	$g = 0xFF & ($RGB >> 0x8);
	$b = 0xFF & $RGB;

	$r = ((float)$r) / 255.0;
	$g = ((float)$g) / 255.0;
	$b = ((float)$b) / 255.0;

	$maxC = max($r, $g, $b);
	$minC = min($r, $g, $b);

	$l = ($maxC + $minC) / 2.0;

	if($maxC == $minC){
		$s = 0;
		$h = 0;
	}
	else{
		if($l < .5){
			$s = ($maxC - $minC) / ($maxC + $minC);
		}
		else{
			$s = ($maxC - $minC) / (2.0 - $maxC - $minC);
		}
		if($r == $maxC)
			$h = ($g - $b) / ($maxC - $minC);
		if($g == $maxC)
			$h = 2.0 + ($b - $r) / ($maxC - $minC);
		if($b == $maxC)
			$h = 4.0 + ($r - $g) / ($maxC - $minC);

		$h = $h / 6.0; 
	}

	$h = (int)round(255.0 * $h);
	$s = (int)round(255.0 * $s);
	$l = (int)round(255.0 * $l);

	return (object) Array('hue' => $h, 'saturation' => $s, 'lightness' => $l);
}

function etendard_HSLToHTML($h, $s, $l) {
	$h = ((float)$h) / 255.0;
	$s = ((float)$s) / 255.0;
	$l = ((float)$l) / 255.0;

	if($s == 0){
		$r = $l;
		$g = $l;
		$b = $l;
	}
	else{
		if($l < .5){
			$t2 = $l * (1.0 + $s);
		}
		else{
			$t2 = ($l + $s) - ($l * $s);
		}
		$t1 = 2.0 * $l - $t2;

		$rt3 = $h + 1.0/3.0;
		$gt3 = $h;
		$bt3 = $h - 1.0/3.0;

		if($rt3 < 0) $rt3 += 1.0;
		if($rt3 > 1) $rt3 -= 1.0;
		if($gt3 < 0) $gt3 += 1.0;
		if($gt3 > 1) $gt3 -= 1.0;
		if($bt3 < 0) $bt3 += 1.0;
		if($bt3 > 1) $bt3 -= 1.0;

		if(6.0 * $rt3 < 1) $r = $t1 + ($t2 - $t1) * 6.0 * $rt3;
		else if(2.0 * $rt3 < 1) $r = $t2;
		else if(3.0 * $rt3 < 2) $r = $t1 + ($t2 - $t1) * ((2.0/3.0) - $rt3) * 6.0;
		else $r = $t1;

		if(6.0 * $gt3 < 1) $g = $t1 + ($t2 - $t1) * 6.0 * $gt3;
		else if(2.0 * $gt3 < 1) $g = $t2;
		else if(3.0 * $gt3 < 2) $g = $t1 + ($t2 - $t1) * ((2.0/3.0) - $gt3) * 6.0;
		else $g = $t1;

		if(6.0 * $bt3 < 1) $b = $t1 + ($t2 - $t1) * 6.0 * $bt3;
		else if(2.0 * $bt3 < 1) $b = $t2;
		else if(3.0 * $bt3 < 2) $b = $t1 + ($t2 - $t1) * ((2.0/3.0) - $bt3) * 6.0;
		else $b = $t1;
    }

	$r = (int)round(255.0 * $r);
	$g = (int)round(255.0 * $g);
	$b = (int)round(255.0 * $b);
    
	return 'rgb('.$r.','.$g.','.$b.')';
}