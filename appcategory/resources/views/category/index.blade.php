@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Category</div>
                <div class="card-body">
                    <div class="container">
                        <div class="row css-row mb-5">
                            <a href="{{ route('category.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                        </div>
                        <div class="row mb-3">
                            <form action="{{ route('category.search') }}" method="GET" class="form-group d-flex">
                                <input type="text" class="form-control form-input mr-3" name="cari" placeholder="Cari Nama Kategori .." value="{{ old('cari') }}">
                                <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        @if(session()->get('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                        @endif

                        <div class="row">
                            @if(isset($category))
                            <table class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($category as $item)
                                        <tr>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                @php
                                                    $data = $item->is_publish;
                                                    if($data == 0)
                                                    {
                                                        echo "Non Active";
                                                    }
                                                    else
                                                    {
                                                        echo "Active";
                                                    }
                                                @endphp
                                            </td>
                                            <td>
                                                <div class="row justify-content-center">
                                                    <a href="category/edit/{{ $item->id }}" class="btn btn-info mr-3"><i class="fa fa-edit fa-fw"></i></a>
                                                    <a href="category/hapus/{{ $item->id }}" class="btn btn-danger mr-3"><i class="fa fa-trash-o fa-fw"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {!! $category->render() !!}@endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
