<!DOCTYPE html>
<html>
<head>
    <title>Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
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

            <div class="container-fluid">
	
                <h1 class="my-5">Data</h1>
                    
                <form action="/data/search" method="GET" class="form-inline col-lg-0">
                    <input type="text" name="search" placeholder="Search Data .." value="{{ old('search') }}" class="form-control m-1 col-lg-3">
                    <input type="submit" value="Search" class="btn btn-outline-primary m-1 col-sm-2">
                    <a href="/data" class="btn btn-outline-danger m-1 col-sm-2">Reset</a>
                </form>
    
                <div>
                    @if (session('status'))
                        <div id="berhasilHapus" class="alert alert-danger my-2">
                            {{ session('status') }}
                        </div>
                        @endif
                        
                </div>
                
                <table class="table table-bordered table-striped my-2">
                    <thead>
                        <tr>
                            <th width="14.25%">Nama</th>
                            <th width="14.25%">Username</th>
                            <th width="14.25%">Password</th>
                            <th width="14.25%">Email</th>
                            <th width="14.25%">Nomor Telefon</th>
                            <th width="14.25%">Posisi</th>
                            <th width="14.25%">Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $d)
                        <tr>
                            <td width="14.25%" style="min-width: 140px">{{str_replace("_"," ",$d->nama)}}</td>
                            <td width="14.25%" style="min-width: 140px">{{str_replace("_"," ",$d->username)}}</td>
                            <td width="14.25%" style="min-width: 140px">••••••••</td>
                            <td width="14.25%" style="min-width: 140px">{{str_replace("_"," ",$d->email)}}</td>
                            <td width="14.25%" style="min-width: 140px">{{str_replace("_"," ",$d->telefon)}}</td>
                            <td width="14.25%" style="min-width: 140px">{{str_replace("_"," ",$d->posisi)}}</td>
                            <td width="14.25%" style="min-width: 260px" id='{{$d->nama}}' >
                                <div  style="text-align: center">
                                        <div>
                                                @if (session('status'.$d->id))
                                                    <div id="status" class="alert alert-danger my-2">
                                                        {{ session('status'.$d->id) }}
                                                    </div>
                                                @endif
    
                                                @if (session('berhasil'.$d->id))
                                                <div id="berhasil" class="alert alert-success my-2">
                                                    {{ session('berhasil'.$d->id) }}
                                                </div>
                                                @endif
        
                                            </div>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-success col-lg-12 m-1" style="width:100%" data-toggle="modal" data-target="#edit" data-id={{$d->id}} data-nama={{$d->nama}}  data-username={{$d->username}} data-password={{$d->password}} data-email={{$d->email}} data-telefon={{$d->telefon}} data-posisi={{$d->posisi}}>Edit</button>
                                
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger col-lg-12 m-1" style="width:100%" data-toggle="modal" data-target="#delete"  data-id={{$d->id}} data-nama={{$d->nama}}  data-username={{$d->username}} data-password={{$d->password}} data-email={{$d->email}} data-telefon={{$d->telefon}} data-posisi={{$d->posisi}}>Delete</button>
                                
                                <!-- Modal -->
                                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" style="text-align: left" role="document">
                                    <div class="modal-content" style="min-width: 500px">
                                      <div class="modal-header">
                                          <h5 class="modal-title" style=" font-weight: bold" id="exampleModalLabel">Edit</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form action="/data/edit"  method="POST" enctype="multipart/form-data">
                                          @method('put')
                                          @csrf
                                      <div class="modal-body">
                                          <div class="form-group">
                                          <input type="hidden" name="id" id="id" value="">
                                          <p style="text-align: left; font-weight: bold" name="labelEdit" id="labelEdit"></p>
                                          </div>
                                          <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukkan Nama" name="nama"value="{{old('nama')}}">
                                            @error('nama') <div class="invalid-feedback">{{$message}}</div> @enderror
                                          </div>
                                          <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Masukkan Username" name="username"value="{{old('username')}}">
                                            @error('username') <div class="invalid-feedback">{{$message}}</div> @enderror
                                          </div>
                                          <div class="form-group">
                                              <label for="password">Password</label>
                                              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukkan Password" name="password" value="{{old('password')}}">
                                              @error('password') <div class="invalid-feedback">{{$message}}</div> @enderror
                                              <input type="checkbox" class="showPassword  mr-1" id="showPassword" name="showPassword"/>
                                              <label for="showPassword" disabled>Show Password</label>
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
                                                      <label for="posisi">Posisi</label>
                                                      <select class="form-control @error('posisi') is-invalid @enderror" id="posisi" name="posisi" value="{{old('posisi')}}">
                                                              <option>Pilih Posisi...</option>
                                                              <option value=Frontend>Frontend</option>
                                                              <option value=Backend>Backend</option>
                                                              <option value=Fullstack>Fullstack</option>
                                                      </select>
                                                      @error('posisi') <div class="invalid-feedback">{{$message}}</div> @enderror
                                                  </div>
                                              </div>
                                        </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-primary" style="width: 50%; min-width: 200px" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-success" style="width: 50%; min-width: 200px">Edit</button>
                                        </div>
                                    </form>  
                                    </div>
                                  </div>
                                </div>
    
                                <!-- Modal -->
                                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content" style="min-width: 500px">
                                      <div class="modal-header">
                                          <h5 class="modal-title text-center" style=" font-weight: bold" id="exampleModalLabel">Delete</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <form action="/data/delete"  method="POST">
                                          @method('delete')
                                          @csrf
                                      <div class="modal-body">
                                          <input type="hidden" name="id" id="id" value="">
                                           <p style="text-align: left; font-weight: bold" name="labelDelete" id="labelDelete"></p>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn-primary" style="width: 50%; min-width: 200px" data-dismiss="modal">Cancel</button>
                                          <button type="submit" class="btn btn-danger" style="width: 50%; min-width: 200px">Delete</button>
                                        </div>
                                    </form>  
                                    </div>
                                  </div>
                                </div>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <br/>
                Halaman : {{ $file->currentPage() }} <br/>
                Data Per Halaman : {{ $file->perPage() }} <br/>
                Jumlah Data : {{ $file->total() }} <br/>
                <br/>
                {{ $file->links() }} --}}
                <div style="visibility: hidden"><p style="height: 200px"> </p></div>

                <script>
                    $('.showPassword').on('change',function(){
                        var isChecked = $(this).prop('checked');
                        if (isChecked) {
                            $('#password').attr('type','text');
                        } else {
                            $('#password').attr('type','Password');
                        }
                        });
                </script>
    
              <script>
                    $('#delete').on('show.bs.modal', function(e) {
                        var button = $(e.relatedTarget)

                        var id = button.data('id')
                        var nama = button.data('nama')
                        var username = button.data('username')
                        var password = button.data('password')
                        var email = button.data('email')
                        var telefon = button.data('telefon')
                        var posisi = button.data('posisi')

                        var modal = $(this)

                        var htmlLabelDelete = document.getElementById('labelDelete')

                        if(String(nama).includes("_")){

                            var nama = nama.replace("_", " ");

                        }

                        htmlLabelDelete.innerHTML = "Delete data "+nama+"?";
                        modal.find('.modal-body #id').val(id);
                        })
                </script>
    
        <script>
            $('#edit').on('show.bs.modal', function(e) {
                var button = $(e.relatedTarget)

                var id = button.data('id')
                var nama = button.data('nama')
                var username = button.data('username')
                var password = button.data('password')
                var email = button.data('email')
                var telefon = button.data('telefon')
                var posisi = button.data('posisi')
                
                var modal = $(this)

                var htmlLabelEdit = document.getElementById('labelEdit')

                if(String(nama).includes("_")){

                var nama = nama.replace("_", " ");

                }
    
                htmlLabelEdit.innerHTML = "Edit Data "+nama;
                $('#nama').attr('value',nama);
                $('#username').attr('value',username);
                // $('#password').attr('value',password);
                $('#email').attr('value',email);
                $('#telefon').attr('value',telefon);
                $("#posisi").val(posisi);

                modal.find('.modal-body #id').val(id);
                })
        </script>
    
        <script>
        $('#edit').on('hidden.bs.modal', function () {
            $(this).find('form').trigger('reset');
            $('#password').attr('type','Password');
        })
        </script>
    
        <script>
        $('#berhasil').show();
    
        setTimeout(function() { $('#berhasil').hide('slow'); }, 5000);
        </script>
    
        <script>
        $('#berhasilHapus').show();
    
        setTimeout(function() { $('#berhasilHapus').hide('slow'); }, 5000);
        </script>
</body>
</html>