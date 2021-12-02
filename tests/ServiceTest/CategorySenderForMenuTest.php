<?php namespace App\tests\ServiceTest;

use App\Service\CategorySenderForMenu;
use App\Repository\CategoryRepository;
use PHPUnit\Framework\TestCase;

class CategorySenderForMenuTest extends TestCase {
    
    private CategorySenderForMenu $categorySenderMenu;
    private CategoryRepository $categoryRep;

    public function setUp() :void {
        $this->categoryRep = $this->getMockBuilder(CategoryRepository::class)->disableOriginalConstructor()->getMock();
        $this->categorySenderMenu = new CategorySenderForMenu($this->categoryRep);
    }

    /**
     * @test instance of categorySenderMenu
     */
    public function testInstanceCategorySenderForMenuClass() {
        $this->assertInstanceOf( CategorySenderForMenu::class, $this->categorySenderMenu );
    }

    /**
     * @test method send
     */
    //public function testSend() {
        //$this->assertTrue(is_array($this->categoryRep->send()));
    //}
}