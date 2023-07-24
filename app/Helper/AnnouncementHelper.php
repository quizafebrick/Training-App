<?php

namespace App\Helper;

class AnnouncementHelper
{
    // * FUNCTION TO EXTRACT THE FIRST THREE SENTENCES OF THE CONTENT * //
    public static function getFirstThreeSentences($content)
    {
        $sentences = preg_split('/(?<!\w\.\w.)(?<![A-Z][a-z]\.)(?<=\.|\?)\s/', $content);
        $firstThreeSentences = array_slice($sentences, 0, 3);
        return implode(' ', $firstThreeSentences);
    }
}
