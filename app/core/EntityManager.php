<?php

class EntityManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function flush($object) {

    }
}