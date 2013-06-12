

<?php
/**
 * User: delboy1978uk
 * Date: 03/05/2013
 * Time: 20:06
 */

class Del_Entity_LatLng implements Del_Entity_LatLngInterface
{
    protected $_lat;
    protected $_lng;

    /**
     * @param float $lat
     * @param float $lng
     */
    public function __construct($lat, $lng)
    {
        $this->setLat($lat);
        $this->setLng($lng);
    }

    /**
     * @return float
     */
    public function getLat()
    {
        return $this->_lat;
    }

    /**
     * @return float
     */
    public function getLng()
    {
        return $this->_lng;
    }

    /**
     * @param float $lat
     * @return Del_Entity_LatLngInterface
     */
    public function setLat($lat)
    {
        $this->_lat = $lat;
        return $this;
    }

    /**
     * @param float $lng
     * @return Del_Entity_LatLngInterface
     */
    public function setLng($lng)
    {
        $this->_lng = $lng;
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return array(
            'lat' => $this->getLat(),
            'lng' => $this->getLng()
        );
    }

}


