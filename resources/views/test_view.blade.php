@extends('layouts.main')

@section('title')
    My Page
@endsection

@section('content')
<div class="row">
   <div class="col-md-12">
       <h1>You are welcome</h1>
       <form method="post">
           {{ csrf_field() }}
           <input type="text" name="fullname">
           <button type="submit">Submit</button>
       </form>
   </div>
</div>
@endsection




