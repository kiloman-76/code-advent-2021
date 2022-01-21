<?
function countConsumption($file){
    $fp = fopen($file, "r");

    while($string = fgets($fp)) {
        $length = strlen($string);
        $array[] = $string;
    }

    $i = 0;
    $j = 0;

    $oxygen = getPopularData($array, $i);
    $co = getUnpopularData($array, $j);

    echo (bindec($oxygen) * bindec($co));


}

function getPopularData($array, $i){
    $count = getStatisticNumber($array, $i);
    if($count >= 0){
        $number = 1;
    } else {
        $number = 0;
    }

    foreach($array as $key => $item){
        if($item[$i] != $number){
            unset($array[$key]);
        }
    }

    if(count($array) > 1){
        return getPopularData($array, $i + 1);
    } else {
        return array_pop($array);
    }
}

function getUnpopularData($array, $j){
    $count = getStatisticNumber($array, $j);
    if($count >= 0){
        $number = 0;
    } else {
        $number = 1;
    }

    foreach($array as $key => $item){
        if($item[$j] != $number){
            unset($array[$key]);
        }
    }

    if(count($array) > 1){
        return getUnpopularData($array, $j + 1);
    } else {
        return array_pop($array);
    }
}

function getStatisticNumber($array, $i){
    $count = 0;
    foreach ($array as $string){
        $number = $string[$i];
        if(!isset($number)){
            $end = true;
        } else {
            if((int)$number === 0){
                $count--;
            } else {
                $count++;
            }
        }
    }
    return $count;
}



countConsumption('input.txt');
?>