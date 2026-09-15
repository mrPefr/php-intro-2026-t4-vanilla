<?php

// rendera bilar

render(generateHtmlFromCars());




function getCars(){
    $cars = file_get_contents("cars.json");
    return json_decode($cars, true);
}


function generateHtmlFromCars(){

    $cars = getCars();
    $html = "";
    foreach($cars as $car){
        extract($car);
        $html .= "<div class = 'car' id = '$id'>" . 
            "<h2>$brand</h2>" .
            "<h4>$model</h4>" .
            "</div>";



    }

    return $html;

}


function debug($var){

    echo "<pre>";
    var_dump($var);
    echo "</pre>";

}

function render(string $html){

    $template = file_get_contents("template.html");
    $output = str_replace("%content%",$html, $template);
    echo $output;
}
