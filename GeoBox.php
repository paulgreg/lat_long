<?php

class GeoBox {

    private $northWest;

    private $southEast;

    public function GeoBox($northWest, $southEast) {
        $this->northWest = $northWest;
        $this->southEast = $southEast;
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
