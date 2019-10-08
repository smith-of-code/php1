<?php
echo '<h3 class="task_title">задание 1</h3>';


        $a = 0;
        while ($a <= 100){
            if ($a % 3 === 0){
                echo "$a </br>";
            }
            $a++;
        }


echo '<h3 class="task_title">задание 2</h3>';


        $b = 0;
        do{
            if (!$b){
                echo "$b - это ноль</br>";
            }else{
                ($b&1 === 1 )? printf("$b - нечетное</br>") : printf("$b - четное</br>");
            }
            $b++;
        }while($b <= 10);


echo '<h3 class="task_title">задание 3</h3>';


        $arrsity =[
            "Московская область" => ["Москва", "Зеленоград", "Клин"],
            "Ленинградская область" => ["Санкт-Петербург","Всеволожск","Павловск","Кронштадт"],
            "Рязанская область" => ["Кадом","Касимов","Кораблино","Лесной","Милославское"]
        ];
        foreach ($arrsity as $region => $cities){
            $result = "$region </br>";
            foreach ($cities as $key => $city){
                if (count($cities) === $key + 1){
                    $result .= "$city </br>";
                }else{
                    $result .= "$city, ";
                }

            }
            echo $result;
        }


echo '<h3 class="task_title">задание 4</h3>';

		function translit($text){
            $alfabet = [
                'а' => 'a',   'б' => 'b',   'в' => 'v',
                'г' => 'g',   'д' => 'd',   'е' => 'e',
                'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
                'и' => 'i',   'й' => 'y',   'к' => 'k',
                'л' => 'l',   'м' => 'm',   'н' => 'n',
                'о' => 'o',   'п' => 'p',   'р' => 'r',
                'с' => 's',   'т' => 't',   'у' => 'u',
                'ф' => 'f',   'х' => 'h',   'ц' => 'c',
                'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
                'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
                'э' => 'e',   'ю' => 'yu',  'я' => 'ya'
            ];
		    $result = '';

		        for ($i=0 ; $i < mb_strlen($text) ; $i++){

                    if (!$alfabet[mb_strtolower(mb_substr($text,$i,1))]){
                        $result .= mb_substr($text,$i,1);
                    }elseif (mb_substr($text,$i,1) === mb_strtoupper(mb_substr($text,$i,1))){
                        $result .= strtoupper($alfabet[mb_substr(mb_strtolower($text),$i,1)]);
                    }else{
                        $result .= $alfabet[mb_substr($text,$i,1)];
                    }
                }
		    return $result;
        }

        echo translit("Привет, мир! Hello, world!");


echo '<h3 class="task_title">задание 5</h3>';


        echo str_replace(" ","_", "Привет мир");


echo '<h3 class="task_title">задание 7</h3>';


         for ($i=0;$i<=9;printf($i++ . "</br>"));


echo '<h3 class="task_title">задание 8</h3>';

     $result2 = "";
        foreach ($arrsity as $region => $cities){
            $result2 = "$region </br>";
            foreach ($cities as $key => $city){
                if (mb_strtoupper(mb_substr($city,0,1)) === 'К'){
                    $result2 .= "$city, ";
                }
                if (count($cities) === $key + 1) {
                    $result2 .= "</br>";
                }
            }
            echo $result2;
        }


echo '<h3 class="task_title">задание 9</h3>';


    function transurl($text){
        return str_replace(" ","_", translit($text));
    }

echo transurl('Привет, мир! Hello, world!Привет, мир! Hello, world! Привет, мир! Hello, world!');