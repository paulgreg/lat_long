<?php

class LatLng {

    private $lat;

    private $lng;

    public function LatLng($lat, $lng) {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public function getLng() {
        return $this->lng;
    } 

    public function setLng($lng) {
        $this->lng = $lng;
    }

    public function getLat() {
        return $this->lat;
    } 

    public function setLat($lat) {
        $this->lat = $lat;
    }

    public function __toString() {
        return "LatLng-" . $this->lat . "," . $this->lng;
    }
}
?>
