<?php

namespace App\Repository;

interface TeachersRepositoryInterface
{

    public function getTeachers();
    public function getGenders();
    public function getTeacher($id);
    public function getSpecializations();
    public function storeTeacher($request);
    public function updateTeacher($request);
    public function showTeacher($id);
    public function Upload_attachment($request);
    public function Delete_attachment($request);
    public function Download_attachment($name,$filename);
}
