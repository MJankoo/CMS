<?php

class EntityManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function persist($object) {
        echo("DO ZROBIENIA");
    }

    public function flush($object) {

    }
}