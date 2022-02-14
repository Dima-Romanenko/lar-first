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

                            <td class="d-f">
                                <!-- TODO: Кнопка Удалить -->
                                <form action="{{ route('tasks.delete',$task->id) }}" method="post">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-danger" value="@lang('language.delete_btn')">
                                </form>
                                <!-- TODO: Кнопка Изменить -->
                                <form action="{{ route('tasks.edit', $task->id) }}" method="post">
                                    {{ method_field('get') }}
                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-warning" value="Обновить">
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
