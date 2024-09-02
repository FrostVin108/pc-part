@extends('layout.main')

@section('gpuedit')
<div style="margin-left: 50px; margin-right: 100px;">

    <form method="POST" action="{{ route('gpu.store') }}" class="create-position">
        @csrf
        @method('post')
        
            <div class="form-group">
                <label for="exampleInputEmail">Masukan Banyak gpu</label><br>
                <input class="form-control" type="text" placeholder="Masukkan banyak gpu" name="gpu" value="{{ old('gpu', $gpus->gpu) }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-warning">reset</button>
                <a class="btn btn-warning" href="{{ route('gpu.index')}}">Return</a>
            </div>  
    </form>

</div>
@endsection