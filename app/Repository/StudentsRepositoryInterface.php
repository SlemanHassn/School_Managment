<?php
namespace App\Repository;

interface StudentsRepositoryInterface{

    public function getSections($id);

    public function indexStudents();
    public function createStudents();
    public function storeStudents($request);
    public function editStudents($id);
    public function updateStudents($request);
    public function deleteStudents($request);
    public function ShowDetailsStudents($id);
    public function Upload_attachment($request);
    public function Delete_attachment($request);
    public function Download_attachment($name,$filename);


}
