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
                $win = false;
                $txt_show_player = "تم تسليم الجوائز";
            } elseif($q[$i]->publish_date == $date){ // allow get won
                $box_title = "عدد المتسابقين";
                $volunteer = isset($v[$i]) ? count($v[$i]) : 0;
                $url = false;
                $win = true;
                $txt_show_player = "إعمل قرعة بين الفائزين";
            } elseif($q[$i]->publish_date == Carbon::now()->toDateString()){
                $box_title = "عدد المتسابقين";
                $volunteer = isset($v[$i]) ? count($v[$i]) : 0;
                $url = false;
                $win = false;
                $txt_show_player = "وقت تسليم الأجوبة لم ينتهي";
            }else{
                $box_title = "تاريخ المسابقة";
                $volunteer = $q[5]->publish_date;
                $url = false;
                $win = false;
                $txt_show_player = "لم تبدأ المسابقة";
            }
            $qa[$i]['week_number'] = $q[5]->week_number;
            $qa[$i]['box_title'] = $box_title;
            $qa[$i]['box_subtitle'] = $volunteer;
            $qa[$i]['url'] = $url;
            $qa[$i]['txt_show_player'] = $txt_show_player;
            $qa[$i]['win'] = $win;
        }
        return view('admin.dashboard', ['quiz'=>$qa]);
    }

    public function get_player(Request $request){
        if( $request->isWinner == 'isWinner' )
            return Volunteer::query()->where('is_win', true)->where('week_number',$request->week_number)->limit(7)->get()->toArray();
        else {
            $v = Volunteer::query()->where('week_number',$request->week_number)->where('correct',7)->orderBy('correct','desc')->get()->toArray();
            $clearWin = [];
            foreach ($v as $vv){
                $checkWin = Volunteer::query()->where('national_id',$vv["national_id"])->where('is_win', true)->get();
                if (count($checkWin) == 0){
                    array_push($clearWin, $vv);
                }
            }
            if (count($clearWin) > 7){
                shuffle($clearWin);
                return array_slice($clearWin,0,7);
            }
            else{
                $v = Volunteer::query()->where('week_number',$request->week_number)->where('correct',6)->orderBy('correct','desc')->get()->toArray();
                $clearWin6 =[];
                foreach ($v as $vv){
                    $checkWin6 = Volunteer::query()->where('national_id',$vv["national_id"])->where('is_win', true)->get();
                    if (count($checkWin6) == 0){
                        array_push($clearWin6, $vv);
                    }
                }
                shuffle($clearWin6);
                if ($clearWin6 >= (7 - count($clearWin)) ){
                    $clearWin6 = array_slice($clearWin6,0,(7 - count($clearWin)) );
                    return array_merge($clearWin , $clearWin6);
                }else{
                    $clearWin = array_merge($clearWin , $clearWin6);
                    $v = Volunteer::query()->where('week_number',$request->week_number)->where('correct',5)->orderBy('correct','desc')->get()->toArray();
                    $clearWin5 =[];
                    foreach ($v as $vv){
                        $checkWin5 = Volunteer::query()->where('national_id',$vv["national_id"])->where('is_win', true)->get();
                        if (count($checkWin5) == 0){
                            array_push($clearWin5, $vv);
                        }
                    }
                    shuffle($clearWin5);
                    if ($clearWin5 >= (7 - count($clearWin)) ){
                        $clearWin5 =  array_slice($clearWin5,0,(7 - count($clearWin)) );
                        return array_merge($clearWin , $clearWin5);
                    }else{
                        $clearWin = array_merge($clearWin , $clearWin5);
                        $v = Volunteer::query()->where('week_number',$request->week_number)
                            ->where('correct',4)->orderBy('correct','desc')->get()->toArray();
                        $clearWin4 =[];
                        foreach ($v as $vv){
                            $checkWin4 = Volunteer::query()->where('national_id',$vv["national_id"])->where('is_win', true)->get();
                            if (count($checkWin4) == 0){
                                array_push($clearWin4, $vv);
                            }
                        }
                        shuffle($clearWin4);
                        if ($clearWin4 >= (7 - count($clearWin)) ){
                            $clearWin4 =  array_slice($clearWin4,0,(7 - count($clearWin)) );
                            return array_merge($clearWin , $clearWin4);
                        }else{
                            $clearWin = array_merge($clearWin , $clearWin4);
                            $v = Volunteer::query()->where('week_number',$request->week_number)
                                ->where('correct',3)->orderBy('correct','desc')->get()->toArray();
                            $clearWin3 =[];
                            foreach ($v as $vv){
                                $checkWin3 = Volunteer::query()->where('national_id',$vv["national_id"])->where('is_win', true)->get();
                                if (count($checkWin3) == 0){
                                    array_push($clearWin3, $vv);
                                }
                            }
                            shuffle($clearWin3);
                            if ($clearWin3 >= (7 - count($clearWin)) ){
                                $clearWin3 =  array_slice($clearWin3,0,(7 - count($clearWin)) );
                                return array_merge($clearWin , $clearWin3);
                            }else{
                                $clearWin = array_merge($clearWin , $clearWin3);
                                $v = Volunteer::query()->where('week_number',$request->week_number)
                                    ->where('correct',2)->orderBy('correct','desc')->get()->toArray();
                                $clearWin2 =[];
                                foreach ($v as $vv){
                                    $checkWin2 = Volunteer::query()->where('national_id',$vv["national_id"])->where('is_win', true)->get();
                                    if (count($checkWin2) == 0){
                                        array_push($clearWin2, $vv);
                                    }
                                }
                                shuffle($clearWin2);
                                if ($clearWin2 >= (7 - count($clearWin)) ){
                                    $clearWin2 =  array_slice($clearWin2,0,(7 - count($clearWin)) );
                                    return array_merge($clearWin , $clearWin2);
                                }else{
                                    $clearWin = array_merge($clearWin , $clearWin2);
                                    $v = Volunteer::query()->where('week_number',$request->week_number)
                                        ->where('correct',1)->orderBy('correct','desc')->get()->toArray();
                                    $clearWin1 =[];
                                    foreach ($v as $vv){
                                        $checkWin1 = Volunteer::query()->where('national_id',$vv["national_id"])->where('is_win', true)->get();
                                        if (count($checkWin1) == 0){
                                            array_push($clearWin2, $vv);
                                        }
                                    }
                                    shuffle($clearWin1);
                                    $clearWin1 =  array_slice($clearWin1,0,(7 - count($clearWin)) );
                                    return array_merge($clearWin , $clearWin1);
                                }
                            }
                        }
                    }
                }
            }
        }
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
