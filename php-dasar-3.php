<?php
    /**
     * Bagian 1 : PHP Dasar (3)
     */

    $arr = [
        ['f', 'g', 'h', 'i'],
        ['j', 'k', 'p', 'q'],
        ['r', 's', 't', 'u']
    ];

    /** 
     * Buatlah sebuah fungsi dalam PHP untuk melakukan pencarian kata dalam array di atas.
     * (perhatikan contoh di bawah ini)
     * cari($arr, 'fghi'); // true      ($arr[0][0]->$arr[0][1]->$arr[0][2]->$arr[0][3])
     * cari($arr, 'fghp'); // true      ($arr[0][0]->$arr[0][1]->$arr[0][2]->$arr[1][2])
     * cari($arr, 'fjrstp'); // true    ($arr[0][0]->$arr[1][0]->$arr[2][0]->$arr[2][1]->$arr[2][2]->$arr[1][2])
     * 
     * cari($arr, 'fst'); // false      ($arr[0][0]->$arr[2][1]) stop search return false
     * cari($arr, 'pqr'); // false 
     * cari($arr, 'fghh'); // false 
     * cari($arr, 'fghq'); // false 
     * @param $haystack
     * @param $needle
     * @return Boolean
     */

    function cari($haystack, $needle){
        $final_arr = [];
        foreach($haystack as $keyArr => $valArr){
            foreach ($valArr as $keySub => $valSub) {
                $final_arr[$valSub] = [$keyArr,$keySub];
            }
        }

        $exist_array_key = [];
        $split_word = str_split($needle);
        foreach ($split_word as $split) {
            $arrVal = $final_arr[$split] ?? false;
            if ( ! $arrVal ) { // letter not found in $final_arr
                return false; 
            } else { // letter found in $final_arr
                if ( count($exist_array_key) > 0 ) { // check letter state
                    $end_exist = end($exist_array_key);
                    if ( in_array($end_exist[0], $arrVal) || in_array($end_exist[1], $arrVal) ) { // check state(previous&current)
                        if ( implode('-', $end_exist) == implode('-', $arrVal) ) { // if same state
                            return false;
                        } 
                        $exist_array_key[] = $arrVal;
                    } else {
                        return false;
                    }
                } else {
                    $exist_array_key[] = $arrVal;
                }
            }
        }

        return true;
    }

    var_dump(cari($arr,'fghi'));
    var_dump(cari($arr,'fghp'));
    var_dump(cari($arr,'fjrstp'));
    var_dump(cari($arr,'fst'));
    var_dump(cari($arr,'pqr'));
    var_dump(cari($arr,'ffghh'));
    var_dump(cari($arr,'fghq'));

