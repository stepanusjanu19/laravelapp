@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Category</div>
                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <form action="{{ route('category.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $edit->id }}"> <br/>
                                <div class="form-group form-kategori">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama kategori" value="{{ $edit->name }}">
                                </div>
                                <div class="form-group form-option">
                                    <select name="is_publish" id="is_publish" class="form-control">
                                        <option value="">Pilih </option>
                                        <option @php if($edit->is_publish == 0){echo "selected"; } @endphp value=0>Non Active</option>
                                        <option @php if($edit->is_publish == 1){echo "selected"; } @endphp value=1>Active</option>
                                    </select>
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
