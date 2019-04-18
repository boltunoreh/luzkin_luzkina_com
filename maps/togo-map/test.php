<meta charset="utf-8" />
<?php

include ("config_map.php");

$places = mysql_query("SELECT * FROM wp_posts WHERE post_type='places'");

if (mysql_num_rows($places)>0) {
  while ($mar = mysql_fetch_array($places)) {
    
    $places_post_id = $mar['ID'];
    $places_post_url = "http://alazankin.alazankina.com/places/".$mar['post_name'];
    
    $place_x = mysql_query("SELECT * FROM wp_postmeta WHERE post_id='$places_post_id' AND meta_key='latitude'");
    if (mysql_num_rows($place_x)>0) {
      $mar_x = mysql_fetch_array($place_x);
    }
    
    $place_y = mysql_query("SELECT * FROM wp_postmeta WHERE post_id='$places_post_id' AND meta_key='longitude'");
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
    
    $exp_str1 = explode("<br>", $mar['content']);
    $mar['content'] = implode($exp_str1, ", ");
    
                    mb_internal_encoding("UTF-8");
                    $mar['post_content'] = mb_substr($mar['post_content'], 0, 100)."... <a href=\"".$places_post_url."\" target=\"blank\">(more)</a>";
    echo $mar['post_title']."<br>";
    echo $mar_photo['guid']."<br>";
    echo $mar['post_content']."<br>";
    echo $mar_x['meta_value'].' '.$mar_y['meta_value']."<br>";
  
  }
}







?>