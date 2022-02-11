

<?php 

    require_once('db.php');

    class Superhero {
        var $id_superhero;
        var $name; // name [string];
        var $powers; // powers [string]
        var $power_ranking; // power_ranking [int]
    
        // constructor superhero class
        public function __construct($name, $powers, $power_ranking) {
            $this->name = $name;
            $this->powers = $powers;
            $this->power_ranking = $power_ranking;
        }

        // insert superhero into superhero tables
        public function insert() {
            $conn = connect();

            $query = "";
            $query = "INSERT INTO superheroes(name, powers, power_ranking) 
                      VALUES('$this->name', '$this->powers', '$this->power_ranking')";

            $conn->exec($query);

            // update id_superhero
            $id_superhero_query = "SELECT id_superhero from superheroes ORDER BY id_superhero DESC LIMIT 1";
            $id_superhero = $conn->query($id_superhero_query);

            if ($id_superhero->rowCount() > 0){
                $row = $id_superhero->fetch(PDO::FETCH_ASSOC);
                $this->id_superhero = $row['id_superhero'];
            }
        }

         // delete superhero inside superheroes table 
        public function delete() {
            $conn = connect();       

            $query = "";
            $query = "DELETE FROM superheroes WHERE id_superhero = '$this->id_superhero'";

            return $conn->exec($query);
        }

        // delete feature inside featuring table 
        public static function delete_from_id($id) {
            $conn = connect();       

            $query = "";
            $query = "DELETE FROM superheroes WHERE id_superhero = '$id'";

            return $conn->exec($query);
        }

        // load superhero data from superheroes table
        public static function load($id){
            $conn = connect();
    
            $query = "SELECT * FROM superheroes WHERE id_superhero = '$id'";
    
            $result = $conn->query($query);
            $res = "";

            if ($result->rowCount() > 0){
              
              $row = $result->fetch(PDO::FETCH_ASSOC);
                
              $res = new Superhero('null', 'null', 0);
    
              $res->id_superhero = $row["id_superhero"];
              $res->name = $row["name"];
              $res->powers = $row["powers"];
              $res->power_ranking = $row["power_ranking"];
            }
                       
            return $res;
        }

        // loads all superheroes
        public static function getAllSuperheroes(){
            $conn = connect();
    
            $query = "SELECT * FROM superheroes";
    
            $result = $conn->query($query);
    
            $res = array();
    
            while($row = $result->fetch()){
               $superhero = new Superhero("null", "null", 0);
               $superhero->id_superhero = $row["id_superhero"];
               $superhero->name = $row["name"];
               $superhero->powers = $row["powers"];
               $superhero->power_ranking = $row["power_ranking"];
               $res[] = $superhero;
            }
    
            return $res;
        }

    }

?>