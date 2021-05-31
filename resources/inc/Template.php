<?php
$data = getData();
foreach($data as $item){
    /*printf('<a class="item" href="Spelinfo.php?id=%u">', $item["id"]);*/
    echo
    '<div class=spelapart>',
    '<div class="afbeeldingdiv">',
        '<img class="afbeelding" src="resources/images/'.$item['image'].'">',
    '</div>',
    '<div class="naam">',
        '<h2>'.$item['name'].'</h2>',
    
        '</div>',
        '<div class="infoknop"><i class="fas fa-search"></i> bekijk</div>',
    '</a>',
    '</div>';
}
?>