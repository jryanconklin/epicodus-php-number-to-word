<?php
    class NumberToWords
    {
        private $low_number_words;
        private $tens_number_words;
        private $hundreds_number_words;
        private $bigger_number_words;

        function __construct() {
            $this->low_number_words = array(
                0 => '',
                1 => 'One',
                2 => 'Two',
                3 => 'Three',
                4 => 'Four',
                5 => 'Five',
                6 => 'Six',
                7 => 'Seven',
                8 => 'Eight',
                9 => 'Nine',
                10 => 'Ten',
                11 => 'Eleven',
                12 => 'Twelve',
                13 => 'Thirteen',
                14 => 'Fourteen',
                15 => 'Fifteen',
                16 => 'Sixteen',
                17 => 'Seventeen',
                18 => 'Eigteen',
                19 => 'Nineteen',
            );
            $this->tens_number_words = array(
                20 => 'Twenty',
                30 => 'Thirty',
                40 => 'Forty',
                50 => 'Fifty',
                60 => 'Sixty',
                70 => 'Seventy',
                80 => 'Eighty',
                90 => 'Ninety'
            );
            $this->hundreds_number_words = array(
                0 => '',
                100 => 'One Hundred',
                200 => 'Two Hundred',
                300 => 'Three Hundred',
                400 => 'Four Hundred',
                500 => 'Five Hundred',
                600 => 'Six Hundred',
                700 => 'Seven Hundred',
                800 => 'Eight Hundred',
                900 => 'Nine Hundred'
            );
            $this->bigger_number_words = array(
                0 => '',
                1 => ' Thousand',
                2 => ' Million',
                3 => ' Billion',
                4 => ' Trillion'
            );
        }

        function convertWholeString($input_number)
        {
            $final_string_array = array();
            $broken_string = $this->breakString($input_number);
            $broken_string = array_reverse($broken_string);
            for ($i = 0; $i < sizeof($broken_string); $i++) {
                $temp_array = array();
                array_push($temp_array, $this->convertToString($broken_string[$i]));
                $text = implode(" ", $temp_array);
                if ($text !== '') {
                    $text .= $this->bigger_number_words[$i];
                }
                array_push($final_string_array, $text);
            }
            for($i = sizeof($final_string_array) - 1; $i>=0; $i--) {
                if ($final_string_array[$i] == '') {
                    unset($final_string_array[$i]);
                }
            }
            $final_string_array = array_reverse($final_string_array);
            return $final_string_array = implode(" ", $final_string_array);

        }

        function convertToString($input_number)
        {
            $word_array = array();
            $ten_space = $input_number % 100;
            $one_hundred_space = $input_number - $ten_space;
            array_push($word_array, $this->hundreds_number_words[$one_hundred_space]);
            if ($ten_space <= 19) {
                array_push($word_array, $this->low_number_words[$ten_space]);
            } else {
                $one_space = $ten_space % 10;
                $ten_space -= $one_space;
                array_push($word_array, $this->tens_number_words[$ten_space]);
                array_push($word_array, $this->low_number_words[$one_space]);
            }

            for($i = sizeof($word_array) - 1; $i>=0; $i--) {
                if ($word_array[$i] == '') {
                    unset($word_array[$i]);
                }
            }
            return implode(" ", $word_array);
        }

        function breakString($input_number)
        {
            $number_string = strrev(strval($input_number));
            $number_array = str_split($number_string, 3);
            $number_array = array_reverse($number_array);
            for ($i = 0; $i < sizeof($number_array); $i++) {
                $number_array[$i] = strrev($number_array[$i]);
            }
            return $number_array;
        }
    }
 ?>
