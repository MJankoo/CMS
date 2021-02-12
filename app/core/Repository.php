<?php

class Repository {
    private $table;
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function findBy($params) {
        if(!is_array($params))
            return 0;

        $keys = array_keys($params);

        $conditions = "";
        $executeParams = [];
        $i = 0;
        foreach($keys as $key) {
            if($i>0) {
                $conditions = $conditions." AND ";
            }
            $conditions = $conditions."".$key." = ? ";
            $i++;

            array_push($executeParams, $params[$key]);
        }

        $query = "SELECT * FROM ".$this->table." WHERE ".$conditions;
        $object = $this->pdo->prepare($query);
        $object->execute($executeParams);

        $response = $object->fetchAll();

        return $response;
    }

    public function findAll($amount, $offset = 0) {
        $query = "SELECT * FROM ".$this->table." ORDER BY id DESC LIMIT :amount OFFSET :offset";
        $object = $this->pdo->prepare($query);
        if($object->execute([$amount, $offset])) {
            return $object->fetchAll();
        } else {
            return "Błąd";
        }
    }

    public function setEntity($class) {
        $this->table = strtolower($class);
    }
}