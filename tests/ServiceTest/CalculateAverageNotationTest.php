<?php 

use App\Service\CalculateAverageNotation;
use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;
use App\Entity\Lesson;

class CalculateAverageNotationTest extends TestCase {
    
    private CalculateAverageNotation $calcAvrg;
    private EntityManagerInterface $manager;

    public function setUp() :void {
        $this->manager = $this->getMockBuilder(EntityManagerInterface::class)->getMock();
        $this->calcAvrg = new CalculateAverageNotation($this->manager);
    }

    /**
     * @test instance of calcAvrg
     */
    public function testInstanceCalculateAverageClass() {
        $this->assertInstanceOf( CalculateAverageNotation::class, $this->calcAvrg );
    }

    /**
     * @test method calcul average
     */
    public function testCalculAvergage() {

        $lesson = new Lesson;
        $note = 4;
        $lesson->setNumberOfNote(9);
        $lesson->setAverageNote(5.0);
        $this->assertEquals(5.0, $lesson->getAverageNote());
        $this->calcAvrg->calcul($lesson, $note);
        $this->assertEquals(4.9, $lesson->getAverageNote());
    }

    /**
     * @test method calcul call method flush
     */
    public function testCalculMethodFlushIsCalled() {

        $lesson = new Lesson;
        $note = 4;
        $lesson->setNumberOfNote(9);
        $lesson->setAverageNote(5.0);

        $this->calcAvrg->calcul($lesson, $note);
   
        // TODO
        //$mock = $this->getMockBuilder(CalculateAverageNotation::class)->disableOriginalConstructor()->setMethods(['calcul'])->getMock();
        //$mock->calcul($lesson, $note);
        //$this->calcAvrg->expects($this->once())->method('calcul');
             
    }
}