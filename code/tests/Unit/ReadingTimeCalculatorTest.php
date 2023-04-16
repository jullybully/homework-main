<?php

namespace App\Tests\Help;

use App\Help\ReadingTimeCalculator;
use PHPUnit\Framework\TestCase;

class ReadingTimeCalculatorTest extends TestCase
{
    public function testGetReadingTime(): void
    {
        $readingTimeCalculator = new ReadingTimeCalculator();
        $text = 'This is a test text for calculating reading time.';

        // Mocking the countWords() and calculateReadingTime() methods
        // to isolate the unit being tested
        $readingTimeCalculatorMock = $this->getMockBuilder(ReadingTimeCalculator::class)
            ->onlyMethods(['countWords', 'calculateReadingTime'])
            ->setConstructorArgs([200]) // averageReadingSpeed
            ->getMock();

        $readingTimeCalculatorMock->expects($this->once())
            ->method('countWords')
            ->with($text)
            ->willReturn(10); // Mock word count

        $readingTimeCalculatorMock->expects($this->once())
            ->method('calculateReadingTime')
            ->with(10, 200) // word count, averageReadingSpeed
            ->willReturn(1); // Mock reading time

        $result = $readingTimeCalculatorMock->getReadingTime($text);

        $this->assertEquals(1, $result);
    }

    public function testCalculateReadingTime(): void
    {
        $readingTimeCalculator = new ReadingTimeCalculator();
        $wordCount = 300;
        $averageReadingSpeed = 200;

        $result = $readingTimeCalculator->calculateReadingTime($wordCount, $averageReadingSpeed);

        $this->assertEquals(2, $result);
    }

    public function testCountWords(): void
    {
        $readingTimeCalculator = new ReadingTimeCalculator();
        $text = 'This is a test text for counting words.';

        $result = $readingTimeCalculator->countWords($text);

        $this->assertEquals(4, $result);
    }
}
