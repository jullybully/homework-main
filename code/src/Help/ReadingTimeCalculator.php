<?php

namespace App\Help;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class ReadingTimeCalculator extends AbstractExtension
{
    private $averageReadingSpeed;

    public function __construct($averageReadingSpeed = 200)
    {
        $this->averageReadingSpeed = $averageReadingSpeed;
    }

    public function getReadingTime($text): float
    {
        $wordCount = $this->countWords($text);
        $readingTime = $this->calculateReadingTime($wordCount, $this->averageReadingSpeed);
        return $readingTime;
    }
    public function countWords($text): int
    {
        $words = preg_split('/\s+/', $text);
        $wordCount = 0;
        foreach ($words as $word) {
            if (strlen($word) > 3 && ctype_alpha($word)) {
                $wordCount++;
            }
        }
        return $wordCount;
    }

    public function calculateReadingTime($wordCount, $averageReadingSpeed): float
    {
        $readingTime = round(ceil($wordCount / $averageReadingSpeed));
        return $readingTime;
    }

    public function getFilters(): array
    {
        return [
            new TwigFilter('readingTime', [$this, 'getReadingTime']),
        ];
    }
}
