<?php
include 'GeoBox.php';

class Delta {

    const EARTH_RADIUS_AT_EQUATOR = 6378000; // In meter

    public function Delta() {
        $this->CIRCUMFERENCE_AT_EQUATOR = $this->getCircumference(0);
    } 

    public function getCircumference($latitude) {
        return 2 * M_PI * cos(deg2rad($latitude)) * self::EARTH_RADIUS_AT_EQUATOR;
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

    public function getBoxAround($latitude, $longitude, $m) {
        $geobox = new GeoBox();
        $geobox->getNorthWest()->setLat($this->getDeltaLatitude($latitude, $m));
        $geobox->getNorthWest()->setLng($this->getDeltaLongitude($latitude, $longitude, $m));
        $geobox->getSouthEast()->setLat($this->getDeltaLatitude($latitude, -$m));
        $geobox->getSouthEast()->setLng($this->getDeltaLongitude($latitude, $longitude, -$m));
        return $geobox;
    }
}
?>
