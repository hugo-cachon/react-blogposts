<?php 

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


if($_SERVER["REQUEST_METHOD"] == 'POST'){

    include_once '../config/database.php';
    include_once '../models/Posts.php';

    $database = new Db_connect();
    $db = $database->setConnection();

    $post = new Posts($db);

    $data = json_decode(file_get_contents("php://input"));

    if(!empty($data->title) && !empty($data->content))
    {
        $post->id = $data->id;
        $post->title = $data->title;
        $post->content = $data->content;
        
        if($post->createPost())
        {
            http_response_code(201);
            echo json_encode(["Task has been added to the database"]);
        }
        else
        { 
            http_response_code(503);
            echo json_encode(["Error"]);
        }
    }
}
else 
{
    http_response_code(405);
    echo "Method Not Allowed";
    die();
}