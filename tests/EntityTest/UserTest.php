<?php 


namespace App\tests\EntityTest;

use PHPUnit\Framework\TestCase;
use App\Entity\User;
use App\Entity\Lesson;

class UserTest extends TestCase {
    
    private User $user;
    private Lesson $lesson;
      
    public function setUp() :void {
        $this->user = new User;
        $this->lesson = new Lesson;
    }

    /**
     * @test instance of user
     */
    public function testInstanceUserClass() {
        $this->assertInstanceOf( User::class, $this->user );
    }

    /**
     * @test method getUserIdentifier
     */
    public function testGetUserIdentifier() {
        $this->assertTrue( is_string( $this->user->getUserIdentifier() ));
    }

    /**
     * @test method getUserName
     */
    public function testGetUserName() {
        $this->assertTrue( is_string( $this->user->getUserName() ));
    }

    /**
     * @test method getRoles
     */
    public function testGetRoles() {
        $this->assertTrue( is_array( $this->user->getRoles() ));
        $this->assertEquals( !0, count($this->user->getRoles()) );
        $this->assertEquals( !0, strlen($this->user->getRoles()[0]) );
        $this->assertTrue( is_string( $this->user->getRoles()[0] ));
    }

    /**
     * @test method setPassword, getPassword
     */
    public function testSetAndGetPassword() {
        $this->user->setPassword("testpass");
        $this->assertTrue( is_string( $this->user->getPassword() ));
    }

    /**
     * @test method addLesson
     */    
    public function testAddLesson() {
        $this->assertEquals( 0, count($this->user->getLessons()) );
        $this->user->addLesson($this->lesson);
        $this->assertEquals( !0, count($this->user->getLessons()) );
    }

    /**
     * @test method removeLesson
     */    
    public function testRemoveLesson() {
        $this->user->addLesson($this->lesson);
        $this->assertEquals( !0, count($this->user->getLessons()) );
        $this->user->removeLesson($this->lesson);
        $this->assertEquals( 0, count($this->user->getLessons()) );
    }

    /**
     * @test method setEmail, getEmail
     */
    public function testSetAndGetEmail() {
        $this->user->setEmail("testemail@test.fr");
        $this->assertTrue( is_string( $this->user->getEmail() ));
    }


}