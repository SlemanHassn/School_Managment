<?php

namespace App\Http\Controllers\Teachers\dashboard;

use App\Http\Controllers\Controller;
use App\Http\Controllers\QuizzeController;
use App\Models\degree;
use App\Models\Grade;
use App\Models\question;
use App\Models\quizze as ModelsQuizze;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;

class Quizze extends Controller
{

    public function index()
    {
        $quizzes = ModelsQuizze::all();
        return view('Teachers.dashborad.quizze.index', compact('quizzes'));
    }


    public function create()
    {
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teacher_id', auth()->user()->id)->get();
        return view('Teachers.dashborad.quizze.create', $data);
    }

    public function store(Request $request)
    {
        try {
            $quizzes = new ModelsQuizze();
            $quizzes->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizzes->subject_id = $request->subject_id;
            $quizzes->grade_id = $request->Grade_id;
            $quizzes->classroom_id = $request->Classroom_id;
            $quizzes->section_id = $request->section_id;
            $quizzes->teacher_id = auth()->user()->id;
            $quizzes->save();
            toastr()->success(trans('message.success'));
            return redirect()->route('Tquizze.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function show($id)
    {
        $questions = question::where('quizze_id', $id)->get();
        $quizze = ModelsQuizze::findOrFail($id);
        return view('Teachers.dashborad.Questions.index', compact('questions', 'quizze'));
    }

    public function edit($id)
    {
        $quizz = ModelsQuizze::findorFail($id);
        $data['grades'] = Grade::all();
        $data['subjects'] = Subject::where('teacher_id', auth()->user()->id)->get();
        return view('Teachers.dashborad.quizze.edit', $data, compact('quizz'));
    }


    public function update(Request $request)
    {
        try {
            $quizz = ModelsQuizze::findorFail($request->id);
            $quizz->name = ['en' => $request->Name_en, 'ar' => $request->Name_ar];
            $quizz->subject_id = $request->subject_id;
            $quizz->grade_id = $request->Grade_id;
            $quizz->classroom_id = $request->Classroom_id;
            $quizz->section_id = $request->section_id;
            $quizz->save();

            toastr()->success(trans('message.update'));
            return redirect()->route('Tquizze.index');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function destroy(Request $request)
    {
        try {
            ModelsQuizze::destroy($request->id);
            toastr()->success(trans('message.Delete'));
            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    //Questions
    public function addQuestions($id)
    {
        $quizzes = ModelsQuizze::findOrFail($id);
        return view('Teachers.dashborad.Questions.create', compact('quizzes'));
    }

    public function storeQuestions(Request $request)
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
            return redirect()->route('Tquizze.show', $request->quizze_id);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function editQuestions($id)
    {
        $question = Question::findOrFail($id);
        return view('Teachers.dashborad.Questions.edit', compact('question'));
    }
    public function updateQuestions(Request $request)
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
            return redirect()->route('Tquizze.show', $request->quizze_id);
        } catch (\Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function RQuestions(Request $request)
    {
        try {
            Question::destroy($request->id);
            toastr()->success(trans('message.Delete'));
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

     public function showMarks($id)
    {
        $quizze = ModelsQuizze::findOrFail($id);
        $degrees = degree::where('quizze_id', $id)->get();
        return view('Teachers.dashborad.Marks.marks', compact('degrees','quizze'));
    }
    public function RecycleTest($id){
        degree::destroy($id);
        toastr()->success(trans('message.Delete'));
         return redirect()->back();
    }

}
