<?php
/**
 * User: delboy1978uk
 * Date: 10/04/2013
 * Time: 23:02
 */

interface Del_Entity_AddressInterface
{
    public function getAdd1();
    public function getAdd2();
    public function getAdd3();
    public function getCity();
    public function getPostcode();
    public function getLat();
    public function getLng();

    /**
     * @param $add1
     * @return Del_Entity_AddressInterface
     */
    public function setAdd1($add1);

    /**
     * @param $add2
     * @return Del_Entity_AddressInterface
     */
    public function setAdd2($add2);

    /**
     * @param $add3
     * @return Del_Entity_AddressInterface
     */
    public function setAdd3($add3);

    /**
     * @param $city
     * @return Del_Entity_AddressInterface
     */
    public function setCity($city);

    /**
     * @param $postcode
     * @return Del_Entity_AddressInterface
     */
    public function setPostcode($postcode);

    /**
     * @param $lat
     * @return Del_Entity_AddressInterface
     */
    public function setLat($lat);

    /**
     * @param $lng
     * @return Del_Entity_AddressInterface
     */
    public function setLng($lng);

    /**
     * @return string
     */
    public function getFullAddress();

    /**
     * @return bool
     */
    public function hasLatLng();

    /**
     * @return array
     */
    public function toArray();

    /**
     * @param array $array
     * @return Del_Entity_AddressInterface
     */
    public function setFromArray(array $array);
}


