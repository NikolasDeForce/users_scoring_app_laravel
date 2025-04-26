@extends('layouts.headers')
@section('content')
<form action="{{ route('users.update', $user->id) }}" method="post">
  @csrf
  @method('patch')
  <div class="mb-3">
    <label for="firs_name" class="form-label">Имя</label>
    <input type="text" name="first_name" class="form-control" id="first_name">
  </div>
  <div class="mb-3">
    <label for="last_name" class="form-label">Фамилия</label>
    <input type="text" name="last_name" class="form-control" id="last_name">
  </div>
  <div class="mb-3">
    <label for="phone" class="form-label">Номер телефона</label>
    <input type="tel" name="phone" class="form-control" id="phone">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="email">
  </div>
  <div class="mb-3">
      <label for="education" class="form-label">Выберите образование</label>
      <select id="education" name="education" class="form-select">
        <option>Высшее образование</option>
        <option>Специальное образование</option>
        <option>Среднее образование</option>
      </select>
    </div>
  <div class="mb-3 form-check">
    <input type="checkbox"  name="is_accept_data" value="true" class="form-check-input" id="is_accept_data">
    <label class="form-check-label" for="is_accept_data">Я даю согласие на обработку моих личных данных</label>
  </div>
  <div class="mb-3">
  <button type="submit" class="btn btn-primary">Отправить</button>
  </div>
</form>
<div class="mb-3">
      <a class="btn btn-secondary" href="{{ route('users.index') }}">На главную</a>
</div>
@endsection