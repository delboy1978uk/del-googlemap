<?php
class Del_View_Helper_GoogleStreetViewMap
{
    public function googleMap(Del_Entity_AddressInterface $address, $div_id = null, $title = null)
    {
        $gmaps_service = new Del_Service_GoogleMaps();
        $latlng = $gmaps_service->getLatLng($address);

        if(!$latlng)
        {
            return '<div class="hero-unit"><h2> class="depth greybg" title="No Map Available">No Map Available</h2></div>';
        }


        if(!$div_id){$div_id = 'map';}
        if(!$title){$title = 'Google Street View Map';}
        $div = '<div id="'.$div_id.'"></div>';
        $js = "
        <script type=\"text/javascript\" src=\"http://maps.googleapis.com/maps/api/js?sensor=true\"></script>
        <meta name=\"viewport\" content=\"initial-scale=1.0, user-scalable=no\" />
        <script type=\"text/javascript\">
        	$(document).ready(function(){
				var lat = ".$latlng->getLat().";
				var lng = ".$latlng->getLng().";
                initialize(lat,lng);
             
                function initialize(lat,lng)
                {
         				var latlng = new google.maps.LatLng(lat, lng);
                        var mapOptions = {
                                            center: latlng,
                                            zoom: 14,
                                             mapTypeId: google.maps.MapTypeId.ROADMAP
                                          };
                        var svmap = new google.maps.Map(
                        document.getElementById('".$div_id."'), mapOptions);
                        var panoramaOptions = {
                                                position: latlng,
                                                pov:
                                                {
                                                    heading: 34,
                                                    pitch: 0,
                                                    zoom: 1
                                                }
                                              };
                        var panorama = new  google.maps.StreetViewPanorama(document.getElementById('".$div_id."'), panoramaOptions);
                        svmap.setStreetView(panorama);
                }
            });
        </script>
        ";
        return $div.$js;
    }
}
