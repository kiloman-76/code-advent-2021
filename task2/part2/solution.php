<?
function countCoord($file){
    $fp = fopen($file, "r");
    $coords = [
        'horizontal' => 0,
        'depth' => 0,
        'aim' => 0
    ];

    while($string = fgets($fp)){
        $strArr = explode(' ', $string);
        switch ($strArr[0]){
            case 'forward':
                $coords['horizontal'] += (int)$strArr[1];
                $coords['depth'] += (int)$strArr[1] * $coords['aim'];
                break;
            case 'up':
                $coords['aim'] -= (int)$strArr[1];
                if($coords['aim'] < 0){
                    $coords['aim'] = 0;
                };
                break;
            case 'down':
                $coords['aim'] += (int)$strArr[1];
                break;

        }
    }

    $answer = $coords['horizontal'] * $coords['depth'];
    echo($answer);
}

countCoord('input.txt');
?>