<?php 

header("Content-type: text/xml");
include ("config_map.php");

echo '<?xml version="1.0" encoding="utf-8"?>
<ymaps xmlns="http://maps.yandex.ru/ymaps/1.x" xmlns:gml="http://www.opengis.net/gml" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://maps.yandex.ru/schemas/ymaps/1.x/ymaps.xsd">
    <Representation xmlns="http://maps.yandex.ru/representation/1.x"> 
        <Style gml:id="pointmaps-architecture">
            <iconStyle>
                <href><?php echo get_home_url(); ?>/maps/togo-map/images/flag-architecture.png</href> <!-- icons from http://mapicons.nicolasmollet.com/ -->
                <size x="32" y="37"/>
                <offset x="-16" y="-35"/>
            </iconStyle>
            
            <balloonContentStyle>
                <template>#balloonTemplate</template>
            </balloonContentStyle>
        </Style>

        <Style gml:id="pointmaps-prison">
            <iconStyle>
                <href><?php echo get_home_url(); ?>/maps/togo-map/images/flag-prison.png</href> <!-- icons from http://mapicons.nicolasmollet.com/ -->
                <size x="32" y="37"/>
                <offset x="-16" y="-35"/>
            </iconStyle>
            
            <balloonContentStyle>
                <template>#balloonTemplate</template>
            </balloonContentStyle>
        </Style>

        <Style gml:id="pointmaps-bunker">
            <iconStyle>
                <href><?php echo get_home_url(); ?>/maps/togo-map/images/flag-bunker.png</href> <!-- icons from http://mapicons.nicolasmollet.com/ -->
                <size x="32" y="37"/>
                <offset x="-16" y="-35"/>
            </iconStyle>
            
            <balloonContentStyle>
                <template>#balloonTemplate</template>
            </balloonContentStyle>
        </Style>

        <Style gml:id="pointmaps-hotel">
            <iconStyle>
                <href><?php echo get_home_url(); ?>/maps/togo-map/images/flag-hotel.png</href> <!-- icons from http://mapicons.nicolasmollet.com/ -->
                <size x="32" y="37"/>
                <offset x="-16" y="-35"/>
            </iconStyle>
            
            <balloonContentStyle>
                <template>#balloonTemplate</template>
            </balloonContentStyle>
        </Style>

        <Template gml:id="balloonTemplate">
            <text><![CDATA[
                    <div style="font-size:12px;maxwidth:250;">
                        <div style="color:#0077ff;font-weight:bold;float:left;">$[name]</div><br><div style="color:#3b96ff;">$[metaDataProperty.AnyMetaData.where]</div>
                        <img src="http:$[metaDataProperty.AnyMetaData.img]" alt="" width="100">
                        <div>$[metaDataProperty.AnyMetaData.adress]</div>
                        <a href="http://$[metaDataProperty.AnyMetaData.more]" target="_blank">(more)</a>                        
                    </div>]]></text>
        </Template>
    </Representation>


    <!-- common GeoObjectCollection -->
    <GeoObjectCollection>
        <gml:featureMembers>';

          $places = mysql_query("SELECT * FROM wp_posts WHERE post_type='places'");
          
          if (mysql_num_rows($places)>0) {
            while ($mar = mysql_fetch_array($places)) {
              
              $places_post_id = $mar['ID'];
              $places_post_url_without_http = "alazankin.alazankina.com/places/".$mar['post_name'];
                              
              $place_x = mysql_query("SELECT * FROM wp_postmeta WHERE post_id='$places_post_id' AND meta_key='longitude'");
  
              $place_icon = mysql_query("SELECT * FROM wp_postmeta WHERE post_id='$places_post_id' AND meta_key='togo_icon'");
              if (mysql_num_rows($place_icon)>0) {
                $mar_icon = mysql_fetch_array($place_icon);
              }
                                      
        echo '<!-- each GeoObjectCollection -->
              <GeoObjectCollection>
                <gml:name>Togo на карте</gml:name>
                <style>#pointmaps-'.$mar_icon['meta_value'].'</style>
                <gml:featureMembers>';                    
                  
                  if (mysql_num_rows($place_x)>0) {
                  
                    $mar_x = mysql_fetch_array($place_x);
                  
                    $place_y = mysql_query("SELECT * FROM wp_postmeta WHERE post_id='$places_post_id' AND meta_key='latitude'");
                    if (mysql_num_rows($place_y)>0) {
                      $mar_y = mysql_fetch_array($place_y);
                    }
                    
                    $place_photo_id = mysql_query("SELECT * FROM wp_postmeta WHERE post_id='$places_post_id' AND meta_key='togo_photo'");
                    if (mysql_num_rows($place_photo_id)>0) {
                      $mar_photo_id = mysql_fetch_array($place_photo_id);
                      $place_photo_id = $mar_photo_id['meta_value'];
                      $place_photo_url = mysql_query("SELECT * FROM wp_posts WHERE ID='$place_photo_id'");
                      $mar_photo = mysql_fetch_array($place_photo_url);
                    }
                    
                    $place_location = mysql_query("SELECT * FROM wp_postmeta WHERE post_id='$places_post_id' AND meta_key='location'");
                    if (mysql_num_rows($place_location)>0) {
                      $mar_location = mysql_fetch_array($place_location);
                    }
                    
                    $exp_str1 = explode("<br>", $mar['post_content']);
                    $mar['post_content'] = implode($exp_str1, ", ");
                    mb_internal_encoding("UTF-8");
                    $mar['post_content'] = mb_substr($mar['post_content'], 0, 100)."...";
                    
                    $mar_photo['guid'] = substr($mar_photo['guid'], 5);
                     
                    echo '<GeoObject>';
                    echo '<gml:name>', $mar['post_title'], '</gml:name>';
                    echo '<gml:metaDataProperty>';
                    echo '<AnyMetaData>';
                    echo '<where>', $mar_location['meta_value'], '</where>';
                    echo '<img>', $mar_photo['guid'], '</img>';
                    echo '<adress>', $mar['post_content'], '</adress>';
                    echo '<more>',  $places_post_url_without_http, '</more>';
                    echo '</AnyMetaData>';
                    echo '</gml:metaDataProperty>';
                    echo '<gml:Point>';
                    echo '<gml:pos>', $mar_x['meta_value'], ' ', $mar_y['meta_value'], '</gml:pos>';
                    echo '</gml:Point>'; 
                    echo '</GeoObject>';
                    
                    echo "\n";
                  }
                
          echo '</gml:featureMembers>
              </GeoObjectCollection>
              <!-- each GeoObjectCollection ends -->';
                
            }
          }

  echo'</gml:featureMembers>
    </GeoObjectCollection>
    <!-- common GeoObjectCollection ends -->
    
</ymaps>';

?>