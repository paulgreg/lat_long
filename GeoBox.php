<?php

const EARTH_RADIUS_AT_EQUATOR = 6378;

class GeoBox {

    public function getCircumference($latitude) {
        return 2 * M_PI * cos(deg2rad($latitude)) * EARTH_RADIUS_AT_EQUATOR;
    }

}
?>
