@extends('layout.main')

@section('gpucreate')
<div style="margin-left: 50px; margin-right: 100px;">

    <form method="POST" action="{{ route('gpu.store') }}" class="create-position">
        @csrf
        @method('post')
        
            <div cclass="form-group">
                <label for="exampleInputEmail">Masukan Nama gpu</label><br>
                <input class="form-control @error('gpu') is-invalid @enderror" type="text" placeholder="Masukkan mama gpu" name="gpu">
            </div>
            @error('gpu')
            <div class="alert alert-danger mt-2">
                Invalid, Input tidak terisi!
            </div>
            @enderror

            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-warning" href="{{ route('gpu.index')}}">Return</a>
            </div>  
    </form>

</div>
@endsection