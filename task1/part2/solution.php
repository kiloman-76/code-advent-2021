<?
    function countDepth($file){
        $fp = fopen($file, "r");
        $array = [];
        $sumArray = [];
        $count = 0;
        while($string = fgets($fp)){
            $array[] = (int)$string;
        }

        foreach ($array as $key => $value){
            $second = $array[$key+1];
            $third = $array[$key+2];
            if($second && $third){
                $first = $value;
                $sum = $first + $second + $third;
                if(!empty($sumArray) ){
                    $prevSum = end($sumArray);
                    if($prevSum < $sum){

                        $count++;
                    }
                }
                $sumArray[] = $sum;
            }
        }
        echo ($count);

    }

    countDepth('input.txt');
?>