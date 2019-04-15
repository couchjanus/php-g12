<?php

// pdo.select.from.table.categories.php

// example of PDO MySQL connection
$params = [
    'host' => 'localhost',
    'user' => 'root',
    'pwd'  => 'ghbdtn',
    'db' => "store"
];

// подключаемся к базе данных
try {
    $dsn  = sprintf('mysql:charset=utf8mb4;host=%s;dbname=%s', $params['host'], $params['db']);
    $pdo  = new PDO($dsn, $params['user'], $params['pwd']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("
        SELECT t1.*, t2.filename as picture
        FROM products t1 
        LEFT OUTER JOIN pictures t2
        on t1.id=t2.resource_id 
        where t1.id = 14
    ");

    // $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($res);
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    // var_dump($res);
    $pictures = [];
    array_push($pictures, $res['picture']);
    
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($pictures, $row['picture']);
    }
    // var_dump($pictures). "\n";
    $res['picture'] = $pictures;
    var_dump($res);
    var_dump($res['picture'][0]);

    echo "All rows fetched successfully\n\n";
}
catch(PDOException $e) {
    error_log($e->getMessage());
    file_put_contents('PDOErrors.log', $e->getMessage(), FILE_APPEND);
} catch (Throwable $e) {
    error_log($e->getMessage());
}
finally {
    $pdo = null;
}
