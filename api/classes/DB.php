<?

class DB{

    public $pdo;

    public function __construct(string $host, string $db_name, string $user_name, string $user_pass){

        try{
            $this->pdo = new PDO(
            "mysql:host=$host;dbname=$db_name;",
            $user_name,
            $user_pass
        );
        } catch(PDOException $exc){
            print_r($exc->getMessage());
        }

    }

}

?>