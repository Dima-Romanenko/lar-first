@extends('layouts.app')

@section('content')

    <!-- Bootstrap шаблон... -->

    <div class="panel-body">
        <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="form-horizontal">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        <!-- Имя задачи -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">@lang('language.task')</label>

                <div class="col-sm-6">
                    @if(count($errors)>0)
                        <input type="text" name="name" id="task" class="form-control" value="{{ $task->name }}">
                    @else
                        <input type="text" name="name" id="task" class="form-control" value="{{ old('name') }}">
                    @endif
                </div>
            </div>

            <!-- Кнопка добавления задачи -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> @lang('language.add_btn')
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection


