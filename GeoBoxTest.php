<?php
include 'GeoBox.php';

class GeoBoxTest extends PHPUnit_Framework_TestCase
{
    private $gb;

    public function setUp() {
        $this->gb = new GeoBox();
    }

    public function test_circumference_at_equator() {
        $circumference = $this->gb->getCircumference(0.0);
        $this->assertEquals(40074156, round($circumference));
    }

    public function test_circumference_at_lat_45() {
        $circumference = $this->gb->getCircumference(45);
        $this->assertEquals(28336707, round($circumference));
    }

    public function test_circumference_at_lat_66() {
        $circumference = $this->gb->getCircumference(66);
        $this->assertEquals(16299628, round($circumference));
    }

    // Paris "2.353276,48.856078"

    public function test_point_5_km_north() {
        $latitude = $this->gb->getDeltaLatitude(48.856078, 5000);
        $this->assertEquals(48.900995, round($latitude, 6));
    }

    public function test_point_5_km_south() {
        $latitude = $this->gb->getDeltaLatitude(48.856078, -5000);
        $this->assertEquals(48.811161, round($latitude, 6));
    }

    public function test_point_5_km_west() {
        $longitude = $this->gb->getDeltaLongitude(48.856078, 2.353276, 5000);
        $this->assertEquals(2.421543, round($longitude, 6));
    }

    public function test_point_5_km_east() {
        $longitude = $this->gb->getDeltaLongitude(48.856078, 2.353276, -5000);
        $this->assertEquals(2.285009, round($longitude, 6));
    }
}
?>
