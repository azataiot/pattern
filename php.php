<?php
function fx($x, $m, $s){
	$res=(1/(sqrt(2*3.14)*$s))*exp((-(($x-$m)*($x-$m)))/(2*$s*$s));
	return $res;
}
$N = 20;

$m1=-3; $m2=-1; $sig1=1; $sig2=0.5; $p1=0.9; $p2=0.1;

$x1min = $m1-3*$sig1;	$x1max = $m1+3*$sig1;
$x2min = $m2-3*$sig2;	$x2max = $m2+3*$sig2;

if($x1min <= $x2min) $xmin = $x1min;
else $xmin = $x2min;

if($x1max >= $x2max) $xmax = $x1max;
else $xmax=$x2max;

echo "x1min=".$x1min."<br>";	echo "x1max=".$x1max."<br>";
echo "x2min=".$x2min."<br>";	echo "x2max=".$x2max."<br>";
echo "xmin=".$xmin."<br>";		echo "xmax=".$xmax."<br>";


for($i=0; $i<$N; $i++){
	$x[$i]=$xmin+(($xmax-$xmin)/($N-1))*$i;
	echo "x[$i]=".$x[$i]."<br>";
}
for($i=0; $i<$N; $i++){
	$fx1[$i] = fx($x[$i],$m1,$sig1);
	$fx2[$i] = fx($x[$i],$m2,$sig2);
}
for($i=0; $i<$N; $i++){
	echo "fx1[$i]=".$fx1[$i]."<br>";
}
for($i=0; $i<$N; $i++){
	echo "fx2[$i]=".$fx2[$i]."<br>";
}

$d1 = $sig1*$sig1;
$d2 = $sig2*$sig2;
$a = $d2-$d1;
$b = 2*$m2*$d1-2*$m1*$d2;
$c = $m1*$m1*$d2-$m2*$m2*$d1-2*$d1*$d2*log($sig2/$sig1);

echo "d1=".$d1."<br>";
echo "d2=".$d2."<br>";
echo "a=".$a."<br>";
echo "b=".$b."<br>";
echo "c=".$c."<br>";

$xg1=(-$b+sqrt($b*$b-4*$a*$c))/(2*$a);
$xg2=(-$b-sqrt($b*$b-4*$a*$c))/(2*$a);
echo "xg1=".$xg1."<br>";
echo "xg2=".$xg2."<br>";

if($xmin > $xg1) $xmin = $xg1;
echo "xmin=".$xmin."<br>";
if ($xmax < $xg2) $xmax = $xg2;
echo "xmax=".$xmax."<br>";
echo "after pereopredelenie <br>";
for($i=0; $i<$N; $i++){
	$x[$i]=$xmin+(($xmax-$xmin)/($N-1))*$i;
	echo "x[$i]=".$x[$i]."<br>";
}
for($i=0; $i<$N; $i++){
	$fx1[$i]=fx($x[$i],$m1,$sig1);
	$fx2[$i]=fx($x[$i],$m2,$sig2);
}
for($i=0;$i<$N;$i++){
	echo "fx1[$i]=".$fx1[$i]."<br>";
}
for($i=0;$i<$N;$i++){
	echo "fx2[$i]=".$fx2[i]."<br>";
}
for($i=0;$i<$N;$i++){
	if(($xg1<$x[$i])&&($x[$i]<$xg2)) $fg[$i]=0.5;
	else $fg[$i]=0;
	echo "fg[$i]=".$fg[$i]."<br>";
}
for($i=0;$i<$N;$i++){
	$fx1[$i]=fx($x[$i],$m1,$sig1); $fx1[$i]=$fx1[$i]*$p1;
	$fx2[$i]=fx($x[$i],$m2,$sig2); $fx2[$i]=$p2*$fx2[$i]; 
}
for($i=0;$i<$N;$i++){
	echo "fx1[$i]=".$fx1[$i]."<br>";
}
for($i=0;$i<$N;$i++){
	echo "fx2[$i]=".$fx2[$i]."<br>";
}
for($i=0;$i<$N;$i++){
	$Q1[$i]=($fx1[$i])/($fx1[$i]+$fx2[$i]);
	$Q2[$i]=($fx2[$i])/($fx1[$i]+$fx2[$i]);
}
for($i=0;$i<$N;$i++){
	echo "Q1[$i]=".$Q1[$i]."<br>";
}
for($i=0;$i<$N;$i++){
	echo "Q2[$i]=".$Q2[$i]."<br>";
}
$d1=$sig1*$sig1;
$d2=$sig2*$sig2;
$a=$d2-$d1;
$b=2*$m2*$d1-2*$m1*$d2;
$c=$m1*$m1*$d2-$m2*$m2*$d1-2*$d1*$d2*log(($sig2*$p1)/($sig1*$p2));
echo "d1=".$d1."<br>";
echo "d2=".$d2."<br>";
echo "a=".$a."<br>";
echo "b=".$b."<br>";
echo "c=".$c."<br>";
$xg1=(-$b+sqrt($b*$b-4*$a*$c))/(2*$a);
$xg2=(-$b-sqrt($b*$b-4*$a*$c))/(2*$a);
echo "xg1=".$xg1."<br>";
echo "xg2=".$xg2."<br>";
for($i=0;$i<$N;$i++){
	if(($xg1<$x[$i])&&($x[$i]<$xg2)) 
		$fg[$i]=0.5;
	else 
		$fg[$i]=0;
	echo "fg[$i]=".$fg[$i]."<br>";
}
?>