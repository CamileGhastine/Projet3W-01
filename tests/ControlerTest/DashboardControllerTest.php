<?php namespace App\tests\ControllerTest;


use PHPUnit\Framework\TestCase;
use App\Controller\Admin\DashboardController;

class DashboardControllerTest extends TestCase {
    
    private DashboardController $dashboard;
      
    public function setUp() :void {
        $this->dashboard = new DashboardController;
    }

    /**
     * @test instance of dashboard
     */
    public function testInstanceDashboardControllerClass() {
        $this->assertInstanceOf( DashboardController::class, $this->dashboard );
    }

    /**
     * @test method configureMenuItems
     */
    public function testconfigureMenuItems() {
        $this->assertTrue( is_iterable($this->dashboard->configureMenuItems()) );
    }
}