<?php

use PHPUnit\Framework\TestCase;
use App\Entity\Category;
use App\Entity\Lesson;
use App\Entity\User;
use App\Entity\Tag;

class LessonTest extends TestCase {
    
    private Lesson $lesson;
    private Tag $tag;
      
    public function setUp() :void {
        $this->lesson = new Lesson;
        $this->tag = new Tag;
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

    /**
     * @test method setUser, getUser
     */
    public function testSetAndGetUser() {
        $this->lesson->setUser(new User);
        $this->assertInstanceOf(User::class, $this->lesson->getUser());
    }

    /**
     * @test method setCategory, getCategory
     */
    public function testSetAndGetCategory() {
        $this->lesson->setCategory(new Category);
        $this->assertInstanceOf( Category::class, $this->lesson->getCategory() );
    }

    /**
     * @test method getTags
     */
    public function testGetTags() {
        $this->assertEquals( 0, count($this->lesson->getTags()) );
        $this->lesson->addTag($this->tag);
        $this->assertInstanceOf(Tag::class, $this->lesson->getTags()[0]);
        $this->assertEquals( !0, count($this->lesson->getTags()) );
    }

    /**
     * @test method removeTag
     */
    public function testRemoveTag() {
        $this->lesson->addTag($this->tag);
        $this->assertEquals( !0, count($this->lesson->getTags()) );
        $this->lesson->removeTag($this->tag);
        $this->assertEquals( 0, count($this->lesson->getTags()) );
    }

}

