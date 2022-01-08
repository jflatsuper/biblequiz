@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
     
        <div class="col-md-12" >
            <div class="card"  style="font-family: Poppins">
                <div style="text-align:center;"class="card-header">{{ __('Instructions') }}</div>

                <div class="card-body">
                    <strong>
                        Here, you’ll be able to test your knowledge on the vital new-creation realities taught by Pastor Chris Oyakhilome in the booklet, Now That You Are Born Again.<br/>
                        The quizzes are divided into four modules.<br/>
                        You will be required to get a minimum score of 80% in every module before you proceed to the next one.<br/>
                        Your successful completion of the four modules will earn you a Rhapsody of Realities Bible (hard copy) and a certificate of accomplishment.<br/><br/>
                        
                        
                        </strong>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   


                    {{-- {{ __('You are logged in!') }} --}}
                   

                </div>
            </div>
            <div>
                @if ($status ?? '')
                <div class="alert alert-success" style="text-align:center"role="alert">
                    {{ $status}}
                </div>
                @endif
            </div>
        </div>
       
    </div>
    <div  class="col-md-12" style="font-family: Poppins">
       
        
        <div class="row mods" >
            <div class="col-md-8">            <a href="{{ route('mod1')}}" class="btn btn-warning">Module 1</a></div>
            <div>@if ($sta1 ?? '')
                <div class="alert alert-success" style="text-align:center"role="alert">
                    {{ $sta1}}
                </div>
                @endif
            </div>

        </div>
        <div class="row mods">  <div class="col-md-8">  
            <a href="{{ route('mod2')}}" class="btn btn-warning">Module 2</a> </div>
            <div>@if ($sta2 ?? '')
                <div class="alert alert-success" style="text-align:center"role="alert">
                    {{ $sta2}}
                </div>
                @endif
            </div>
           
           
        </div>
        <div class="row mods">  <div class="col-md-8">  
            <a href="{{ route('mod3')}}" class="btn btn-warning">Module 3</a></div>
            <div>@if ($sta3 ?? '')
                <div class="alert alert-success" style="text-align:center"role="alert">
                    {{ $sta3}}
                </div>
                @endif
            </div>
        </div>
        <div class="row mods">  <div class="col-md-8">  
            <a href="{{ route('mod4')}}" class="btn btn-warning">Module 4</a></div>
            <div>@if ($sta4 ?? '')
                <div class="alert alert-success" style="text-align:center"role="alert">
                    {{ $sta4}}
                </div>
                @endif
            </div>
        </div>
        @if($stack ?? '' )
        <p>Congratulations on completing the course. You can retake any of the quizzes at your convenience. Click the button below to download your certificate of completion</p>

        <a class="btn btn-primary" id="download" href="img/{{Auth::user()->name}}.jpg" download="{{Auth::user()->name}}.jpg" >Download</a>
        
        @endif
        </div>
  
</div>
@endsection
