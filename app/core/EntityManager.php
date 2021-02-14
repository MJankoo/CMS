<?php

class EntityManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($object) {
        $className = get_class($object);

        $query = "INSERT into $className (";
        $reflect = new ReflectionClass($className);
        $properties = $reflect->getProperties();
        foreach ($properties as $property) {
            if($property->getName() == $properties[count($properties)-1]->getName()) {
                $query = $query."`".$property->getName()."`)";
            } else {
                $query = $query."`".$property->getName()."`, ";
            }
        }
        $query = $query." VALUES (";
        foreach ($properties as $property) {
            if($property->getName() == $properties[count($properties)-1]->getName()) {
                $query = $query.":".$property->getName().");";
            } else {
                $query = $query.":".$property->getName().", ";
            }
        }

        $params = [];
        $getters = array_filter(get_class_methods($className), function($method) {
            return 'get' === substr($method, 0, 3);
        });
        foreach ($getters as $getter) {
            array_push($params, $object->{$getter}());
        }

        $question = $this->pdo->prepare($query);
        return $question->execute($params);
    }

    public function update($object) {
        $className = get_class($object);

        $query = "UPDATE $className SET";
        $reflect = new ReflectionClass($className);
        $properties = $reflect->getProperties();
        foreach ($properties as $property) {
            if($property->getName() != "id") {
                if($property->getName() == $properties[count($properties)-1]->getName()) {
                    $query = $query."`".$property->getName()."` = :".$property->getName();
                } else {
                    $query = $query."`".$property->getName()."` = :".$property->getName().", ";
                }
            }
        }
        $query = $query." WHERE `id` = :id;";

        $params = [];
        $getters = array_filter(get_class_methods($className), function($method) {
            return 'get' === substr($method, 0, 3);
        });
        foreach ($getters as $getter) {
            array_push($params, $object->{$getter}());
        }

        $params[count($params)-1] = array_shift($params);

        $question = $this->pdo->prepare($query);
        return $question->execute($params);
    }
}