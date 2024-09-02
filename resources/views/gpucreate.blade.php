@extends('layout.main')

@section('gpucreate')
<div style="margin-left: 50px; margin-right: 100px;">

    <form method="POST" action="{{ route('gpu.store') }}" class="create-position">
        @csrf
        @method('post')
        
            <div cclass="form-group">
                <label for="exampleInputEmail">Masukan Nama gpu</label><br>
                <input class="form-control" type="text" placeholder="Masukkan mama gpu" name="gpu">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-warning" href="{{ route('gpu.index')}}">Return</a>
            </div>  
    </form>

</div>
@endsection