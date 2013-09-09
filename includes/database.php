<?php

function get_random_pics(){
    $sql = "SELECT id,name FROM pics ORDER BY RAND() LIMIT 2";
    return _mysql($sql);
}

function increment_pic($id){
    $sql = "UPDATE pics SET grade = grade + 1 WHERE id = :id";
    return _mysql($sql,array(':id' => intval($id)));
}

function decrement_pic($id){
    $sql = "UPDATE pics SET grade = grade - 1 WHERE id = :id";
    return _mysql($sql,array(':id' => intval($id)));
}

function get_pic($rank){
    $sql = "SELECT name FROM pics ORDER BY grade DESC LIMIT :rank , 2";
    return _mysql($sql,array(':rank' => intval($rank)));
}

function _mysql($sql,$params = null){
    include('config.php');

    try {
        $pdo = new PDO($dbs,$username,$password,array( PDO::ATTR_PERSISTENT => false));
        $query = $pdo->prepare($sql);

        if ($params != null){
            foreach ($params as $key=>$value){
                if (is_string($value)) {
                    $query->bindParam($key,$value,PDO::PARAM_STR);
                } else if (is_integer($value)) {
                    $query->bindParam($key,$value,PDO::PARAM_INT);
                }
            }
        }
        
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        $pdo = null;
    } catch(PDOException $e) {
        echo "Problem with database. " . $e->getMessage();
        die();
    }
    return $result;
}

?>
