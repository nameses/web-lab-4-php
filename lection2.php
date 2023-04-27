<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $name = $_GET['name'];
    $surname = $_GET['surname'];

    $fullname = $name + $surname;
    if($name === null || $surname===null ) echo "Hello, stranger!";
    else echo "Hello, {$fullname}!";

} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //parse data from form
//    $data = file_get_contents('php://input');
//    parse_str($data, $params);
//    $name = $params['name'];
//    $surname = $params['surname'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $data = array('name' => $name, 'surname' => $surname);

    if (empty($name) || empty($surname)) {
        header('HTTP/1.1 400 Bad Request');
        exit;
    }


    // check if file exists
    $file = 'data.json';
    if (file_exists($file)) {
        // read existing data
        $json_data = file_get_contents($file);
        $existing_data = json_decode($json_data, true);
        // append new data
        $existing_data[] = $data;
    } else {
        $existing_data = array($data);
    }

    // encode data to json and write to file
    $json_data = json_encode($existing_data);
    file_put_contents($file, $json_data);

    //output input data to html
    $fullname = $name . " " . $surname;
    echo "Hello, {$fullname}!";

    http_response_code(200);
    echo "Form data saved successfully! ";
} else {
    header("HTTP/1.1 405 Method Not Allowed");
    echo "Unsupported request method";
}

echo '<hr>Use this btn for post method.';
echo '<form action="lection2.php" method="POST">';
echo '<input type="text" name="name" placeholder="name" >';
echo '<input type="text" name="surname" placeholder="surname" >';
echo '<button type="submit">post</button>';
echo '</form>';
?>