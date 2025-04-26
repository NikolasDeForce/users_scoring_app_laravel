@extends('layouts.headers')
@section('content')
<div>
    <h1>Список клиентов</h1>
</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">№</th>
      <th scope="col">Имя</th>
      <th scope="col">Фамилия</th>
      <th scope="col">Email</th>
      <th scope="col">Скоринг</th>
      <th scope="col">Действие</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->first_name }}</td>
      <td>{{ $user->last_name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->scoring }}</td>
      <td>
      <a class="btn btn-success" href="{{ route('users.show', $user->id) }}">Все данные</a>  
      <a class="btn btn-warning" href="{{ route('users.edit', $user->id) }}">Изменить</a>
    </td>
    </tr>
    @endforeach
    <div class="mb-3">
      <a class="btn btn-primary" href="{{ route('users.create') }}">Добавить нового клиента</a>
    </div>
  </tbody>
</table>
@endsection