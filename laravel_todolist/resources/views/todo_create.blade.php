<h1>ToDo List</h1>
<div>
    <h2>タスクを追加</h2>
    <form method="POST" action="/create">
        @csrf
        @if ($errors->any())
            <ul>
            @foreach ($errors->all() as $error)
               <li style="color:red">{{$error}}</li>
            @endforeach
            </ul>
        @endif
        <p>
            タスクの名前：<input type="text" name="task_name">
        </p>
        <p>
            タスクの説明：<input type="text" name="task_description">
        </p>
        <p>
            担当者の名前：<input type="text" name="assign_person_name">
        </p>
        <p>
            見積時間(h)：<input type="number" name="estimate_hour">
        </p>
        <input type="submit" name="create" value="追加">
    </form>
    <a href="/">戻る</a>
</div>

<style>
  h1 {
    color: #636b6f;
  }
  h2 {
    color: #000000;
  }
  body {
    background-color: #dbedf0;
    justify-content: center;
    margin: 250px 690px;
  }
  tr {
    background-color: #fff;
  }
  a {
    font-size: 1.05rem;
    background: #0bd;
    color: #fff;
    border-radius: 10px;
    padding: 1px 2px;
    margin: 1px 1px;
  }
  a:hover {
    background: #636b6f;
  }
  input {
    font-size: 1.05rem;
    background: #4699ca;
    color: #fff;
    border-radius: 10px;
    padding: 1px 2px;
    margin: 1px 1px;
  }
  input:hover {
    background: #636b6f;
  }
</style>
