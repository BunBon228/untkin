<?

require_once 'api/classes/DB.php';

$db = new DB('localhost', 'utkin', 'root', '');

$res = $db->pdo->query("SELECT * FROM users");


echo "<pre>";
while($user = $res->fetch(PDO::FETCH_ASSOC)){
    print_r($user);
}

?>