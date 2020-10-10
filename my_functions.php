<?php
//xml-tiedostoon tallennus
function saveDataToXML($data, $file_name){
    
    $author = $data['author'];
    $xml = simplexml_load_file('data/galleria.xml');

    $new_pic = $xml->addChild('picture');
    $new_pic->addChild('author', $author);
    $new_pic->addChild('file', $file_name);
    $new_pic->addChild('date', date("Y-m-d"));

    //muotoilu ja tallennus
    $dom = new DOMDocument("1.0");
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xml->asXML());
    $dom->save('data/galleria.xml');

}