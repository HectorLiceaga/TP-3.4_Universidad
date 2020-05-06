<?php

/**
 * Interactúa con la tabla carrera
 */
class UniversityModel
{
    //creo la conección 
    private function  createConection()
    {
        $host = 'localhost';
        $userName = 'root';
        $password = '';
        $database = 'db_universidad';

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $userName, $password);
        } catch (Exception $e) {
            var_dump($e);
        }
        return $pdo;
    }

    /**
     * Devuelve todas las carreras.
     */
    public function getCareer()
    {
        //1-Abro la conección con MySQL
        $db = $this->createConection();

        //2-Envío la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM carrera");
        $sentencia->execute();
        $career = $sentencia->fetchAll(PDO::FETCH_OBJ);
        //var_dump($career);

        return $career;
    }

    public function getCareerById($id_carrera)
    {
        //1-Abro la conección con MySQL
        $db = $this->createConection();

        //2-Envío la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT * FROM carrera WHERE id_carrera =? ");
        $sentencia->execute([$id_carrera]);
        $career = $sentencia->fetch(PDO::FETCH_OBJ); //devuelve un solo elemento!!!!
        //var_dump($career);

        return $career;
    }
    public function getSubjects($id_carrera)
    {
        //1-Abro la conección con MySQL
        $db = $this->createConection();

        //2-Envío la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT carrera.nombre AS carrera, materia.nombre AS materia, materia.profesor FROM materia INNER JOIN carrera ON materia.id_carrera=carrera.id_carrera WHERE materia.id_carrera=?");
        $sentencia->execute([$id_carrera]);
        $subject = $sentencia->fetchAll(PDO::FETCH_OBJ);
        //var_dump($subject);
                
        return $subject;
    }

    public function getCareer3()
    {
        //1-Abro la conección con MySQL
        $db = $this->createConection();

        //2-Envío la consulta (3 pasos)
        $sentencia = $db->prepare("SELECT carrera.nombre AS carrera, materia.nombre AS materia, materia.profesor, carrera.cant_anios FROM materia INNER JOIN carrera ON materia.id_carrera=carrera.id_carrera WHERE cant_anios <3");
        $sentencia->execute();
        $career3 = $sentencia->fetchAll(PDO::FETCH_OBJ);
        //var_dump($career3);

        return $career3;
    }
}
