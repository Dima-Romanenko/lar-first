@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->

    <a href="{{ route('tasks.create') }}" class="btn btn-success">@lang('language.create_btn')</a>


        <a href="{{route('locale', 'en')}}" class="btn btn-primary">en</a>
        <a href="{{route('locale', 'ru')}}" class="btn btn-primary">ru</a>



    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                @lang('language.current_tasks')
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <!-- Заголовок таблицы -->
                    <thead>
                    <th>@lang('task')</th>
                    <th>&nbsp;</th>
                    </thead>

                    <!-- Тело таблицы -->
                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <!-- Имя задачи -->
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>

                            <td>
                                <!-- TODO: Кнопка Удалить -->
                                <form action="{{ url('task/'.$task->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> @lang('language.delete_btn')
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection
