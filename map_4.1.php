<!DOCTYPE html>
<html>
  <head>
    <title>Map 4</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      #map {
        height: 100%;
      }
    </style>

  </head>
  <body>

<?php 
  $options = array(
'accounting', 'airport', 'amusement_park', 'aquarium', 'art_gallery', 'atm', 'bakery', 'bank', 'bar', 'beauty_salon', 'bicycle_store', 'book_store', 'bowling_alley', 'bus_station',
'cafe', 'campground', 'car_dealer', 'car_rental', 'car_repair', 'car_wash', 'casino', 'cemetery', 'church', 'city_hall', 'clothing_store', 'convenience_store', 'courthouse',
'dentist', 'department_store', 'doctor', 'electrician', 'electronics_store', 'embassy', 'establishment', 'finance', 'fire_station', 'florist', 'food', 'funeral_home', 'furniture_store',
'gas_station', 'general_contractor', 'grocery_or_supermarket', 'gym', 'hair_care', 'hardware_store', 'health', 'hindu_temple', 'home_goods_store', 'hospital', 'insurance_agency',
'jewelry_store', 'laundry', 'lawyer', 'library', 'liquor_store', 'local_government_office', 'locksmith', 'lodging', 'meal_delivery', 'meal_takeaway', 'mosque', 'movie_rental',
'movie_theater', 'moving_company', 'museum', 'night_club', 'painter', 'park', 'parking', 'pet_store', 'pharmacy', 'physiotherapist', 'place_of_worship', 'plumber', 'police',
'post_office', 'real_estate_agency', 'restaurant', 'roofing_contractor', 'rv_park', 'school', 'shoe_store', 'shopping_mall', 'spa', 'stadium', 'storage', 'store', 'subway_station',
'synagogue', 'taxi_stand', 'train_station', 'travel_agency', 'university', 'veterinary_care', 'zoo', );
?>
  <div class="col-xs-12">
      <div class="quickseach-contatiner">
          <input type="text" name="discover-maps-search-item" value="" id="discover-maps-search-item" placeholder="Quick Search" onkeypress="return searchKeyPress(event);" >
          <button id="search_btn"><img src="public/img/icon-search.png"></button>    
      </div>
  </div>
  <div class="liketodo-conatainer col-xs-12">
      <label>What would you like to do?</label>
      <select name="liketodo" class="liketodo" id="liketodo"> 
          <?php foreach ($options as  $option) :
          $option_Display = ucwords( preg_replace("/_/", " ",$option) );
            echo '<option value="'.$option.'">'.$option_Display.'</option> ';
          endforeach;#comment ?>                              
      </select>
      <input type="submit" name="submit" id="submit_btn" value="Search">
  </div>
    <div id="map" style="width: 820px; height: 480px;"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA890xJPPqBNULWSmlA1duYt3CTYEzHQ10&signed_in=true&libraries=places&callback=initMap" async defer></script>

    <script src="discovermap.js"></script>


    <script>


    </script>

  </body>
</html>