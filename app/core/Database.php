<?php

class Database
{
    private $em;
    private $pdo;
    private $repository;

    public function __construct() {
        try {
            $this->pdo = new PDO('mysql:host='.DB_HOSTNAME.';dbname='.DB_NAME, DB_USER, DB_PASSWORD);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }

        $this->em = new EntityManager($this->pdo);
        $this->repository = new Repository($this->pdo);
    }

    public function getManager() {
        return $this->em;
    }

    public function getRepository($class) {
        $this->repository->setEntity($class);
        return $this->repository;
    }

}