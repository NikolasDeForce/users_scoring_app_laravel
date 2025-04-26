@extends('layouts.headers')
@section('content')
<div>
    <h1>Полная информация о клиенте</h1>
</div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Имя</th>
      <th scope="col">Фамилия</th>
      <th scope="col">Номер телефона</th>
      <th scope="col">Email</th>
      <th scope="col">Образование</th>
      <th scope="col">Согласие на обработку данных</th>
      <th scope="col">Скоринг</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->first_name }}</td>
      <td>{{ $user->last_name }}</td>
      <td>{{ $user->phone }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->education }}</td>
      <td>{{ $user->is_accept_data }}</td>
      <td>{{ $user->scoring }}</td>
    </tr>
  </tbody>
</table>
<div class="mb-3">
    <a href="{{ route('users.edit', $user->id) }}">
        <button type="button" class="btn btn-secondary">Изменить</button>
    </a>
</div>
<div class="mb-3">
    <form action="{{ route('users.destroy', $user->id) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Удалить" class="btn btn-danger"> 
    </form>
</div>
@endsection