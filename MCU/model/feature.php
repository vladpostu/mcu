
<?php

require_once('db.php');

class Feature
{
    var $id_feature;
    var $id_movie;
    var $id_superhero;

    function __construct($id_movie, $id_superhero) {
        $this->id_movie = $id_movie;
        $this->id_superhero = $id_superhero;
    }

    public function insert()
    {
        $conn = connect();

        $query = "";
        $query = "INSERT INTO featuring(movie, superhero) 
                      VALUES('$this->id_movie', '$this->id_superhero')";

        $conn->exec($query);

        // update id_superhero
        $id_feature_query = "SELECT id_feature from featuring ORDER BY id_feature DESC LIMIT 1";
        $id_feature = $conn->query($id_feature_query);

        if ($id_feature->rowCount() > 0) {
            $row = $id_feature->fetch(PDO::FETCH_ASSOC);
            $this->id_feature = $row['id_feature'];
        }
    }

    // delete feature inside featuring table 
    public function delete() {
        $conn = connect();       

        $query = "";
        $query = "DELETE FROM featuring WHERE id_feature = '$this->id_feature'";

        return $conn->exec($query);
    }

    // delete feature inside featuring table 
    public static function delete_from_id($id) {
        $conn = connect();       

        $query = "";
        $query = "DELETE FROM featuring WHERE id_feature = '$id'";

        return $conn->exec($query);
    }

    // load feature data from featuring table
    public static function load($id){
        $conn = connect();

        $query = "SELECT * FROM featuring WHERE id_feature = '$id'";

        $result = $conn->query($query);
        $res = "";

        if ($result->rowCount() > 0){
          
          $row = $result->fetch(PDO::FETCH_ASSOC);
            
          $res = new Feature(0, 0);

          $res->id_movie = $row["movie"];
          $res->id_superhero = $row["superhero"];
        }
                   
        return $res;
    }

    // loads all features
    public static function getAllFeatures(){
        $conn = connect();

        $query = "SELECT * FROM featuring";

        $result = $conn->query($query);

        $res = array();

        while($row = $result->fetch()){
           $feature = new Feature(0, 0);
           $feature->id_feature = $row['id_feature'];
           $feature->id_movie = $row["movie"];
           $feature->id_superhero = $row['superhero'];
           $res[] = $feature;
        }

        return $res;
    }

    public static function getNames() {
        $conn = connect();

        $query = "SELECT * FROM featuring
                  INNER JOIN movies ON featuring.movie = movies.id_movie
                  INNER JOIN superheroes ON featuring.superhero = superheroes.id_superhero";

        $result = $conn->query($query);
        $res = array();

        while($row = $result->fetch()){
            $feature = new Feature(0, 0);
            $feature->id_feature = $row['id_feature'];
            $feature->id_movie = $row["title"];
            $feature->id_superhero = $row['name'];
            $res[] = $feature;
         }

         return $res;
    }
}

?>