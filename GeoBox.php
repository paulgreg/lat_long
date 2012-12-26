<?php
include 'LatLng.php';

class GeoBox {

    private $northWest;

    private $southEast;

    public function GeoBox() {
        $this->northWest = new LatLng();
        $this->southEast = new LatLng();
    }

    public function getNorthWest() {
        return $this->northWest;
    } 

    public function getSouthEast() {
        return $this->southEast;
    } 

    public function __toString() {
        return "GeoBox-" . $this->northWest . "->" . $this->southEast;
    }

}
?>
