@extends('layouts.admin')

@section('title')
    <title>Все производители</title>
@endsection

@section('content')
    <div class="container text-center">
        <h2 class="h2 mb-5 display-4">Все производители</h2>
        <a href="{{route('admin.manufacturer.create')}}" class="btn btn-success d-block w-25 m-auto">Добавить</a>
        @if(! empty($manufacturers) && $manufacturers->count() > 0)
            <table class="table table-bordered table-hover mt-5">
                <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование (eng)</th>
                    <th scope="col">Наименование (ru)</th>
                    <th scope="col">Слаг</th>
                    <th scope="col">Управление</th>
                </tr>
                </thead>
                <tbody>
                @foreach($manufacturers as $manufacturer)
                    <tr>
                        <td class="align-middle">{{$manufacturer->id}}</td>
                        <td class="align-middle">{{$manufacturer->name_en}}</td>
                        <td class="align-middle">{{$manufacturer->name_ru}}</td>
                        <td class="align-middle">{{$manufacturer->slug}}</td>
                        <td class="align-middle">
                            <a class="btn btn-info" href="{{ route('admin.manufacturer.edit', ['manufacturer' => $manufacturer->id]) }}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <button data-destroy="{{ route('admin.manufacturer.destroy', ['manufacturer' => $manufacturer->id]) }}" type="button" class="btn btn-danger btn-destroy">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p class="mt-5">Пока производителей нет.</p>
        @endif
        {{ $manufacturers->links() }}
    </div>
    <div class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Удалить производителя</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Продолжить?</p>
                    <form action="" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $('.btn-destroy').on('click', function () {
            $('.modal').find('form').attr('action', $(this).data('destroy'));
            $('.modal').modal();
        });
    </script>
@endpush
