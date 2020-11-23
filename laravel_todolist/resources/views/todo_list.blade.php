<h1>ToDo List</h1>

<head>
  <link href="style.css" rel="stylesheet">
</head>

<body>
   <div>
       <h2>タスクの一覧</h2>
       <a href="/create-page">タスクを追加</a>
       <table border="1">
          <tr>
              <th>タスクの名前</th>
              <th>タスクの説明</th>
              <th>担当者の名前</th>
              <th>見積時間(h)</th>
              <th colspan="2">操作</th>
          </tr>
          @foreach($todos as $todo)
          <tr>
              <td>{{$todo->task_name}}</td>
              <td>{{$todo->task_description}}</td>
              <td>{{$todo->assign_person_name}}</td>
              <td>{{$todo->estimate_hour}}</td>
              <td><a href="/edit-page/{{$todo->id}}">編集</a></td>
              <td><a href="/delete-page/{{$todo->id}}">削除</a></td>
          </tr>
          @endforeach
      </table>
      <p>
          見積時間の合計(h)：{{$estimate_hour_sum}}
      </p>
  </div>
</body>

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
    background: #4699ca;
    color: #fff;
    border-radius: 3px;
    padding: 1px 2px;
    margin: 1px 1px;
  }
  a:hover {
    background: #636b6f;
  }
</style>
