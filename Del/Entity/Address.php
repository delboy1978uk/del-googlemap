<?php
/**
 * User: delboy1978uk
 * Date: 10/04/2013
 * Time: 23:02
 */

class Del_Entity_Address implements Del_Entity_AddressInterface
{
    private $add1;

    private $add2;

    private $add3;

    private $city;

    private $postcode;


    private $lat;

    private $lng;


    public function getAdd1()
    {
        return $this->add1;
    }

    public function getAdd2()
    {
        return $this->add2;
    }

    public function getAdd3()
    {
        return $this->add3;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function getLng()
    {
        return $this->lng;
    }

    public function setAdd1($add1)
    {
        $this->add1 = $add1;
        return $this;
    }

    public function setAdd2($add2)
    {
        $this->add2 = $add2;
        return $this;
    }

    public function setAdd3($add3)
    {
        $this->add3 = $add3;
        return $this;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
        return $this;
    }

    public function setLat($lat)
    {
        $this->lat = $lat;
        return $this;
    }

    public function setLng($lng)
    {
        $this->lng = $lng;
        return $this;
    }

    public function getFullAddress()
    {
        $add = $this->getAdd1().'<br />';
        if($this->getAdd2()){ $add .= $this->getAdd2().'<br />'; }
        if($this->getAdd3()){ $add .= $this->getAdd3().'<br />'; }
        if($this->getCity()){ $add .= $this->getCity().' '; }
        if($this->getPostcode()){ $add .= $this->getPostcode().'<br />'; }
        return $add;
    }

    public function toArray()
    {
        return array(
            'add1' => $this->getAdd1(),
            'add2' => $this->getAdd2(),
            'add3' => $this->getAdd3(),
            'city' => $this->getCity(),
            'postcode' => $this->getPostcode(),
            'lat' => $this->getLat(),
            'lng' => $this->getLng(),
        );
    }

    /**
     * @param array $array
     * @return Del_Entity_AddressInterface
     */
    public function setFromArray(array $array)
    {
        if(isset($array['add1'])){$this->setAdd1($array['add1']);}
        if(isset($array['add2'])){$this->setAdd2($array['add3']);}
        if(isset($array['add3'])){$this->setAdd3($array['add3']);}
        if(isset($array['city'])){$this->setCity($array['city']);}
        if(isset($array['postcode'])){$this->setPostcode($array['postcode']);}
        if(isset($array['lat'])){$this->setLat($array['lat']);}
        if(isset($array['lng'])){$this->setLng($array['lng']);}
        return $this;
    }

    /**
     * @return bool
     */
    public function hasLatLng()
    {
        if
        (
            $this->getLat() != '0.0000000000000' && $this->getLng() != '0.0000000000000' &&
            $this->getLat() != '' && $this->getLng() != ''
        )
        {
            return true;
        }
        return false;
    }


}

