<?php

namespace App\Http\Controllers;

use App\Repository\quizzRepositoryInterface;
use Illuminate\Http\Request;

class QuizzeController extends Controller
{

    public $quizze;
    public function __construct(quizzRepositoryInterface $quizze)
    {
        $this->quizze = $quizze;
    }
    public function index()
    {
        return $this->quizze->index();
    }


    public function create()
    {
        return $this->quizze->create();
    }


    public function store(Request $request)
    {
        return $this->quizze->store($request);
    }

    public function show(string $id)
    {
        //
    }


    public function edit($id)
    {
        return $this->quizze->edit($id);
    }


    public function update(Request $request)
    {
        return $this->quizze->update($request);
    }

    public function destroy(Request $request)
    {
        return $this->quizze->destroy($request);
    }
}
