<?php

use PHPUnit\Framework\TestCase;
use App\Entity\Lesson;

class LessonTest extends TestCase {
    
    private Lesson $lesson;
      
    public function setUp() :void {
        $this->lesson = new Lesson;
    }

    /**
     * @test instance of lesson
     */
    public function testInstanceLessonClass() {
        $this->assertInstanceOf( Lesson::class, $this->lesson );
    }

    /**
     * @test method getPublishedAt
     */
    public function testGetPublishedAt() {
        $this->lesson->setPublishedAt(new DateTime('2019-01-01 00:00:00'));
        $this->assertEquals(new DateTime('2019-01-01 00:00:00'), $this->lesson->getPublishedAt());
    }

    /**
     * @test method getGetContent
     */
    public function testGetContent() {
        $this->lesson->setContent("test content");
        $this->assertTrue(is_string($this->lesson->getContent()));
    }

    /**
     * @test method getSummary
     */
    public function testGetSummary() {
        $this->lesson->setSummary("test summary");
        $this->assertTrue(is_string($this->lesson->getSummary()));
    }

    /**
     * @test method getStatus
     */
    public function testGetStatus() {
        $this->lesson->setStatus(3);
        $this->assertTrue(is_int($this->lesson->getStatus()));
    }
    
    /**
     * @test method getTitle
     */
    public function testGetTitle() {
        $this->lesson->setTitle("title test");
        $this->assertTrue(is_string($this->lesson->getTitle()));
    }

    /**
     * @test method getCreatedAt
     */
    public function testGetCreatedAt() {
        $this->lesson->setCreatedAt(new DateTime('2019-01-01 00:00:00'));
        $this->assertEquals(new DateTime('2019-01-01 00:00:00'), $this->lesson->getCreatedAt());
    }
    
    /**
     * @test method getAverageNote
     */
    public function testGetAverageNote() {
        $this->lesson->setAverageNote(10.2);
        $this->assertTrue(is_float($this->lesson->getAverageNote()));
    }

    /**
     * @test method getNumberOfNote
     */
    public function testGetNumberOfNote() {
        $this->lesson->setNumberOfNote(10);
        $this->assertTrue(is_int($this->lesson->getNumberOfNote()));
    }

}