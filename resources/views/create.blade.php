@extends('layout.main')

@section('create')
<form method="POST" action="{{ route('pc.store') }}" class="create-position">
    @csrf
    @method('post')
    
        <div cclass="form-group">
            <label for="exampleInputEmail">Masukan Nama Mobo</label><br>
            <input class="form-control @error('mobo') is-invalid @enderror" type="text" placeholder="Nama Mobo" name="mobo">
        </div>
        @error('mobo')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
        @enderror

        <div class="form-group">
            <label for="exampleInputEmail">Masukkan Nama Cpu</label><br>
            <input class="form-control @error('cpu') is-invalid @enderror" type="text" placeholder="Masukkan Cpu" name="cpu">
        </div>
        @error('cpu')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
        @enderror

        <div class="form-group">
            <label for="exampleInputEmail">Masukkan banyak Ram </label><br>
             {{-- <input class="form-control" type="text" placeholder="Masukkan Ram" name="ram">  --}}
            <select name="ram_id" class="form-control @error('ram_id') is-invalid @enderror" aria-placeholder="text">
                <option value="">pilih ram</option> 
                @foreach ($rams as $ram)
                    <option value="{{$ram->id}}">{{$ram->ram}}</option> 
                @endforeach
            </select>
        </div>
        @error('ram_id')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
        @enderror
        
        <div class="form-group">
            <label for="exampleInputEmail">Masukkan Nama gpu</label><br>
            {{-- <input class="form-control " type="text" placeholder="Masukkan Gpu" name="gpu_id"> --}}
            <select name="gpu_id" class="form-control @error('gpu_id') is-invalid @enderror">
                <option value="">pilih Gpu</option> 
                @foreach ($gpus as $gpu )
                    <option value="{{$gpu->id}}">{{$gpu->gpu}}</option> 
                @endforeach
            </select>
        </div>
        @error('gpu_id')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
        @enderror
        
        <div class="form-group">
            <label for="exampleInputEmail">Masukkan Berapa Besar Storage HDD</label><br>
            <input class="form-control " type="text" placeholder="Masukkan HDD" name="hdd">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail">Masukkan Berapa Besar Storage SSD</label><br>
            <input class="form-control " type="text" placeholder="Masukkan Ssd" name="ssd">
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail">Besar Wat PSU</label><br>
            <input class="form-control @error('psu') is-invalid @enderror" type="text" placeholder="Masukkan Psu" name="psu">
        </div>
        @error('psu')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
        @enderror
        
    

        <divclass="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            <a class="btn btn-warning" href="{{ route('pc.index')}}">Return</a>
        </div>  
</form>
@endsection