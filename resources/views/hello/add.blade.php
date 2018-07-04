@extends('layouts.helloapp')

@section('title','Add')

@section('menuber')
   @parent
   新規ページ
@endsection

@section('content')
  <table>
     <form action="/hello/add" method="POST">
        {{csrf_field()}}
        <tr>
           <th>name: </th><td><input type="text" name="name"></td>
        </tr>
        <tr>
           <th>mail: </th><td><input type="text" name="mail"></td>
        </tr>
        <tr>
           <th>age: </th><td><input type="text" name="age"></td>
        </tr>
        <tr>
           <th></th><td><input type="submit" name="send"></td>
        </tr>
     </form>
  </tabble>
@endsection

@section('footer')
   copyright 2017 tuyano.
@endsection