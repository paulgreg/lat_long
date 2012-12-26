<?php
include 'GeoBox.php';
include 'LatLng.php';

class Delta {

    const EARTH_RADIUS_EQUITORIAL = 6378137.0; // In meter
    const EARTH_RADIUS_POLAR = 6356752.3;

    public function Delta() {
        $this->EARTH_RADIUS_EQUITORIAL_2 = self::EARTH_RADIUS_EQUITORIAL * self::EARTH_RADIUS_EQUITORIAL;
        $this->EARTH_RADIUS_POLAR_2 = self::EARTH_RADIUS_POLAR * self::EARTH_RADIUS_POLAR;
    } 

    public function getBoxAround($lat, $lng, $m) {
        $northWest = $this->getDistantPoint($lat, $lng, -$m, -$m);
        $southEast = $this->getDistantPoint($lat, $lng, $m, $m);
        return new GeoBox($northWest, $southEast);
    }

    private function getDistantPoint($lat, $lng, $delta_x_meter, $delta_y_meter) {
        $delta_lat_rad = $delta_y_meter / self::EARTH_RADIUS_EQUITORIAL; // in radian
        $tany = tan($lat * M_PI / 180);
        $tany2 = $tany * $tany;
        $delta_lng_rad = ( $delta_x_meter * sqrt( $this->EARTH_RADIUS_EQUITORIAL_2 +  ( $this->EARTH_RADIUS_POLAR_2 * $tany2 ) ) ) / $this->EARTH_RADIUS_EQUITORIAL_2;

        return new LatLng($lat - $delta_lat_rad * 180 / M_PI, $lng - $delta_lng_rad * 180 / M_PI);
    }
}
?>
