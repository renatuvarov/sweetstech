@extends('layouts.admin')

@section('title')
    <title>Все посты</title>
@endsection

@section('content')
<div class="container pt-5">
    <h2 class="display-4 text-center mb-5">Все посты</h2>
    <a href="{{ route('admin.blog.posts.create') }}" class="btn btn-success d-block w-25 m-auto">Создать пост (выставку)</a><br>
    @if(! empty($posts) && $posts->count() > 0)
    <table class="table table-striped">
        <thead>
            <tr class="text-center">
                <th>Заголовок</th>
                <th>Слаг</th>
                <th>Категория</th>
                <th>Тэги</th>
                <th>Управление</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr class="text-center">
                    <td class="align-middle" style="max-width: 300px;">{{$post->title_ru}}</td>
                    <td class="align-middle">{{$post->slug}}</td>
                    <td class="align-middle">{{$post->category->name_ru}}</td>
                    <td class="align-middle">
                        @if(! empty($post->tags) && $post->tags->count() > 0)
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Тэги
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    @foreach($post->tags as $tag)
                                        <li class="dropdown-item" type="button">{{ $tag->name_ru }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            ---
                        @endif
                    </td>
                    <td class="align-middle">
                        <div class="text-center" style="min-width: 150px">
                            <a href="{{ route('admin.blog.posts.show', ['post' => $post->id]) }}" class="btn btn-success">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.blog.posts.edit', ['post' => $post->id]) }}" class="btn btn-info">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button data-destroy="{{ route('admin.blog.posts.destroy', ['post' => $post->id]) }}" class="btn btn-danger btn-destroy">
                                <i class="fa fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        {{ $posts->links() }}
        <div class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Удалить пост (выставку)</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Продолжить?</p>
                        <form action="" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Ok</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p class="text-center">Постов пока нет.</p>
    @endif
</div>
@include('parts.admin.open-modal')
@endsection


