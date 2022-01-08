<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\User;
use Auth;
use Image;
use Str;
use Illuminate\Support\Facades\Storage;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {if(Auth::user()->res3 >=80){
        User::where('id', Auth::user()->id)->update(['completed' => true]);
     }
       $varcom= Auth::user()->completed;
       if($varcom){
        $sta1="Passed";
        $sta2="Passed";
        $sta3="Passed";
        $sta4="Passed";
      

          
        $xxr=Str::length(Auth::user()->name);
       $xyz=Auth::user()->name;
        $img = Image::make(public_path('img/cert.jpeg'));  
        $img->text(Auth::user()->name, 297.5, 528, function($font) {  
       
     
            $font->file(public_path('font/Roboto-Medium.ttf')); 
           
           $font->size(595/(Str::length(Auth::user()->name)));  
           if(Str::length(Auth::user()->name) <17){
            $font->size(48);
        }
           $font->color('#000000');  
           $font->align('center');  
           $font->valign('bottom');  
            
       });  
      
       
        $img->save(public_path('img/'.$xyz.'.jpg'));  
         
        return view('home')->with(['stack'=>$varcom,'sta1'=>$sta1,'sta2'=>$sta2,'sta3'=>$sta3,'sta4'=>$sta4]);
       }else{
        $status="";
        $sta1="Pending";
        $sta2="Pending";
        $sta3="Pending";
        $sta4="Pending";
      

           if(Auth::user()->result >=80){
            $status="You can attempt Module 2";
            $sta1="Completed";

           };
           if(Auth::user()->res1 >=80){
            $status='You can attempt Module 3';
            $sta2="Completed";

           };
           if(Auth::user()->res2 >=80){
            $status='You can attempt Module 4';
            $sta3="Completed";

           };
        

           
          
           
        return view('home')->with(['status'=>$status,'sta1'=>$sta1,'sta2'=>$sta2,'sta3'=>$sta3,'sta4'=>$sta4]);
       }
        
    }
    public function mod1(){
        $status="To answer the following questions, read chapters 1-3 of the booklet “Now That You Are Born Again” by Rev. Chris Oyakhilome D.Sc. D.D.";
        $questions=Module::where('moduleno', '=', 1)->get();
        return view('module1')->with(['questions'=>$questions,'status'=>$status]);
    }
    public function sub1(Request $request){
        $score=0;
      
      $y = $request->input('virs');
      $xr=count($y);
    
         foreach($y as $key => $value){
            
            $yar=$key;
             $question=Module::where('id', '=', $value)->value('correct');
            $var2=Module::where('id', '=', $value)->value($question);
            $x= $request->input('answer');
            $userCorrectAnswers = 0;
      
                if( $x[$yar]==$var2){

                    $score++;
                }
                $perc=($score/$xr)*100;
            
           }
     User::where('id', Auth::user()->id)->update(['result' => $perc]);
     return $this->index();

}


public function mod2(Request $request){
    $first=Auth::user()->result;
   
    $status="To answer the following questions, read chapters 4-8 of the booklet “Now That You Are Born Again” by Rev. Chris Oyakhilome D.Sc. D.D.";
    $questions=Module::where('moduleno', '=', 2) ->get();
    return view('module2')->with(['questions'=>$questions,'status'=>$status]);
}
public function sub2(Request $request){
    $score=0;
  
  $y = $request->input('virs');
  $xr=count($y);
     foreach($y as $key => $value){
        
        $yar=$key;
         $question=Module::where('id', '=', $value)->value('correct');
        $var2=Module::where('id', '=', $value)->value($question);
        $x= $request->input('answer');
        $userCorrectAnswers = 0;
  
            if( $x[$yar]==$var2){

                $score++;
            }
            $perc=($score/$xr)*100;
        
       }
 User::where('id', Auth::user()->id)->update(['res1' => $perc]);
 return $this->index();

}

public function mod3(Request $request){
    $status="To answer the following questions, read chapters 9-11 of the booklet “Now That You Are Born Again” by Rev. Chris Oyakhilome D.Sc. D.D.";
    $questions=Module::where('moduleno', '=', 3) ->get();
    return view('module3')->with(['questions'=>$questions,'status'=>$status]);
}
public function sub3(Request $request){
    $score=0;
  
  $y = $request->input('virs');
  $xr=count($y);
     foreach($y as $key => $value){
        
        $yar=$key;
         $question=Module::where('id', '=', $value)->value('correct');
        $var2=Module::where('id', '=', $value)->value($question);
        $x= $request->input('answer');
        $userCorrectAnswers = 0;
  
            if( $x[$yar]==$var2){

                $score++;
            }
            $perc=($score/$xr)*100;
        
       }
 User::where('id', Auth::user()->id)->update(['res2' => $perc]);
 return $this->index();

}
public function mod4(Request $request){
    $status="To answer the following questions, read chapters 12-13 of the booklet “Now That You Are Born Again” by Rev. Chris Oyakhilome D.Sc. D.D.";
    $questions=Module::where('moduleno', '=', 4) ->get();
    return view('module4')->with(['questions'=>$questions,'status'=>$status]);
}
public function sub4(Request $request){
    $score=0;
  
  $y = $request->input('virs');
  $xr=count($y);
     foreach($y as $key => $value){
        
        $yar=$key;
         $question=Module::where('id', '=', $value)->value('correct');
        $var2=Module::where('id', '=', $value)->value($question);
        $x= $request->input('answer');
        $userCorrectAnswers = 0;
  
            if( $x[$yar]==$var2){

                $score++;
            }
            $perc=($score/$xr)*100;
        
       }
 User::where('id', Auth::user()->id)->update(['res3' => $perc]);
 if($perc>=80){
    User::where('id', Auth::user()->id)->update(['completed' => true]);
 }
 return $this->index();

}}