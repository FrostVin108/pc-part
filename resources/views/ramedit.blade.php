@extends('layout.main')

@section('ramedit')
<div style="margin-left: 50px; margin-right: 100px;">

    <form method="POST" action="{{ route('ram.update', $rams->id) }}" class="create-position">
        @csrf
        @method('put')
        
            <div class="form-group">
                <label for="exampleInputEmail">Masukan Banyak ram</label><br>
                <input class="form-control" type="text" placeholder="Masukkan banyak ram" name="ram" value="{{ old('ram', $rams->ram) }}">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-warning">reset</button>
                <a class="btn btn-warning" href="{{ route('ram.index')}}">Return</a>
            </div>  
    </form>

</div>
@endsection