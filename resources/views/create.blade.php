@extends('layout.main')

@section('create')
<form method="POST" action="{{ route('pc.store') }}" class="create-position">
    @csrf
    @method('post')
    <div class="car-year">
        <div class="car-style">
            <label for="exampleInputEmail">Masukan Nama Mobo</label><br>
            <input type="text" placeholder="Nama Mobo" name="mobo">
        </div>

        <div class="year-style">
            <label for="exampleInputEmail">Masukkan Nama Cpu</label><br>
            <input type="text" placeholder="Input Nomer" name="cpu">
        </div>
    </div>

        <div class="button-position">
            <button type="submit" class="btn-submit">Submit</button>
            <a class="btn-return" href="{{ route('pc.list')}}">Return</a>
        </div>  
</form>
@endsection