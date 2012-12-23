<?php
include 'GeoBox.php';

class GeoBoxTest extends PHPUnit_Framework_TestCase
{
    private $gb;

    public function setUp() {
        $this->gb = new GeoBox();
    }

    public function test_circumference_at_equator()
    {
        $circumference = $this->gb->getCircumference(0.0);
        $this->assertEquals(40074, round($circumference));
    }

    public function test_circumference_at_lat_45()
    {
        $circumference = $this->gb->getCircumference(45);
        $this->assertEquals(28337, round($circumference));
    }

    public function test_circumference_at_lat_66()
    {
        $circumference = $this->gb->getCircumference(66);
        $this->assertEquals(16300, round($circumference));
    }
}
?>
