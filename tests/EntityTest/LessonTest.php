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
     * @test method setPublishedAt, getPublishedAt
     */
    public function testSetAndGetPublishedAt() {
        $this->lesson->setPublishedAt(new DateTime('2019-01-01 00:00:00'));
        $this->assertEquals(new DateTime('2019-01-01 00:00:00'), $this->lesson->getPublishedAt());
    }

    /**
     * @test method setContent, getGetContent
     */
    public function testSetAndGetContent() {
        $this->lesson->setContent("test content");
        $this->assertTrue(is_string($this->lesson->getContent()));
    }

    /**
     * @test method setSummary, getSummary
     */
    public function testSetAndGetSummary() {
        $this->lesson->setSummary("test summary");
        $this->assertTrue(is_string($this->lesson->getSummary()));
    }

    /**
     * @test method setStatus, getStatus
     */
    public function testSetAndGetStatus() {
        $this->lesson->setStatus(3);
        $this->assertTrue(is_int($this->lesson->getStatus()));
    }
    
    /**
     * @test method setTitle, getTitle
     */
    public function testSetAndGetTitle() {
        $this->lesson->setTitle("title test");
        $this->assertTrue(is_string($this->lesson->getTitle()));
    }

    /**
     * @test method setCreatedAt, getCreatedAt
     */
    public function testSetAndGetCreatedAt() {
        $this->lesson->setCreatedAt(new DateTime('2019-01-01 00:00:00'));
        $this->assertEquals(new DateTime('2019-01-01 00:00:00'), $this->lesson->getCreatedAt());
    }
    
    /**
     * @test method setAZverageNote, getAverageNote
     */
    public function testSetAndGetAverageNote() {
        $this->lesson->setAverageNote(10.2);
        $this->assertTrue(is_float($this->lesson->getAverageNote()));
    }

    /**
     * @test method setNumberOfNote, getNumberOfNote
     */
    public function testSetAndGetNumberOfNote() {
        $this->lesson->setNumberOfNote(10);
        $this->assertTrue(is_int($this->lesson->getNumberOfNote()));
    }

}