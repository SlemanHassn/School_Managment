<?php

namespace App\Repository;

interface ReceiptStudentsRepositoryInterface
{
    public function index();
    public function show($id);
    public function store($request);
    public function edit($id);
    public function update($request);
    public function destroy($request);

}
