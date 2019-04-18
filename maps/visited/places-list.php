<?php 
  include ("config_map.php");
  
  $country_count = 0;
  $city_count = 0;
  
  $rescountry = mysql_query("SELECT * FROM mappoint GROUP BY country", $ym_link);
  
  while ($arraycountry = mysql_fetch_array($rescountry))
  {
    $country_count++;
  }

  $rescity = mysql_query("SELECT * FROM mappoint", $ym_link);
  
  while ($arraycity = mysql_fetch_array($rescity))
  { 
    $city_count++;
  }
    
  echo "<div id=\"visited_total\">", naspunkt($country_count, $city_count), "</div>";

  $rescountry = mysql_query("SELECT * FROM mappoint GROUP BY country ORDER BY country", $ym_link);
  
  echo "<div>";      
  while ($arraycountry = mysql_fetch_array($rescountry))
  {
    $country_count++;
    echo "<div class=\"places_list_country\">".$arraycountry['country'].":</div>";
    
    $country = $arraycountry['country'];
    $rescity = mysql_query("SELECT * FROM mappoint HAVING country='$country' ORDER BY name", $ym_link) or die("Invalid query: " . mysql_error());;
    
    echo "<div class=\"places_list_city\">";
    $for_comma = 0;      
    while ($arraycity = mysql_fetch_array($rescity))
    {
      $city_count++;
      $for_comma++;
      if ($for_comma > 1) { echo ", ";}
      echo $arraycity['name'];
    }
    echo "</div>";

  }

?>
