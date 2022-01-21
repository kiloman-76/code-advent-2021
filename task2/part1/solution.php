<?
    function countCoord($file){
        $fp = fopen($file, "r");
        $coords = [
            'horizontal' => 0,
            'depth' => 0
        ];

        while($string = fgets($fp)){
            $strArr = explode(' ', $string);
            switch ($strArr[0]){
                case 'forward':
                    $coords['horizontal'] += (int)$strArr[1];
                    break;
                case 'up':
                    $coords['depth'] -= (int)$strArr[1];
                    if($coords['depth'] < 0){
                        $coords['depth'] = 0;
                    };
                    break;
                case 'down':
                    $coords['depth'] += (int)$strArr[1];
                    break;

            }
        }
        $answer = $coords['horizontal'] * $coords['depth'];
        echo($answer);
    }

    countCoord('input.txt');
?>