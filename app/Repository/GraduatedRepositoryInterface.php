<?php

namespace App\Repository;

interface GraduatedRepositoryInterface
{
    public function indexGraduated();
    public function createGraduated();
    public function SoftDeletesGraduated($request);
    public function oneSoftDeletesGraduated($request);
    public function forceDelete($request);
    public function reGraduated($request);


}
