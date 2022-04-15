@extends('layouts.app')
@section('content')
<div class="form-example-area" style="margin-top:30px">
    <div class="container">
        <div class="row">
            <form action="{{route('faq.update')}}" method="post">
            @csrf
            <div class="col-sm-12">
                <div class="form-example-wrap">
                    <div class="form-example-int">
                        <div class="form-group">
                            <label>Question</label>
                            <div class="nk-int-st">
                                <input type="text" name="question" value="{{$faq->question}}" class="form-control input-sm" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Answer</label>
                            <div class="nk-int-st">
                                <input type="text" name="answer" value="{{$faq->answer}}" class="form-control input-sm" required>
                            </div>
                        </div>
                    </div>                 
                    <input type="hidden" name="id" value="{{$faq->id}}">                                                                
                    <button type="submit" class="btn btn-success notika-btn-success">Submit</button>
                    <a href="{{url()->previous()}}" class="btn btn-danger notika-btn-success">Back</a>
                </div>
            </div>
            </form>
        </div>           
    </div>
</div> 

@endsection