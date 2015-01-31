<?php
include('AwesomeProgression.php');

class AwesomeProgressionTest extends PHPUnit_Framework_TestCase
{
    public function testFibonachiFunction()
    {        
        $math = new AwesomeProgression();
        
        $this->assertEquals($math->fibonachi(4), 3);
        $this->assertEquals($math->fibonachi(8), 21);
    }

    public function testCollatzFunction()
    {        
        $math = new AwesomeProgression();
        
        $this->assertEquals($math->collatz(14, 8), 13);
        $this->assertEquals($math->collatz(21, 50), 4);
    }

    public function testCauchyFunction()
    {        
        $math = new AwesomeProgression();

        $cauchy = $math->cauchy(2, 8, true);
        $this->assertTrue($cauchy[0] > $cauchy[8]);
    }

    public function testArtmetic1Function()
    {        
        $math = new AwesomeProgression();

        $this->assertEquals($math->arithmetic1(5), 3263442);
    }

    public function testConwayFunction()
    {        
        $math = new AwesomeProgression();

        $this->assertEquals($math->conway(5), 312211);
    }
}