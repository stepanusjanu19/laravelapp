@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Category</div>
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <form action="{{ route('category.store') }}" method="post">
                                @csrf
                                <div class="form-group form-kategori">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Masukkan nama kategori" value="{{ old('name') }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $validation }}</div>
                                    @enderror
                                </div>
                                <div class="form-group form-option">
                                    <select name="is_publish" id="is_publish" class="form-control @error('is_publish') is-invalid @enderror">
                                        <option value="">Pilih </option>
                                        <option value=0>Non Active</option>
                                        <option value=1>Active</option>
                                    </select>
                                    @error('is_publish')
                                        <div class="alert alert-danger">{{ $validation }}</div>
                                    @enderror
                                </div>
                                <div class="form-group d-flex">
                                    <button type="submit" class="btn btn-success mr-3">Ya</button>
                                    <a href="{{ route('category.index') }}" class="btn btn-danger mr-3">No</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
