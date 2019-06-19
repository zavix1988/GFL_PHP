<?php


require 'Calc.php';
require 'config.inc.php';

 
class CalculatorTests extends PHPUnit\Framework\TestCase
{
    private $calc;
 
    protected function setUp(): void
    {
        $this->calc = new Calc();
    }
 
    protected function tearDown(): void
    {
        $this->calculator = NULL;
    }

    public function testSetFirstVar()
    {
        $this->calc->setFirstVar(-5);
        $result = $this->calc->getFirstVar();
        $this->assertEquals(-5, $result);
    }

    public function testSetSecondVar()
    {
        $this->calc->setSecondVar(3);
        $result = $this->calc->getSecondVar();
        $this->assertEquals(3, $result);
    }
 
    public function testAddVars()
    {
        $this->calc->setFirstVar(-5);
        $this->calc->setSecondVar(3);
        $result = $this->calc->addVars();
        $this->assertEquals(-2, $result);
    }

    public function testSubstructVars()
    {
        $this->calc->setFirstVar(-5);
        $this->calc->setSecondVar(3);
        $result = $this->calc->substructVars();
        $this->assertEquals(-8, $result);
    }

    public function testMultiplicateVars()
    {
        $this->calc->setFirstVar(-5);
        $this->calc->setSecondVar(3);
        $result = $this->calc->multiplicateVars();
        $this->assertEquals(-15, $result);
    }

    public function testDivizVars()
    {
        $this->calc->setFirstVar(-15);
        $this->calc->setSecondVar(3);
        $result = $this->calc->DivizVars();
        $this->assertEquals(-5, $result);
    }

    public function testNegateVar()
    {
        $this->calc->setFirstVar(-5);
        $result = $this->calc->negateVar();
        $this->assertEquals(5, $result);
    }

    public function testSqrtVar()
    {
        $this->calc->setFirstVar(121);
        $result = $this->calc->sqrtVar();
        $this->assertEquals(11, $result);
    }

    public function testOneDivizVar()
    {
        $this->calc->setSecondVar(2);
        $result = $this->calc->oneDivizVar();
        $this->assertEquals(0.5, $result);
    }

    public function testClearVars()
    {
        $this->calc->setFirstVar(3);
        $this->calc->setSecondVar(-5);
        $this->calc->clearVars();
        $this->assertEquals(UNSET_VAR, $this->calc->getFirstVar());
        $this->assertEquals(UNSET_VAR, $this->calc->getSecondVar());
    }

    public function testMemoryAdd()
    {
        $this->calc->setFirstVar(3);
        $this->calc->memoryAdd();
        $this->calc->memoryAdd();
        $result = $this->calc->memoryGet();
        $this->assertEquals(6, $result);

    }

    public function testMemorySubstruct()
    {
        $this->calc->setFirstVar(6);
        $this->calc->memoryAdd();
        $this->calc->setFirstVar(3);
        $this->calc->memorySubstruct();
        $result = $this->calc->memoryGet();
        $this->assertEquals(3, $result);

    }

    public function testClearMemory()
    {
        $this->calc->setFirstVar(6);
        $this->calc->memoryAdd();
        $this->calc->setFirstVar(3);
        $this->calc->memorySubstruct();
        $this->calc->clearMemory();
        $result = $this->calc->memoryGet();
        $this->assertEquals(NULL, $result);

    }

}
