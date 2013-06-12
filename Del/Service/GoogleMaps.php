

<?php
/**
 * User: delboy1978uk
 * Date: 24/04/2013
 * Time: 03:34
 */

class Del_Service_GoogleMaps implements Del_Service_GoogleMapsInterface
{
    /**
     * @param Del_Entity_AddressInterface $address
     * @param bool $setLatLng will save the LatLng returned to the address
     * @return bool|Del_Entity_LatLng
     */
    public function getLatLng(Del_Entity_AddressInterface $address)
    {
        if($address->hasLatLng())
        {
            $latlng = new Del_Entity_LatLng($address->getLat(),$address->getLng());
            return $latlng;
        }
        $query_string =  $this->formatAddress($address);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/geocode/json?sensor=true&address=' . $query_string);
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $result = curl_exec($ch);
        curl_close($ch);
        $ob = json_decode($result, true);
        if(isset($ob['results'][0]['geometry']['location']['lat']) && $lng = $ob['results'][0]['geometry']['location']['lng'])
        {
            $lat = $ob['results'][0]['geometry']['location']['lat'];
            $lng = $ob['results'][0]['geometry']['location']['lng'];

            $latlng =  new Del_Entity_LatLng($lat,$lng);
            return $latlng;
        }
        return false;
    }

    /**
     * @param Del_Entity_AddressInterface $address
     * @return string
     */
    private function formatAddress(Del_Entity_AddressInterface $address)
    {
        $formatted = $this->toString($address);
        $formatted = $this->removeFlatNo($formatted);
        $formatted = $this->removeAdditionalPlusses($formatted);
        return $formatted;
    }

    /**
     * @param Del_Entity_AddressInterface $address
     * @return string
     */
    private function toString(Del_Entity_AddressInterface $address)
    {
        $string = $address->getAdd1().'+'
            .$address->getAdd2().'+'
            .$address->getAdd3().'+'
            .$address->getCity().'+'
            .$address->getPostcode();
        return $string;
    }

    /**
     * @param string $address
     * @return string
     */
    private function removeFlatNo($address)
    {
        //get rid of slashes
        $address = str_replace('/','',$address);

        //get rid of everything before the first comma
        $address = preg_replace('/^[^,]*,\s*/', '', $address);

        return $address;
    }

    /**
     * @param string $address
     * @return string
     */
    private function removeAdditionalPlusses($address)
    {
        $address = str_replace('++++','+',$address);
        $address = str_replace('+++','+',$address);
        $address = str_replace('++','+',$address);
        $address = str_replace(' ','+',$address);
        return $address;
    }

}

