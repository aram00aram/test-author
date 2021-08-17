@extends('layouts.app')

@section('title', 'Список задач')

@section('content')

    <div class="row">
        @include("layouts.utils.messages")
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <form action="{{route("store")}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Название задачи</label>
                    <input
                        name="name"
                        type="text"
                        class="form-control @if($errors->has('name')) is-invalid @endif"
                        id="name"
                        placeholder="Название"
                        value="{{@old('name')}}"
                    >
                </div>
                <div class="form-group">
                    <label for="author">Автор</label>
                    <input
                        name="author"
                        type="text"
                        class="form-control @if($errors->has('author')) is-invalid @endif"
                        id="author"
                        placeholder="Автор"
                        value="{{@old('author')}}"
                    >
                </div>
                <div class="form-group">
                    <label for="status">Статус</label>
                    <select name="status" class="form-control" id="status">
                        @foreach($statuses as $status)
                            <option value="{{$status->id}}">{{$status->status}}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Создать</button>
                <a href="{{url()->previous()}}" class="btn btn-secondary">Назад</a>
            </form>
        </div>
    </div>

@endsection
