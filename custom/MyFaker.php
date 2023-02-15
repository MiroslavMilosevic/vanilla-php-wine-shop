<?php

class MyFaker{


    public static function generateRandomSentence(int $words_min, int $words_max, int $letter_min, int $letter_max){

        $arr = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        $sentence = '';
        $rand_num_of_words = rand($words_min,$words_max);
        for($i=0;$i<$rand_num_of_words;$i++){
            $word = '';
            for($j=0;$j<rand($letter_min,$letter_max);$j++){
                $word .= $arr[rand(0, count($arr)-1)];
            }

            $sentence .= $word . ' ';
        }
       return trim($sentence);
    }



}




?>