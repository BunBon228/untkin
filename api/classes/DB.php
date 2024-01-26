<?

class DB{

    private $pdo;

    public function __construct(string $host, string $db_name, string $user_name, string $user_pass){

        $this->pdo = new PDO(
        "mysql:host=$host;dbname=$db_name;",
        $user_name,
        $user_pass
        );

    }

    public function select(string $field = "*", string $tbname, string $condition = ""){

        switch ($condition) {
            case '':
                $sql = "SELECT $field FROM $tbname;";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                break;
            
            default:
                $sql = "SELECT $field FROM $tbname WHERE $condition;";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([]);
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
                break;
        }

    }

    public function insert(string $tbname, string $values){

        $sql = "INSERT INTO $tbname VALUES ($values);";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function update(string $tbname, string $set, string $condition){

        $sql = "UPDATE $tbname SET $set WHERE $condition;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function custom(string $sql){
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}


// $config = file_get_contents(realpath('./../../dbcon.json'));
// $json_config = json_decode($config, true);

echo realpath('../../dbcon.json');

?>