<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\HelloRequest;
use Validator;
use Illuminate\Support\Facedes\DB;

class HelloController extends Controller {
  
   public function index(Request $request) {
      $items = \DB::table('people2')->get();
      return view('hello.index',['items' => $items]);
   }

   public function post(HelloRequest $request) {
      $items = \DB::select('select * from people2');
      return view('hello.index',['items' => $items]);
    }

    public function add(Request $request){
        return view('hello.add');
    }

    public function create(Request $request){
        $param = [
            'name' => $request->name,
            'mail' => $request->mail,
            'age' => $request->age,
        ];
        \DB::insert('insert into people2 (name,mail,age) values(:name,:mail,:age)',$param);
        return redirect('/hello');
    }

    public function edit(Request $request){
     $param = ['id' => $request->id];
     $item = \DB::select('select * from people2 where id = :id', $param);
     return view('hello.edit', ['form' => $item[0]]);
    }

    public function update(Request $request){
     $param = [
         'id' => $request->id,
         'name' => $request->name,
         'mail' => $request->mail,
         'age' => $request->age,
     ];
     \DB::update('update people2 set name =:name, mail = :mail, age = :age where id = :id', $param);
     return redirect('/hello');
    }

    public function del(Request $request){
     $param = ['id' => $request->id];
     $item = \DB::select('select * from people2 where id = :id', $param);
     return view('hello.del', ['form' => $item[0]]);
   }

   public function remove(Request $request){
     $param = ['id' => $request->id];
     \DB::delete('delete from people2 where id = :id', $param);
     return redirect('/hello');
   }

   public function show(Request $request){
     $id = $request->id;
     $items = \DB::table('people2')->where('id','<=',$id)->get();
     return view('hello.show', ['items' => $items]);
   }
}
