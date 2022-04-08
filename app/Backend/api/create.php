<?php 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Expose-Headers: Content-Length, X-JSON");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');


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
            echo json_encode(["Post has been added to the database"]);
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