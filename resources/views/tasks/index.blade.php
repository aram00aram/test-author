@extends('layouts.app')

@section('title', 'Список задач')

@section('content')
    
    <div class="row mb-4 justify-content-end">
        <div class="col-md-3">
            <a href="{{route("create")}}" class="btn btn-secondary">Новая задача</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control filter" name="filter_author">
                         <option value="all">Все авторы</option>
                            @foreach($authors as $author)
                                <option value="{{$author}}" @if(!empty($filterAuthor) && $filterAuthor == $author) selected @endif>{{$author}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <select class="form-control filter" name="filter_status">
                            <option value="all">Все статусы</option>
                            @foreach($statuses as $status)
                                <option value="{{$status->id}}" @if(!empty($filterStatus) && $filterStatus == $status->id) selected @endif>{{$status->status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Название задачи</th>
                    <th scope="col">Автор</th>
                    <th scope="col">Статус</th>
                </tr>
                </thead>
                <tbody id="big">
                @if(count($tasks) > 0)
                    @foreach($tasks as $task)
                        <tr>
                            <th scope="row">
                                <button class="btn btn-outline-danger button__delete" data-task="{{$task->id}}">X
                                </button>
                            </th>
                            <td>{{$task->name}}</td>
                            <td>{{$task->author}}</td>
                            <td>{{$task->status->status}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th></th>
                        <th colspan="3">Empty</th>
                    </tr>
                @endif
                </tbody>
            </table>
            <div class="row justify-content-center">
                <div class="col-md-4">
                    {{$tasks->links("vendor.pagination.bootstrap-4")}}
                </div>
            </div>
        </div>
    </div>

@endsection

@section("js")
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        document.querySelectorAll(".button__delete").forEach(function (item) {
            item.addEventListener("click", function (e) {
                let answer = window.confirm("Хотите удалить задачу?");
                let big = document.querySelector("#big");
                let child = this.parentElement.parentElement;
                let id = $(this).data("task");
                if (answer) {

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    e.preventDefault();
                    $.ajax({
                        type: "DELETE",
                        url: `{{route("task.destroy")}}`,
                        dataType: 'json',
                        data: {
                            "_method": 'delete',
                            "id": id,
                        },
                        success: function (data) {
                            if (data.success) {
                                toastr["success"](data.message)
                                big.removeChild(child)
                            } else {
                                toastr["error"](data.message)
                            }
                        }
                    });
                }
            })
        })


        $(".filter").on('change',function (e) {
            e.preventDefault()
          let author =   $('select[name="filter_author"]').val()
          let status =   $('select[name="filter_status"]').val()
          let filter = '/filter'+'/'+status +'/'+author
            
                window.location.href = filter;
        })
    </script>
@endsection
