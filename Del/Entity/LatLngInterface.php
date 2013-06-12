<?php
/**
 * User: delboy1978uk
 * Date: 03/05/2013
 * Time: 20:06
 */

interface Del_Entity_LatLngInterface
{
    /**
     * @return float
     */
    public function getLat();

    /**
     * @return float
     */
    public function getLng();

    /**
     * @param float $lat
     * @return Del_Entity_LatLngInterface
     */
    public function setLat($lat);

    /**
     * @param float $lng
     * @return Del_Entity_LatLngInterface
     */
    public function setLng($lng);

    /**
     * @return array
     */
    public function toArray();
}


