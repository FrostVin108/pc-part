@extends('layout.main')

@section('ramcreate')
<div style="margin-left: 50px; margin-right: 100px;">

    <form method="POST" action="{{ route('ram.store') }}" class="create-position">
        @csrf
        @method('post')
        
            <div cclass="form-group">
                <label for="exampleInputEmail">Masukan Banyak ram</label><br>
                <input class="form-control @error('ram') is-invalid @enderror" type="text" placeholder="Masukkan banyak ram" name="ram">
            </div>
            @error('ram')
            <div class="alert alert-danger mt-2">
                Invalid, Input tidak terisi!
            </div>
            @enderror

            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
                <a class="btn btn-warning" href="{{ route('ram.index')}}">Return</a>
            </div>  
    </form>

</div>
@endsection