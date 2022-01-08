@extends('layouts.app')

@section('content')
<div class="container" style="background-color:rgb(245, 241, 242);padding:0%;border-radius:15px;">
<div style="text-align: center;background-color:#05AFAF;color:white;height:220px;border-top-left-radius:15px;border-top-right-radius:15px;display:block;justify-content:center;align-items:center">
    <h2 style="font-family:Poppins">Module 4</h2>
    <h4>To answer the following questions,<br/>
   
        read chapters 12-13 of the booklet “Now That You Are Born <br/>Again” by Rev. Chris Oyakhilome D.Sc. D.D.
         </h4>
</div>

<form method="post" action="{{ route('sub4') }}"> 
   @csrf
@foreach ($questions as  $indexKey =>$question)
<div class="card" style="padding-top:5%;padding-left:10%;padding-right:5%;padding-bottom:5%;background-color:rgb(245, 241, 242)">
<h4 style="color:#05AFAF;font-family:Poppins"> {{$indexKey+1}}. <span style="padding-left: 15px"> {{$question->question}}<span></h4>
<input type="hidden" name="virs[{{$indexKey+1}}]" value="{{$question->id}}" required>

<div style="display: inline-block;padding-top:5%">
      <input type="radio" id="h1{{$indexKey+1}} "name="answer[{{$indexKey+1}}]" value="{{$question->opt1}}" required>
    <label for="h1{{$indexKey+1}} " style="padding-left: 15px"><h4> <span style="padding-right:10px;"> a.</span> {{$question->opt1}}</h4></label><br></div>
    <div style="display: inline-block">
      <input type="radio" id="h2{{$indexKey+1}} "name="answer[{{$indexKey+1}}]" value="{{$question->opt2}}" required>
    <label for="h2{{$indexKey+1}} " style="padding-left: 15px"><h4><span style="padding-right:10px;"> b.</span> {{$question->opt2}}</h4></label><br></div>
    <div style="display: inline-block">
      <input type="radio" id="h3{{$indexKey+1}} "name="answer[{{$indexKey+1}}]" value="{{$question->opt3}}" required>
    <label for="h3{{$indexKey+1}} " style="padding-left: 15px"><h4> <span style="padding-right:10px;"> c.</span> {{$question->opt3}}</h4></label><br></div>
    <div style="display: inline-block">
      <input type="radio" id="h4{{$indexKey+1}} "name="answer[{{$indexKey+1}}]" value="{{$question->opt4}}" required>
    <label for="h4{{$indexKey+1}} " style="padding-left: 15px"><h4> <span style="padding-right:10px;"> d.</span> {{$question->opt4}}</h4></label><br></div>
</div>
    
@endforeach

<div style=" display:flex; justify-content:center;align-items:center;padding-top:30px;padding-bottom:30px">
    <button type="submit" style="background-color:#05AFAF;width:40%;height:60px;font-size:20px;color:#fff;border-radius:15px">Submit</button>
    
</div>
<form>
</div>
@endsection