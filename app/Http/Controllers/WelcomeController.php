<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Volunteer;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable{
        $questions = Question::query()->whereDate('publish_date',"=", Carbon::now())->with('answers')->get()->toArray();
        shuffle($questions);
        return view('welcome', ['questions' => $questions]);
    }

    public function answer(Request $request){
        $data = $request->validate([
            'name' => 'required|string',
            'national_id' => 'required|numeric|digits:10',
            'week_number' => 'required|numeric|min:1|max:4',
        ]);
        $cnt = 0;
        $v = Volunteer::query()->where('national_id', $request->national_id)
            ->where('week_number',$request->week_number)->first();
        if (!is_null($v)) {
            Session::flash('error','تم الجواب على هذا الاسبوع');
            Session::flash('error-question','تم الجواب على هذا الاسبوع');
            return redirect(route('user.question'));
        }
        $qa = [];
        foreach ($request->answers as $questionID => $answerID){
            $question = Question::query()->find($questionID);
            array_push($qa, [$request->q[$questionID] => $request->a[$answerID]]);
            if ($question->correct_answer == $answerID){
                $cnt++;
            }
        }
        $data['answer'] = json_encode($qa, JSON_UNESCAPED_UNICODE );
        $data['correct'] = $cnt;
        Volunteer::query()->create($data);

        Session::flash('success','تم ارسال الاجوبة بنجاح');
        Session::flash('error-question','تم الجواب على هذا الاسبوع');
        return redirect(route('user.question'));
    }
}
