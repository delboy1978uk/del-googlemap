<?php
class Del_View_Helper_GoogleMap
{
    public function googleMap(Del_Entity_AddressInterface $address, $div_id = null, $title = null, $draggable = false)
    {
        $gmaps_service = new Del_Service_GoogleMaps();
        $latlng = $gmaps_service->getLatLng($address);

        if(!$latlng)
        {
            return '<div class="hero-unit"><h2> class="depth greybg" title="No Map Available">No Map Available</h2></div>';
        }


        if(!$div_id){$div_id = 'map';}
        if(!$title){$title = 'Google Map';}
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
                        var myOptions = {
                          zoom: 18,
                          center: latlng,
                          mapTypeId: google.maps.MapTypeId.HYBRID
                        };
         
                        var map = new google.maps.Map(document.getElementById('".$div_id."'),
                            myOptions);
                        var image = '/img/pr-marker.png';
                        var marker = new google.maps.Marker({
                            position: latlng,
                            map: map,
                            ";
        if($draggable == true){$js.='draggable: true,
        ';}
        $js .="icon: image,
                            title:'$title'
                        });
                        
                        google.maps.event.addListener(marker, 'dragend', function() {
    					//get new lat lng
    					latlng = marker.getPosition();
    					lat = latlng.lat();
    					lng = latlng.lng();
    					//set form values
    					$('#lat').val(lat);
    					$('#lng').val(lng);
                  		});
              } 
        });
         </script>       
        ";
        return $div.$js;
    }


}
