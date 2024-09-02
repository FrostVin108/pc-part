@extends('layout.main')

@section('create')
<form method="POST" action="{{ route('pc.store') }}" class="create-position">
    @csrf
    @method('post')
    
        <div cclass="form-group">
            <label for="exampleInputEmail">Masukan Nama Mobo</label><br>
            <input class="form-control" type="text" placeholder="Nama Mobo" name="mobo">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail">Masukkan Nama Cpu</label><br>
            <input class="form-control" type="text" placeholder="Masukkan Cpu" name="cpu">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail">Masukkan banyak Ram </label><br>
            {{-- <input class="form-control" type="text" placeholder="Masukkan Ram" name="ram"> --}}
            <select name="ram_id" class="form-control">
                @foreach ($rams as $ram )
                    <option value="{{$ram->id}}">{{$ram->ram}}</option> 
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail">Masukkan Nama gpu</label><br>
            {{-- <input class="form-control" type="text" placeholder="Masukkan Gpu" name="gpu"> --}}
            <select name="gpu_id" class="form-control">
                @foreach ($gpus as $gpu )
                    <option value="{{$gpu->id}}">{{$gpu->gpu}}</option> 
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail">Masukkan Berapa Besar Storage HDD</label><br>
            <input class="form-control" type="text" placeholder="Masukkan HDD" name="hdd">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail">Masukkan Berapa Besar Storage SSD</label><br>
            <input class="form-control" type="text" placeholder="Masukkan Ssd" name="ssd">
        </div>
        
        <div class="form-group">
            <label for="exampleInputEmail">Besar Wat PSU</label><br>
            <input class="form-control" type="text" placeholder="Masukkan Psu" name="psu">
        </div>
        
    

        <divclass="form-group">
            <button type="submit" class="btn btn-success">Submit</button>
            <a class="btn btn-warning" href="{{ route('pc.index')}}">Return</a>
        </div>  
</form>
@endsection