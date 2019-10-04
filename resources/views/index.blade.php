<!DOCTYPE html>
<html>
<head>
    <title>Insert</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container">

        
        <form method="POST" action="/submit">
            @csrf
        <h1 class="mt-3" style="text-align: center">Insert</h1>
        <div id="card1" class="row my-5">
            <div class="col-lg-3"></div>
            <div  class="card col-lg-6">
                            <div class="card-body">
                                            <div class="form-group">
                                              <label for="nama">Nama</label>
                                              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama"value="{{old('nama')}}">
                                              @error('nama') <div class="invalid-feedback">{{$message}}</div> @enderror
                                            </div>
                                            <div class="form-group">
                                              <label for="username">Username</label>
                                              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukkan Username" name="username"value="{{old('username')}}">
                                              @error('nama') <div class="invalid-feedback">{{$message}}</div> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password" name="password" value="{{old('password')}}">
                                                @error('password') <div class="invalid-feedback">{{$message}}</div> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email" value="{{old('email')}}">
                                                 @error('email') <div class="invalid-feedback">{{$message}}</div> @enderror
                                           </div>
                                            <div class="form-group">
                                                <label for="telefon">Nomor Telefon</label>
                                                <input type="text" class="form-control @error('telefon') is-invalid @enderror" id="telefon" placeholder="Masukkan Nomor Telefon" name="telefon" value="{{old('telefon')}}">
                                                 @error('telefon') <div class="invalid-feedback">{{$message}}</div> @enderror
                                           </div>
                                            <div class="form-group">
                                                <div class="dropdown">
                                                        <label for="telefon">Posisi</label>
                                                        <button class="btn btn-outline-dark dropdown-toggle" style="width: 100%" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Pilih Posisi
                                                        </button>
                                                        <div style="width: 100%" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">Frontend</a>
                                                        <a class="dropdown-item" href="#">Backend</a>
                                                        <a class="dropdown-item" href="#">Fullstack</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            <div>
                                                    @if (session('status'))
                                                    <div id="berhasil" class="alert alert-success">
                                                        {{ session('status') }}
                                                    </div>
                                                    @endif
                                            </div>
                            </div>
                                        
                          </div>
                    <div class="col-lg-3">
                            <button type="button" name="add" id="add" class="btn btn-success">Add More Form</button>
                    </div>
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6 mt-3 p-0">
                        <button type="submit" class="btn btn-primary" style="width:100%">Submit</button>
                        </form>
                        </div>
                        <div class="col-lg-3"></div>
                    </div>

                        
                </div>

<script type="text/javascript">
    $(document).ready(function(){ 
        var i=1;

        $('#add').click(function(){  
           i++;  
           $('#card1').append('tes');  
      });  
    });  

</script>
</body>
</html>