<?php
$method =$_SERVER['REQUEST_METHOD'];
//Process only when method is POST
if ($method=="POST"){
    echo "Method Posted0";
    $requestBody = file_get_contents('php://input');
    echo "Method Posted01";
    $json =json_decode($requestBody);
    echo "Method Posted02";
    $text =$json;
    echo "Method Posted03";
    switch($text) 
    {
        case 'hi':
            $speech ="Hi, Nice to meet you";
            break;
        case 'bye':
            $speech = "Bye, good night";
            break;
        case 'anything':
            $speech =" yes, you can type anything here.";
            break;
        default:
            $speech ="Sorry, I didn't get that. Please ask me something else.";
            break;  
    }
    $response = new \stdClass();
    $response->speech ="";
    $response->displayText ="";
    $response->source="webhook";
    echo json_encode($response);
}
else
{
    echo "Method not allowed";
}
?>
