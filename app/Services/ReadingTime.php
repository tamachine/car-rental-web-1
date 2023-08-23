<?php

namespace App\Services;

class ReadingTime {

    protected $text;

    const WORDS_PER_MINUTE = 250;

    public function __construct($text) {
        $this->text = strip_tags($text);
    }

    public function getTimeInMinutes() {
        return round(str_word_count($this->text) / self::WORDS_PER_MINUTE);
    }
}