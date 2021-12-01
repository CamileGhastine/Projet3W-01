<?php

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

    
}