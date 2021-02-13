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
        if(count($response) > 0) {

            $setters = array_filter(get_class_methods($this->table), function($method) {
                return 'set' === substr($method, 0, 3);
            });

            $i = 0;
            $returnedObject = new $this->table;
            foreach ($setters as $setter) {
                $returnedObject->{$setter}($response[0][$i]);
                $i++;
            }

            return $returnedObject;
        } else {
            return null;
        }

    }

    public function findAll($amount, $offset = 0) {
        $query = "SELECT * FROM ".$this->table." ORDER BY id DESC LIMIT :amount OFFSET :offset";
        $object = $this->pdo->prepare($query);
        if($object->execute([$amount, $offset]) == true) {
            $setters = array_filter(get_class_methods($this->table), function($method) {
                return 'set' === substr($method, 0, 3);
            });
            $response = $object->fetchAll();
            $returnedObjects = [];
            foreach($response as $responseObject) {
                $i = 0;
                $returnedObject = new $this->table;
                foreach ($setters as $setter) {
                    $returnedObject->{$setter}($responseObject[$i]);
                    $i++;
                }
                array_push($returnedObjects, $returnedObject);
            }

            return $returnedObjects;
        } else {
            return "Błąd";
        }
    }

    public function setEntity($class) {
        $this->table = strtolower($class);
    }
}