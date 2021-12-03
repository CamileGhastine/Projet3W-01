<?php 

namespace App\tests\SecurityTest;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use App\Security\AppCustomAuthenticator;
use PHPUnit\Framework\TestCase;


class AppCustomAuthTest extends TestCase {
    
    protected AppCustomAuthenticator $auth;
    private UrlGeneratorInterface $urlGen;
      
    public function setUp() :void {
        $this->urlGen = $this->getMockBuilder(UrlGeneratorInterface::class)->getMock();
        $this->auth = new AppCustomAuthenticator($this->urlGen);
    }

    /**
     * @test instance of auth
     */
    public function testInstanceAppCustomAuthenticatorClass() {
        $this->assertInstanceOf( AppCustomAuthenticator::class, $this->auth );
    }

}
