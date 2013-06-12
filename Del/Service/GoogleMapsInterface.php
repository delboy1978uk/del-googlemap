<?php
/**
 * User: delboy1978uk
 * Date: 24/04/2013
 * Time: 03:34
 */

interface Del_Service_GoogleMapsInterface
{
    public function getLatLng(Del_Entity_AddressInterface $address);
}