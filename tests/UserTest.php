<?php

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use PHPUnit\Framework\TestCase;
use App\Entity\User;

class UserTest extends TestCase {
    
    private User $user;
      
    public function setUp() :void {

        $this->user = new User;
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
     * @test method getPassword
     */
    public function testGetPassword() {
        $this->user->setPassword("testpass");
        $this->assertTrue( is_string( $this->user->getPassword() ));
    }

}