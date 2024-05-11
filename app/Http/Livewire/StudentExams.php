<?php

namespace App\Http\Livewire;

use App\Models\degree;
use App\Models\question;
use Livewire\Component;

class StudentExams extends Component
{
    public $student_id, $quizze_id, $data, $score = 0,
        $counter = 0, $QuestionCunter = 0;


    public function render()
    {
        $this->data = question::where("quizze_id", $this->quizze_id)->get();
        $this->QuestionCunter = $this->data->count();
        $QuestionCunter =  $this->QuestionCunter ;
            return view('livewire.student-exams', ['data'], compact('QuestionCunter'));
    }


    public function nextQue($question_id, $score, $answer, $right_answer)
    {
        // quizze_id student_id question_id
        $stuDegree = degree::where('student_id', $this->student_id)->where('quizze_id', $this->quizze_id)->first();
        if ($stuDegree == null) {
            $degree = new degree();
            $degree->quizze_id = $this->quizze_id;
            $degree->student_id = $this->student_id;
            $degree->question_id = $question_id;
            $degree->mark += $score;
            if (strcmp(trim($answer), trim($right_answer)) === 0) {
                $degree->score += $score;
            } else {
                $degree->score += 0;
            }
            $degree->date = date('Y-m-d');
            $degree->save();
            $this->score =  $degree->score;
        } else {
            if ($stuDegree->question_id >= $question_id) {
                $stuDegree->abuse = 1;
                $stuDegree->score = 0;
                $stuDegree->save();
                 toastr()->error('تم التلاعب في عملية الاختبار ');
                  return redirect()->route('Sexam');

            } else {
                $stuDegree->question_id = $question_id;
                $stuDegree->mark += $score;
                if (strcmp(trim($answer), trim($right_answer)) === 0) {
                    $stuDegree->score += $score;
                } else {
                    $stuDegree->score += 0;
                }
                $stuDegree->save();
                $this->score =  $stuDegree->score;
            }
        }
        if ($this->counter < $this->QuestionCunter - 1) {
            $this->counter++;
        } else {
            toastr('تم حل الاختبار بنجاح');
            return redirect()->route('Sexam');
        }
    }
    public function back(){
        return redirect()->route('Sexam');
    }
}
