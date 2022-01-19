<?php
    /**
     * Bagian 1 : PHP Dasar (2)
     */

    /**
     * Generate Table HTML
     */ 
    function generateTableHtml() {
        $tableContent = '';
        $bg_white = "background-color: #fff;color: #000;";
        $bg_black = "background-color: #000;color: #fff;";
        for ($i=1; $i <=64 ; $i++) {
            $modulus = ($i % 8); // 1,2,3,4,5,6,7,0
            if ( $modulus == 1 )
                $tableContent .='<tr>';

            if ( ($i%3) == 0 ) { // 1,2,0
                $tableContent .= '<td style="'.$bg_white.'">'.$i.'</td>';
            } else {
                $style = ($i%4 == 0) ? $bg_white : $bg_black ;
                $tableContent .= '<td style="'.($style).'">'.$i.'</td>';
            }

            if ( $modulus == 0 )
                $tableContent .= '</tr>';

        }

        return '<table style="text-align: center; border-spacing: 0px">'.$tableContent.'</table>';
    }
    echo generateTableHtml();

    /**
     * fungsi “enkripsi”, yang apabila diberikan input DFHKNQ akan memberikan output EDKGSK
     * D E +1
     * F D -2
     * H K +3
     * K G -4
     * N S +5
     * Q K -6
     * @param $string_input is String
     * @return String
    */

    function enkripsi($string_input)
    {
        $split_string = str_split($string_input);
        $result = '';
        foreach ($split_string as $key => $item) {
            $sub = $key+1;

            // converts the letter into ASCII num representation
            $asci_item = ord($item);

            $asci_item = (($sub%2)==0) ? ($asci_item-$sub) : ($asci_item+$sub) ;

            // the number gets converted back to the letter
            $result .= chr($asci_item);
        }
        return $result;
    }
    echo '<hr>';
    echo 'Fungsi “enkripsi” string "DFHKNQ"  : '.enkripsi('DFHKNQ');