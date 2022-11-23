<?php

class RevertString {

    public function revert($text) {

        if (empty($text) || !is_string($text)) {
            return 'error: ожидается строка';
        }

        $textArray = preg_split('/([?,!;.\-\s:])/u', $text, -1, PREG_SPLIT_DELIM_CAPTURE);

        $i = 0;
        $resultArray = [];

        foreach ($textArray as $word) {
            if (!empty($word)) {
                $resultWord = $this->revertWord($word);
                $resultArray[$i] = $resultWord;
                $i++;
            }
        }

        return implode($resultArray);
    }

    public function revertWord($word) {
        $hasUpperCase = preg_match('/[А-Я]/u', $word);
        $resultWord = mb_str_split($word);
        $resultWord = array_reverse($resultWord);
        $resultWord = implode($resultWord);
        $resultWord = ($hasUpperCase) ? $this->ucWord(mb_strtolower($resultWord)) : $resultWord;

        return $resultWord;
    }

    public function ucWord($text) {
        $text = mb_convert_case($text, MB_CASE_TITLE);
        return $text;
    }

}