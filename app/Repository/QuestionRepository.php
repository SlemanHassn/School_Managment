<?php

namespace App\Repository;

use App\Models\Question;
use App\Models\Quizze;

class QuestionRepository implements QuestionRepositoryInterface
{

    public function index()
    {
        $questions = Question::get();
        return view('Questions.index', compact('questions'));
    }

    public function create()
    {
        $quizzes = Quizze::get();
        return view('Questions.create',compact('quizzes'));
    }

    public function store($request)
    {
        try {
            $question = new Question();
            $question->title =  ['en' => $request->title_en, 'ar' => $request->title_ar];
            $question->answers =  ['en' => $request->answers_en, 'ar' => $request->answers_ar];
            $question->right_answer = ['en' => $request->right_answer_en, 'ar' => $request->right_answer_ar];
            $question->score = $request->score;
            $question->quizze_id = $request->quizze_id;
            $question->save();
            toastr()->success(trans('message.success'));
            return redirect()->route('questions.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $question = Question::findorfail($id);
        $quizzes = Quizze::get();
        return view('Questions.edit',compact('question','quizzes'));
    }

    public function update($request)
    {
        try {
            $question = Question::findorfail($request->id);
             $question->title =  ['en' => $request->title_en, 'ar' => $request->title_ar];
            $question->answers =  ['en' => $request->answers_en, 'ar' => $request->answers_ar];
            $question->right_answer = ['en' => $request->right_answer_en, 'ar' => $request->right_answer_ar];
            $question->score = $request->score;
            $question->quizze_id = $request->quizze_id;
            $question->save();
            toastr()->success(trans('message.Update'));
            return redirect()->route('questions.index');
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            Question::destroy($request->id);
            toastr()->success(trans('message.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
