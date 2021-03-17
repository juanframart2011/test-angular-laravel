    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <title>Prueba</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Gestionar Usuario</h3>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Agregar Usuario
                                    </button>
                                </div>
                                <div class="card-body">
                                    @if(session("mensaje"))
                                    <div class="alert alert-success" role="alert">
                                        <strong>{{session('mensaje')}}</strong><br>
                                    </div>
                                    @endif
                                    <table class="table table-bordered table-hover data-info">
                                        @if( !$errors->isEmpty() )
                                        <div class="alert alert-danger">
                                            @foreach ( $errors->all() as $error )
                                            <strong>{{$error}}</strong><br>
                                            @endforeach
                                        </div>
                                        @endif
                                        <thead class="bg-primary">
                                            <tr>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellido</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">No. documento</th>
                                                <th scope="col">Celular</th>
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td>{{$user->first_name}}</td>
                                                <td>{{$user->last_name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->n_document}}</td>
                                                <td>{{$user->phone_number}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-defaultUpdate{{$user->n_document}}">
                                                        Editar
                                                    </button>
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-defaultDelete{{$user->n_document}}">
                                                        Eliminar
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-defaultUpdate{{$user->n_document}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Editar Usuario</h4>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <form action="{{route('user.update', $user->id)}}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="first_name">
                                                                        Nombre
                                                                    </label>
                                                                    <input type="text" class="form-control" id="editarnombre" name="first_name" required value="{{ $user->first_name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="last_name">
                                                                        Apellido
                                                                    </label>
                                                                    <input type="text" class="form-control" id="editarexistencia" name="last_name" required value="{{ $user->last_name }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="email">
                                                                        Email
                                                                    </label>
                                                                    <input type="email" class="form-control" id="editarexistencia" name="email" required value="{{ $user->email }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="n_document">
                                                                        Documento
                                                                    </label>
                                                                    <input type="number" class="form-control" id="editarexistencia" name="n_document" required value="{{ $user->n_document }}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="phone_number">
                                                                        Telefono
                                                                    </label>
                                                                    <input type="number" class="form-control" id="editarexistencia" name="phone_number" required value="{{ $user->phone_number }}">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer justify-content-between">
                                                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancelar</button>
                                                                <button type="submit" class="btn btn-primary">
                                                                    Guardar
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="modal-defaultDelete{{$user->n_document}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Eliminar usuario</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Esta seguro de eliminar este usuario
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <a href="{{route('user.delete', $user->id)}}"><button type="button" class="btn btn-danger">Eliminar</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Agregar Usuario</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="{{route('user.store')}}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="first_name">
                                                Nombre
                                            </label>
                                            <input type="text" class="form-control" id="first_name" name="first_name" required value="{{ old('first_name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="last_name">
                                                Apellido
                                            </label>
                                            <input type="text" class="form-control" id="last_name" name="last_name" required value="{{ old('last_name') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">
                                                Email
                                            </label>
                                            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="n_document">
                                                Documento
                                            </label>
                                            <input type="text" class="form-control" id="n_document" name="n_document" required value="{{ old('n_document') }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="phone_number">
                                                Telefono
                                            </label>
                                            <input type="number" class="form-control" id="phone_number" name="phone_number" required value="{{ old('phone_number') }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">
                                            Guardar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    </body>
    </html>