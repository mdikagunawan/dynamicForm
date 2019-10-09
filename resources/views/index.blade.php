<!DOCTYPE html>
<html>
<head>
    <title>Insert</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/insert">Insert</a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/data">Data</a>
                        </li>
                    </ul>
                </div>
            </nav>

    <div class="container">

        
        <form method="POST" id="form">
            @csrf
        <h1 class="mt-3" style="text-align: center">Insert</h1>
        <div id="insert">
        <div id="card1" class="row my-4">
            <div class="col-lg-3"></div>
            <div  class="card col-lg-6">
                            <div class="card-body">
                                            <div class="form-group">
                                              <label for="nama">Nama</label>
                                              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama[]"value="{{old('nama')}}">
                                              @error('nama') <div class="invalid-feedback">{{$message}}</div> @enderror
                                            </div>
                                            <div class="form-group">
                                              <label for="username">Username</label>
                                              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukkan Username" name="username[]"value="{{old('username')}}">
                                              @error('username') <div class="invalid-feedback">{{$message}}</div> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password" name="password[]" value="{{old('password')}}">
                                                @error('password') <div class="invalid-feedback">{{$message}}</div> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email[]" value="{{old('email')}}">
                                                 @error('email') <div class="invalid-feedback">{{$message}}</div> @enderror
                                           </div>
                                            <div class="form-group">
                                                <label for="telefon">Nomor Telefon</label>
                                                <input type="text" class="form-control @error('telefon') is-invalid @enderror" id="telefon" placeholder="Masukkan Nomor Telefon" name="telefon[]" value="{{old('telefon')}}">
                                                 @error('telefon') <div class="invalid-feedback">{{$message}}</div> @enderror
                                           </div>
                                            <div class="form-group">
                                                <div class="dropdown">
                                                        <label for="posisi">Posisi</label>
                                                        <select class="form-control @error('posisi') is-invalid @enderror" id="posisi" name="posisi[]" value="{{old('posisi')}}">
                                                                <option selected>Pilih Posisi...</option>
                                                                <option>Frontend</option>
                                                                <option>Backend</option>
                                                                <option>Fullstack</option>
                                                        </select>
                                                        @error('posisi') <div class="invalid-feedback">{{$message}}</div> @enderror
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
                    </div>
                </div>
            </div>
                
                <div class="row">
                    
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6 mb-5 p-0">
                            <span id="result"></span>
                    <button type="button" name="add" id="add" class="btn btn-success mb-2" style="width:100%">Tambah Form</button>
                    <button type="submit" name="submit" id="submit" class="btn btn-primary" style="width:100%">Submit</button>
                    </form>
                    </div>
                    <div class="col-lg-3"></div>
                    
                </div>
                        
                </div>

<script type="text/javascript">
    $(document).ready(function(){ 
        var i=1;

    $(document).on('click', '.btn_close', function(){  
       var button_id = $(this).attr("id");   
          $('#card'+button_id+'').remove();  
    });  

        $('#add').click(function(){  
           i++;  
           $('#insert').append(`
           <div id="card`+i+`" class="row my-4">
           <div class="col-lg-3"></div>
            <div  class="card col-lg-6">
                            <div class="card-body">
                                <div class="row">
                                <div class="col-lg-11"></div>
                                <div class="col-lg-1" style="text-align: right">
                                        <button type="button" name="close" id="`+i+`" class="btn btn-danger btn_close">X</button>
                                </div>
                                </div>
                                            <div class="form-group">
                                              <label for="nama">Nama</label>
                                              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama[]"value="{{old('nama')}}">
                                              @error('nama') <div class="invalid-feedback">{{$message}}</div> @enderror
                                            </div>
                                            <div class="form-group">
                                              <label for="username">Username</label>
                                              <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukkan Username" name="username[]"value="{{old('username')}}">
                                              @error('nama') <div class="invalid-feedback">{{$message}}</div> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password" name="password[]" value="{{old('password')}}">
                                                @error('password') <div class="invalid-feedback">{{$message}}</div> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Masukkan Email" name="email[]" value="{{old('email')}}">
                                                 @error('email') <div class="invalid-feedback">{{$message}}</div> @enderror
                                           </div>
                                            <div class="form-group">
                                                <label for="telefon">Nomor Telefon</label>
                                                <input type="text" class="form-control @error('telefon') is-invalid @enderror" id="telefon" placeholder="Masukkan Nomor Telefon" name="telefon[]" value="{{old('telefon')}}">
                                                 @error('telefon') <div class="invalid-feedback">{{$message}}</div> @enderror
                                           </div>
                                            <div class="form-group">
                                                <div class="dropdown">
                                                        <label for="posisi">Posisi</label>
                                                        <select class="form-control @error('telefon') is-invalid @enderror" id="posisi" name="posisi[]" value="{{old('posisi')}}">
                                                                <option selected>Pilih Posisi...</option>
                                                                <option>Frontend</option>
                                                                <option>Backend</option>
                                                                <option>Fullstack</option>
                                                              </select>
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
                    <div class="col-lg-3"></div>
           `);  
      });  

            $('#form').on('submit', function(event){
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                $.ajax({
                    url:'{{ route("dynamic-field.insert") }}',
                    method:'post',
                    data:$(this).serialize(),
                    dataType:'json',
                    beforeSend:function(){
                        $('#save').attr('disabled','disabled');
                    },
                    success:function(data)
                    {
                        if(data.error)
                        {
                            var error_html = '';
                            for(var count = 0; count < data.error.length; count++)
                            {
                                error_html += '<p>'+data.error[count]+'</p>';
                            }
                            $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
                        }
                        else
                        {
                            $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
                        }
                        $('#save').attr('disabled', false);
                    }
                }) 
        }); 
    });  

</script>
</body>
</html>