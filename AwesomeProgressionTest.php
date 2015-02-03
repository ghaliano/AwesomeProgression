<?php
include('AwesomeProgression.php');

class AwesomeProgressionTest extends PHPUnit_Framework_TestCase
{
    public function testfibonnaciFunction()
    {        
        $math = new AwesomeProgression();
        
        $this->assertEquals($math->fibonnaci(4), 3);
        $this->assertEquals($math->fibonnaci(8), 21);
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

    public function testArtmeticFunction()
    {        
        $math = new AwesomeProgression();

        $this->assertEquals($math->arithmetic(10, 1, 1), 11);
        $this->assertEquals($math->arithmetic(10, 1, 4), 41);
    }

    public function testGeometricFunction()
    {        
        $math = new AwesomeProgression();

        $this->assertEquals($math->geometric(10, 1, 3), 59049);
    }

    public function testConwayFunction()
    {        
        $math = new AwesomeProgression();

        $this->assertEquals($math->conway(5), 312211);
    }

    public function testProgressionFunction()
    {        
        $math = new AwesomeProgression();

        $this->assertEquals($math->progression("%s * (%s + 1)", 5), 3263442);
    }
}