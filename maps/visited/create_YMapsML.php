<?php 

header("Content-type: text/xml");
include ("config_map.php");

echo '<?xml version="1.0" encoding="utf-8"?>
<ymaps xmlns="http://maps.yandex.ru/ymaps/1.x" xmlns:gml="http://www.opengis.net/gml" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://maps.yandex.ru/schemas/ymaps/1.x/ymaps.xsd">
    <Representation xmlns="http://maps.yandex.ru/representation/1.x"> 
        <Style gml:id="pointmaps-p">
            <iconStyle>
                <href><?php echo get_home_url(); ?>/maps/visited/images/flag-p.png</href>
                <size x="32" y="37"/>
                <offset x="-16" y="-35"/>
            </iconStyle>
            
            <balloonContentStyle>
                <template>#balloonTemplate</template>
            </balloonContentStyle>
        </Style>
        <Style gml:id="pointmaps-l">
            <iconStyle>
                <href><?php echo get_home_url(); ?>/maps/visited/images/flag-l.png</href>
                <size x="32" y="37"/>
                <offset x="-16" y="-35"/>
            </iconStyle>
            
            <balloonContentStyle>
                <template>#balloonTemplate</template>
            </balloonContentStyle>
        </Style>
        <Style gml:id="pointmaps-ll">
            <iconStyle>
                <href><?php echo get_home_url(); ?>/maps/visited/images/flag-ll.png</href>
                <size x="32" y="37"/>
                <offset x="-16" y="-35"/>
            </iconStyle>
            
            <balloonContentStyle>
                <template>#balloonTemplate</template>
            </balloonContentStyle>
        </Style>
        <Style gml:id="pointmaps-lf">
            <iconStyle>
                <href><?php echo get_home_url(); ?>/maps/visited/images/flag-lf.png</href>
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
                        <div style="color:#0077ff;font-weight:bold;float:left;">$[name]</div><div style="color:#3b96ff;">&nbsp;$[metaDataProperty.AnyMetaData.who]</div>
                        <img src="photos/$[metaDataProperty.AnyMetaData.img]" alt="" height="270">
                        <div>$[metaDataProperty.AnyMetaData.adress]</div>                        
                    </div>]]></text>
        </Template>
    </Representation>

    <GeoObjectCollection>
        <gml:featureMembers>
        
          <GeoObjectCollection>
        
            <gml:name>Pumbel на карте</gml:name>
            <style>#pointmaps-p</style>
            <gml:featureMembers>';

$result = mysql_query("SELECT * FROM mappoint WHERE who='Pumbel'");

			if(mysql_num_rows($result)>0)
            {
			while ($mar = mysql_fetch_array($result))
            {

$exp_str1 = explode("<br>", $mar['descriptions']);

$mar['descriptions'] = implode($exp_str1, ", ");


echo '<GeoObject>';
echo '<gml:name>', $mar['name'], '</gml:name>';
echo '<gml:metaDataProperty>';
echo '<AnyMetaData>';
echo '<who> by ', $mar['who'], '</who>';
echo '<img>', $mar['photo'], '</img>';
echo '<adress>', $mar['descriptions'], '</adress>';
echo '</AnyMetaData>';
echo '</gml:metaDataProperty>';
echo '<gml:Point>';
echo '<gml:pos>', $mar[cx], ' ', $mar[cy], '</gml:pos>';
echo '</gml:Point>'; 
echo '</GeoObject>';

echo "\n";

}

}

      echo '</gml:featureMembers>
          </GeoObjectCollection>
          
          <GeoObjectCollection>
        
            <gml:name>Lyuba на карте</gml:name>
            <style>#pointmaps-l</style>
            <gml:featureMembers>';

$result = mysql_query("SELECT * FROM mappoint WHERE who='Lu'");

			if(mysql_num_rows($result)>0)
            {
			while ($mar = mysql_fetch_array($result))
            {

$exp_str1 = explode("<br>", $mar['descriptions']);

$mar['descriptions'] = implode($exp_str1, ", ");


echo '<GeoObject>';
echo '<gml:name>', $mar['name'], '</gml:name>';
echo '<gml:metaDataProperty>';
echo '<AnyMetaData>';
echo '<who> by ', $mar['who'], '</who>';
echo '<img>', $mar['photo'], '</img>';
echo '<adress>', $mar['descriptions'], '</adress>';
echo '</AnyMetaData>';
echo '</gml:metaDataProperty>';
echo '<gml:Point>';
echo '<gml:pos>', $mar[cx], ' ', $mar[cy], '</gml:pos>';
echo '</gml:Point>'; 
echo '</GeoObject>';

echo "\n";

}

}

      echo '</gml:featureMembers>
          </GeoObjectCollection>

          <GeoObjectCollection>
        
            <gml:name>Luzkin&amp;Luzkin на карте</gml:name>
            <style>#pointmaps-ll</style>
            <gml:featureMembers>';

$result = mysql_query("SELECT * FROM mappoint WHERE who='Luzkin&amp;Luzkin'");

			if(mysql_num_rows($result)>0)
            {
			while ($mar = mysql_fetch_array($result))
            {

$exp_str1 = explode("<br>", $mar['descriptions']);

$mar['descriptions'] = implode($exp_str1, ", ");


echo '<GeoObject>';
echo '<gml:name>', $mar['name'], '</gml:name>';
echo '<gml:metaDataProperty>';
echo '<AnyMetaData>';
echo '<who> by ', $mar['who'], '</who>';
echo '<img>', $mar['photo'], '</img>';
echo '<adress>', $mar['descriptions'], '</adress>';
echo '</AnyMetaData>';
echo '</gml:metaDataProperty>';
echo '<gml:Point>';
echo '<gml:pos>', $mar[cx], ' ', $mar[cy], '</gml:pos>';
echo '</gml:Point>'; 
echo '</GeoObject>';

echo "\n";

}

}

      echo '</gml:featureMembers>
          </GeoObjectCollection>

          <GeoObjectCollection>

            <gml:name>Luzin Family на карте</gml:name>
            <style>#pointmaps-lf</style>
            <gml:featureMembers>';

$result = mysql_query("SELECT * FROM mappoint WHERE who='Luzin Family'");

			if(mysql_num_rows($result)>0)
            {
			while ($mar = mysql_fetch_array($result))
            {

$exp_str1 = explode("<br>", $mar['descriptions']);

$mar['descriptions'] = implode($exp_str1, ", ");


echo '<GeoObject>';
echo '<gml:name>', $mar['name'], '</gml:name>';
echo '<gml:metaDataProperty>';
echo '<AnyMetaData>';
echo '<who> by ', $mar['who'], '</who>';
echo '<img>', $mar['photo'], '</img>';
echo '<adress>', $mar['descriptions'], '</adress>';
echo '</AnyMetaData>';
echo '</gml:metaDataProperty>';
echo '<gml:Point>';
echo '<gml:pos>', $mar[cx], ' ', $mar[cy], '</gml:pos>';
echo '</gml:Point>'; 
echo '</GeoObject>';

echo "\n";

}

}

      echo '</gml:featureMembers>
          </GeoObjectCollection>
          
        </gml:featureMembers>
    </GeoObjectCollection>  
</ymaps>';

?>