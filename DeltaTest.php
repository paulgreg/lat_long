<?php
include 'Delta.php';

class DeltaTest extends PHPUnit_Framework_TestCase
{
    private $delta;

    public function setUp() {
        $this->delta = new Delta();
    }
    public function test_geobox_5_km_around_Paris() {
        $geobox = $this->delta->getBoxAround(48.856078, 2.353276, 5000);
        $this->assertEquals(48.900994, round($geobox->getNorthWest()->getLat(), 6));
        $this->assertEquals(2.421412, round($geobox->getNorthWest()->getLng(), 6));
        $this->assertEquals(48.811162, round($geobox->getSouthEast()->getLat(), 6));
        $this->assertEquals(2.28514, round($geobox->getSouthEast()->getLng(), 6));
    }

    public function test_geobox_5_km_around_Greenwich() {
        $geobox = $this->delta->getBoxAround(51.478789, -0.010680, 5000);
        $this->assertEquals(51.523705, round($geobox->getNorthWest()->getLat(), 6));
        $this->assertEquals(0.061291, round($geobox->getNorthWest()->getLng(), 6));
        $this->assertEquals(51.433873, round($geobox->getSouthEast()->getLat(), 6));
        $this->assertEquals(-0.082651, round($geobox->getSouthEast()->getLng(), 6));
    }
}
?>
