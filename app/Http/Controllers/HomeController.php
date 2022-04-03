<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use App\Models\Volunteer;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $qs = Question::query()->get()->groupBy('week_number');
        $v = Volunteer::query()->get()->groupBy('week_number');
        $qa = [];
        $date = Carbon::now()->subDay()->toDateString();
        foreach ($qs as $i => $q){
            if ( $q[$i]->publish_date < $date ){
                $box_title = "عدد المتسابقين";
                $volunteer = isset($v[$i]) ? count($v[$i]) : 0;
                $url = true;
                $txt_show_player = "تم تسليم الجوائز";
            } elseif($q[$i]->publish_date == $date){ // allow get won
                $box_title = "عدد المتسابقين";
                $volunteer = isset($v[$i]) ? count($v[$i]) : 0;
                $url = true;
                $txt_show_player = "إعمل قرعة بين الفائزين";
            } elseif($q[$i]->publish_date == Carbon::now()->toDateString()){
                $box_title = "عدد المتسابقين";
                $volunteer = isset($v[$i]) ? count($v[$i]) : 0;
                $url = false;
                $txt_show_player = "وقت تسليم الأجوبة لم ينتهي";
            }else{
                $box_title = "تاريخ المسابقة";
                $volunteer = $q[5]->publish_date;
                $url = false;
                $txt_show_player = "لم تبدأ المسابقة";
            }
            $qa[$i]['week_number'] = $q[5]->week_number;
            $qa[$i]['box_title'] = $box_title;
            $qa[$i]['box_subtitle'] = $volunteer;
            $qa[$i]['url'] = $url;
            $qa[$i]['txt_show_player'] = $txt_show_player;
        }
        return view('admin.dashboard', ['quiz'=>$qa]);
    }

    public function get_player(Request $request){
        return $request->week_number;
    }

    public function question(){
        $questions = Question::query()->with('answers')->get();
        if (count($questions) > 0) $view = 'admin.questions.edit';
        else $view = 'admin.questions.index';
        return view($view, ['title'=> 'الأسئلة', 'questions' => $questions]);
    }

    public function saveQuestion(Request $request){
        DB::beginTransaction();
        try {
            Question::query()->truncate();
            Answer::query()->truncate();
            for ($w= 1 ; $w < 5; $w++){
                for ($q=1; $q<8;$q++){
                    $question = DB::table('questions')->insertGetId([
                        'question' => $request->question[$w][$q],
                        'publish_date' => $request->date[$w],
                        'week_number' => $request->week_number[$w],
                    ]);
                    $answerID = null;
                    for ($a=1 ; $a < 5 ; $a++){
                        if($request->correct[$w][$q] == $a){
                            $answerID = DB::table('answers')->insertGetId([
                                'question_id' => $question,
                                'answer' => $request->answer[$w][$q][$a]
                            ]);
                        }else{
                            DB::table('answers')->insert([
                                'question_id' => $question,
                                'answer' => $request->answer[$w][$q][$a]
                            ]);
                        }
                    }
                    Question::query()->where('id',$question)->update([
                        'correct_answer' => $answerID
                    ]);
                }
            }
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            Session::flash('error','يوجد خطأ في الاضافة');
            return back();
        }
        Session::flash('success','تم الاضافة والتحديث بنجاح');
        return redirect(route('questions'));
    }
}
