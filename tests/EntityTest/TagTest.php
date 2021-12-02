<?php 

namespace App\tests\EntityTest;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use PHPUnit\Framework\TestCase;
use App\Entity\Lesson;
use App\Entity\Tag;

class TagTest extends TestCase {
    
    private Tag $tag;
    private Lesson $lesson;
      
    public function setUp() :void {
        $this->tag = new Tag;
        $this->lesson = new Lesson;
    }

    /**
     * @test instance of tag
     */
    public function testInstanceTagClass() {
        $this->assertInstanceOf( Tag::class, $this->tag );
    }

    /**
     * @test method getLessons
     */
    public function testgetLessons() {
        $this->assertInstanceOf( Collection::class, $this->tag->getLessons() );
    }
    /**
     * @test method addLesson
     */    
    public function testAddLesson() {
        $this->assertEquals( 0, count($this->tag->getLessons()) );
        $this->tag->addLesson($this->lesson);
        $this->assertEquals( !0, count($this->tag->getLessons()) );
    }

    /**
     * @test method removeLesson
     */    
    public function testRemoveLesson() {
        $this->tag->addLesson($this->lesson);
        $this->assertEquals( !0, count($this->tag->getLessons()) );
        $this->tag->removeLesson($this->lesson);
        $this->assertEquals( 0, count($this->tag->getLessons()) );
    }

    /**
     * @test method setTitle, getTitle
     */
    public function testGetTitle() {
        $this->tag->setTitle("title test");
        $this->assertTrue(is_string($this->tag->getTitle()));
    }

    
}