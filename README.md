del-googlemap
=============

Generate Google Maps easily in PHP

Usage
=====

Populate an address object:

$add = new Del_Entity_Address();
$add->setPostcode($obj->postcode)
    ->setCity($obj->county)
    ->setAdd3($obj->town)
    ->setAdd2($obj->district)
    ->setAdd1($obj->add1);

$gmap = new Del_View_Helper_GoogleStreetViewMap();

echo $gmap->googleMap($add);

