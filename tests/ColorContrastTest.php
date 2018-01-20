<?php

use PHPUnit\Framework\TestCase;

final class ColorContrastTest extends TestCase
{

    public function testThrowsErrorOnInvalidColorFormat()
    {
        try{
            calculateLuminosity('#foobaaaar');
            $this->fail('Did not throw exception.');
        }catch (InvalidArgumentException $e) {}

        try{
            calculateLuminosity('#ffff');
            $this->fail('Did not throw exception.');
        }catch (InvalidArgumentException $e) {}

        try{
            calculateLuminosity('#00ffss');
            $this->fail('Did not throw exception.');
        }catch (InvalidArgumentException $e) {}

        $this->assertTrue(true);
    }

    public function testCalculatesCorrectLuminosity()
    {
        $this->assertEquals(calculateLuminosity('#ffffff'), 1);
        $this->assertEquals(calculateLuminosity('#000000'), 0);

        $this->assertEquals(calculateLuminosity('#FFFF00'), 0.93, '', 0.01);
        $this->assertEquals(calculateLuminosity('#00FFFF'), 0.79, '', 0.01);

        $this->assertEquals(calculateLuminosity('#5fe321'), 0.57, '', 0.01);
        $this->assertEquals(calculateLuminosity('#1105a3'), 0.03, '', 0.01);
    }

    public function testCalculatesCorrectContrast()
    {
        $this->assertEquals(calculateLuminosityRatio('#5fe321', '#1105a3'), 7.94, '', 0.01);
        $this->assertEquals(calculateLuminosityRatio('#5fe321', '#5fe321'), 1.00, '', 0.01);
        $this->assertEquals(calculateLuminosityRatio('#ffffff', '#000000'), 21.0, '', 0.01);
        $this->assertEquals(calculateLuminosityRatio('#000000', '#ffffff'), 21.0, '', 0.01);
    }

    public function testCalcualtesCorrectConformance()
    {
        $results = evaluateColorContrast('#f135a3', '#2f2301');

        $this->assertEquals($results["levelAANormal"],      "fail");
        $this->assertEquals($results["levelAALarge"],       "pass");
        $this->assertEquals($results["levelAAMediumBold"],  "pass");
        $this->assertEquals($results["levelAAANormal"],     "fail");
        $this->assertEquals($results["levelAAALarge"],      "fail");
        $this->assertEquals($results["levelAAAMediumBold"], "fail");
    }

}
