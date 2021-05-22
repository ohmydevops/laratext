<?php

namespace App\Services;

use thiagoalessio\TesseractOCR\TesseractOCR;
use thiagoalessio\TesseractOCR\TesseractOcrException;

class ImageToText
{
    /**
     * @param string $imageAddress
     * @return string|TesseractOcrException
     */
    public static function getTextFromImage(string $imageAddress): string|TesseractOcrException
    {
        return (new TesseractOCR($imageAddress))->lang('fas', 'eng')->run();
    }
}
