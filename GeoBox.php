<?php

const EARTH_RADIUS_AT_EQUATOR = 6378000; // In meter

class GeoBox {

    function GeoBox() {
        $this->CIRCUMFERENCE_AT_EQUATOR = $this->getCircumference(0);
    } 

    public function getCircumference($latitude) {
        return 2 * M_PI * cos(deg2rad($latitude)) * EARTH_RADIUS_AT_EQUATOR;
    }
    public function getDeltaLatitude($latitude, $m) {
        $delta = ($m / $this->CIRCUMFERENCE_AT_EQUATOR * 360);
        return $latitude + $delta;
    }

    public function getDeltaLongitude($latitude, $longitude, $m) {
        $circumference = $this->getCircumference($latitude);
        $delta = ($m / $circumference * 360);
        return $longitude + $delta;
    }
}
?>
