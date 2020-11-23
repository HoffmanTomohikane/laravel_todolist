<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToDo;  // 追加

class TodolistFormController extends Controller
{
        // タスクを一覧で表示
     public function index()
     {
         $todos = Todo::orderBy('id', 'asc')->get();

         // 見積時間の合計を求める
         $estimate_hour_sum = 0;
         foreach ($todos as $todo){
             $estimate_hour_sum += $todo->estimate_hour;
         }

        return view('todo_list', [
            "todos" => $todos,
            "estimate_hour_sum" => $estimate_hour_sum
        ]);
     }

         // タスク作成画面を表示
    public function createPage()
    {
        return view('todo_create');
    }

        // タスクを登録
    public function create(Request $request)
   {
        $validator = $request->validate([
            'task_name' => 'required',
            'task_description' => 'required',
            'assign_person_name' => 'required',
            'estimate_hour' => 'required'
        ]);


       $todo = new Todo();
       $todo->task_name = $request->task_name;
       $todo->task_description = $request->task_description;
       $todo->assign_person_name = $request->assign_person_name;
       $todo->estimate_hour = $request->estimate_hour;
       $todo->save();

       return redirect('/');
   }

        // タスク編集画面を表示
    public function editPage($id)
    {
        $todo = Todo::find($id);
        return view('todo_edit', [
            "todo" => $todo
        ]);
    }

        // タスクを更新
    public function edit(Request $request)
    {
        Todo::find($request->id)->update([
            'task_name' => $request->task_name,
            'task_description' => $request->task_description,
            'assign_person_name' => $request->assign_person_name,
            'estimate_hour' => $request->estimate_hour
        ]);
        return redirect('/');
    }

        // タスク削除画面を表示
      public function deletePage($id)
      {
          $todo = Todo::find($id);
          return view('todo_delete', [
              "todo" => $todo
          ]);
      }

        // タスクを削除
      public function delete($id)
      {
          Todo::find($id)->delete();
          return redirect('/');
      }

}
