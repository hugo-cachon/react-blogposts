<?php 

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");

if($_SERVER["REQUEST_METHOD"] == 'GET'){

    include_once '../config/database.php';
    include_once '../models/Posts.php';
    
    $database = new db_connect();
    $db = $database->setConnection();

    $posts = new Posts($db);
    
    $stmt = $posts->getAllPosts();

    if($stmt->rowCount() > 0)
    {
        $posts_array = [];
        $posts_array["posts"] = [];

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);

            $data = [
                "id" => $id,
                "title" => $title,
                "content" => $content
            ];

            $posts_array["posts"][] = $data;
        }

        http_response_code(200);
        print_r(json_encode($posts_array));
    }
}
else 
{
    http_response_code(405);
    echo "Method Not Allowed";
    die();
}
?>