<?php
/*
function get_combinations($big_n, $n){
    $combinations = [];

    $comb = [];
    for ($i=0; $i < $n; $i++) {
        $comb[] = 1;
    }
    $comb[$n-1] = 0;

    for ($i=0; $i < pow($big_n, $n); $i++) {
        $j = $n - 1;

        do{
            $overflow = false;
            $comb[$j]++;
            if($comb[$j] > $big_n){
                $comb[$j] = 1;
                $overflow = true;
                $j--;
            }
        }while($overflow);
        $found = false;
        foreach($combinations as $combi){
            $found_arr = [];
            for ($j=0; $j < $n; $j++) {
                $found_arr[] = false;
            }
            for ($j=0; $j < $n; $j++) {
                if(in_array($comb[$j],$combi)){
                    $found_arr[$j] = true;
                    $key = array_search($comb[$j], $combi);
                    unset($combi[$key]);
                }
            }
            $total_found = true;
            foreach($found_arr as $f){
                if(!$f){
                    $total_found = false;
                }
            }
            if($total_found)
                $found = true;
        }
        if(!$found){
            array_push($combinations, $comb);
        }
    }
    return $combinations;
}
for ($i=1; $i < 8; $i++) {
    echo count(get_combinations($i,2)) . "\n";
}

var_dump(get_combinations(2,3));
*/

$inputorigin = "2016-05-05";
$input = explode('-',$inputorigin);
if(count($input) != 3)
    die("Invalid1");
$length = [4,2,2];

foreach($input as $key => $number){
    if(!is_numeric($number))
        die($number);
    if(strlen($number) != $length[$key])
        die("Invalid $number");
}
if($input[0] < 1970)
    die("Invalid3");
if($input[1] < 1 || $input[1] > 12)
    die("Invalid4");
if($input[2] < 1 || $input[2] > 31)
    die("Invalid5");


$input = $inputorigin . " 00:00:00";
die($input);
