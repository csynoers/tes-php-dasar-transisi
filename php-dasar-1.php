<?php
    /** 
     * Bagian 1 : PHP Dasar 
     */
    
    $nilai = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";
    /**
     * script untuk menentukan (1) nilai rata-rata, (2) 7 nilai tertinggi, (3) 7 nilai terendah dari nilai-nilai di atas.
     * @param $argument1 is String value
     * @param $argument2 is String(average|min|max)
     *  */
    function getNilai($argument1, $argument2){
        $argument1 = explode(' ', $argument1);
        switch ($argument2) {
            case 'average': 
                $result = array_sum($argument1)/count($argument1);
                break;
            case 'max':
                $result = min($argument1);
                break;
            case 'min':
                $result = max($argument1);
                break;
            
            default:
                $result = 'undefined';
                break;
        }
        return $result;
    }
    echo "Nilai: \"{$nilai}\" ";
    echo '<br> Nilai rata-rata: ' .getNilai($nilai, 'average');
    echo '<br> Nilai tertinggi: ' .getNilai($nilai, 'max');
    echo '<br> Nilai terendah: ' .getNilai($nilai, 'min');

    /**
     * menentukan jumlah huruf kecil dalam sebuah string.
     */
    echo '<hr>';
    echo '"Transisi" mengandung ' .preg_match_all("/[a-z]/", 'TranSISI') .' buah huruf kecil.';

    /**
     * membentuk unigram, bigram, trigram dari sebuah string
     * Unigram $count_word = 1
     * Bigram $count_word = 2
     * Tigram $count_word = 3
     *  */
    function getUBT($argument1, $count_word = 1)
	{
		$argument1 = explode(' ', $argument1);
        $array_word = [];
        $array_result = [];
        foreach ($argument1 as $item) {
            $array_word[] = $item;

            if ( count($array_word) == $count_word ) {
                $array_result[] = implode(' ', $array_word);
                // reset array_word
                $array_word = [];
            }
        }
        return implode(', ', $array_result);
	}
    $string_input = "Jakarta adalah ibukota negara Republik Indonesia";
    echo '<hr>';
    echo 'Membentuk unigram, bigram, trigram dari sebuah string "Jakarta adalah ibukota negara Republik Indonesia"';
    echo '<br> Unigram: ' .getUBT($string_input, 1);
    echo '<br> Bigram: ' .getUBT($string_input, 2);
    echo '<br> Trigram: ' .getUBT($string_input, 3);
    echo '</pre>';