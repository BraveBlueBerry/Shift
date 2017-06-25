<?php

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
