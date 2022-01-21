<?
    function countConsumption($file){
        $fp = fopen($file, "r");

        while($string = fgets($fp)) {
            $length = strlen($string);
            $array[] = $string;
        }
        $epsilon = '';
        $gamma = '';

        $i = 0;
        while($i < $length ){
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
            if($end){
                break;
            }
            var_dump($count);
            if($count > 0){
                $gamma .= '1';
                $epsilon .= '0';
            } else {
                $gamma .= '0';
                $epsilon .= '1';
            };
            $i++;

        }
        echo (bindec($epsilon) * bindec($gamma));
    }

    countConsumption('input.txt');
?>