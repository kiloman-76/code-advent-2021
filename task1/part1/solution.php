<?
    function countDepth($file){
        $fp = fopen($file, "r");
        $depth = 0;
        $count = 0;
        while($string = fgets($fp)){
            if(!$depth){
                $depth = (int)$string;
            }
            if($depth < (int)$string){
                $count++;
            }
            $depth = (int)$string;
        }
        echo($count);
    }

    countDepth('input.txt');
?>