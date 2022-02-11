

<?php 

    require_once('db.php');

    class Movie {
        var $id_movie; // id movie [int]
        var $title; // title movie [string]
        var $director; // director [string]
        var $running_time; // running time [int]
        var $release_date; // release date [string]

        // constructor movie
        public function __construct($title, $director, $running_time, $release_date) {
            $this->title = $title;
            $this->director = $director;
            $this->running_time = $running_time;
            $this->release_date = $release_date;
        }
        
        // insert movie into movies table
        public function insert() {
            $conn = connect();

            $query = "";
            $query = "INSERT INTO movies(title, director, running_time, release_date) 
                      VALUES('$this->title', '$this->director', '$this->running_time', '$this->release_date')";

            $conn->exec($query);

            //update id_movie
            $id_movie_query = "SELECT id_movie from movies ORDER BY id_movie DESC LIMIT 1";
            $id_movie = $conn->query($id_movie_query);

            if ($id_movie->rowCount() > 0){
                $row = $id_movie->fetch(PDO::FETCH_ASSOC);
                $this->id_movie = $row['id_movie'];
            }
        }

        // delete movie inside superheroes table 
        public function delete() {
            $conn = connect();       

            $query = "DELETE FROM movies WHERE id_movie = '$this->id_movie'";

            $conn->exec($query);
        }

        // load movie data from movies table
        public static function load($id){
        
            $conn = connect();
    
            $query = "SELECT * FROM movies WHERE id_movie='$id'";
    
            $result = $conn->query($query);
            $res = "";

            if ($result->rowCount() > 0){
              
              $row = $result->fetch(PDO::FETCH_ASSOC);
                
              $res = new Movie('null', 'null', 'null', 'null');
    
              $res->id_movie = $row["id_movie"];
              $res->title = $row["title"];
              $res->director = $row["director"];
              $res->running_time = $row["running_time"];         
              $res->release_date = $row["release_date"];

              }
                       
              return $res;
        }

         // delete feature inside featuring table 
         public static function delete_from_id($id) {
            $conn = connect();       

            $query = "";
            $query = "DELETE FROM movies WHERE id_movie = '$id'";

            return $conn->exec($query);
        }

        // load all the movies from movies table
        public static function getAllMovies(){
            $conn = connect();
    
            $query = "SELECT * FROM movies";
    
            $result = $conn->query($query);
    
            $res = array();
    
            while($row = $result->fetch()){
               $movie = new Movie("null", "null", "null", "null");
               $movie->id_movie = $row["id_movie"];
               $movie->title = $row["title"];
               $movie->director = $row["director"];
               $movie->running_time = $row["running_time"];
               $movie->release_date = $row["release_date"];
               $res[] = $movie;
            }
    
            return $res;
        }
    }
?>