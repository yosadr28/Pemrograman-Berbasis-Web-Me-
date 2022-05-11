<?php

namespace App\Controllers;

use App\Helpers\Connection;

use PDO, PDOException;
class CourseController
{

    public static function getAllCourses()
    {
            $sql = "SELECT * FROM courses";
            try {
                $conn = Connection::createConnection();
                $result = $conn->query($sql, PDO::FETCH_ASSOC);
                $courses = [];
                while ($courses = $result->fetch()) {                    
                    $courses[] = $courses['id']; 
                }
                return $courses;
            } catch (PDOException $e) {
                die('Error reading data: ' . $e->getMessage());
            }
    }
}
