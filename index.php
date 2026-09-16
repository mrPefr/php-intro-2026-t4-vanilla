<?php

// rendera bilar

//render(generateHtmlFromCars());


$route = $_SERVER["REQUEST_URI"];
$method = $_SERVER['REQUEST_METHOD'];


if($route == "/") render("<h1>HOME</h1>");
elseif($route == "/cars") render(generateHtmlFromCars());
elseif($route == "/createCar") render(getComponent('create'));
elseif($route == "/saveCar" && $method == "POST" ) saveCar();
else render("<h1>404</h1>");



function saveCar(){

    if(!empty($_POST['brand']) && 
    !empty($_POST['model']) && 
    !empty($_POST['price'])){

        $cars = getCars();
        $brand = htmlspecialchars($_POST['brand']);
        $model = htmlspecialchars($_POST['model']);
        $price = htmlspecialchars($_POST['price']);
        $id = uniqid(true);
        $car = [
            "id"=>$id,
            "brand"=>$brand,
            "model"=>$model,
            "price"=>$price
        ];

        array_push($cars, $car);
  /*       $cars[count($cars)] = $car; */
        saveCars($cars);

        // redirect
        redirect("/cars");

    }

}


function redirect(string $path){
    header("Location:$path");
}

function getComponent(string $name){
    $file = $name.".html";
    if(file_exists($file))
        return file_get_contents($file);

    return "<h2>No Component</h2>";
}


function getCars(){
    $cars = file_get_contents("cars.json");
    return json_decode($cars, true);
}

function saveCars($cars){
    file_put_contents("cars.json", json_encode($cars, JSON_PRETTY_PRINT));
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
