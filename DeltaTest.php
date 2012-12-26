<?php
include 'Delta.php';

class DeltaTest extends PHPUnit_Framework_TestCase
{
    private $delta;

    public function setUp() {
        $this->delta = new Delta();
    }

    public function test_circumference_at_equator() {
        $circumference = $this->delta->getCircumference(0.0);
        $this->assertEquals(40074156, round($circumference));
    }

    public function test_circumference_at_lat_45() {
        $circumference = $this->delta->getCircumference(45);
        $this->assertEquals(28336707, round($circumference));
    }

    public function test_circumference_at_lat_66() {
        $circumference = $this->delta->getCircumference(66);
        $this->assertEquals(16299628, round($circumference));
    }

    // Paris "2.353276,48.856078"

    public function test_point_5_km_north() {
        $latitude = $this->delta->getDeltaLatitude(48.856078, 5000);
        $this->assertEquals(48.900995, round($latitude, 6));
    }

    public function test_point_5_km_south() {
        $latitude = $this->delta->getDeltaLatitude(48.856078, -5000);
        $this->assertEquals(48.811161, round($latitude, 6));
    }

    public function test_point_5_km_west() {
        $longitude = $this->delta->getDeltaLongitude(48.856078, 2.353276, 5000);
        $this->assertEquals(2.421543, round($longitude, 6));
    }

    public function test_point_5_km_east() {
        $longitude = $this->delta->getDeltaLongitude(48.856078, 2.353276, -5000);
        $this->assertEquals(2.285009, round($longitude, 6));
    }

    public function test_geobox_around_that_point() {
        $geobox = $this->delta->getBoxAround(48.856078, 2.353276, 5000);
        $this->assertEquals(48.900995, round($geobox->getNorthWest()->getLat(), 6));
        $this->assertEquals(2.421543, round($geobox->getNorthWest()->getLng(), 6));
        $this->assertEquals(48.811161, round($geobox->getSouthEast()->getLat(), 6));
        $this->assertEquals(2.285009, round($geobox->getSouthEast()->getLng(), 6));
    }
}
?>
