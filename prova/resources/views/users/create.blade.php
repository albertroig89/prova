@extends('layout')

@section('title', "Creació de usuaris")

@section('content')

    <div class="card pl-0 pr-0 col-md-4" >
        <div class="card-header"><h3>{{ $title }}</h3></div>
        <div class="card-body">
            <form method="POST" action="{{ url('usuarios') }}">

                {!! csrf_field() !!}

                <div class="form-group">
                    <div class="form-group">
                        <label for="name">Nom:</label>
                        @if ($errors->has('name'))
                            <input type="text" name="name" class="form-control is-invalid" id="name" aria-describedby="nameHelp" placeholder="Perico Delos" value="{{ old('name') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('name') }}
                            </div>
                        @elseif ($errors->any())
                            <input type="text" name="name" class="form-control is-valid" id="name" aria-describedby="nameHelp" placeholder="Perico Delos" value="{{ old('name') }}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                        @else
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Perico Delos" value="{{ old('name') }}">
                            <small id="nameHelp" class="form-text text-muted">Escribe tu nombre.</small>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="email">Correu electronic:</label>
                        @if ($errors->has('email'))
                            <input type="email" name="email" class="form-control is-invalid" id="email" aria-describedby="emailHelp" placeholder="pericodelos@microdelta.net" value="{{ old('email') }}">
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @elseif ($errors->any())
                            <input type="email" name="email" class="form-control is-valid" id="email" aria-describedby="emailHelp" placeholder="pericodelos@microdelta.net" value="{{ old('email') }}">
                            <div class="valid-feedback">
                                Correcto!
                            </div>
                        @else
                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="pericodelos@microdelta.net" value="{{ old('email') }}">
                            <small id="emailHelp" class="form-text text-muted">Escribe un email que puedas verificar.</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="department_id">Departament:</label>
                        <select class="form-control" name="department_id" id="department_id">
                            <option value="">Sel·lecciona el teu departament</option>
                            @foreach ($departments as $department)
                                <option class="form-control" value="{{ ($department->id) }}">{{ $department->title }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Example invalid custom select feedback</div>
                    </div>
                    <div class="form-group">
                        @if ($errors->has('password'))
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control is-invalid" id="password" placeholder="Introduce tu contraseña">
                            <div class="invalid-feedback">
                                {{ $errors->first('password') }}
                            </div>
                        @else
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Introduce tu contraseña">
                            <small id="emailHelp" class="form-text text-muted">Minimo 6 caracteres.</small>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Crear usuario</button>
            </form>
            <br>
            <p><a href="{{ route('users.index') }}">Regresar al listado de usuarios</a></p>

            @if ($errors->any())
                <br>
                <div class="form-group">
                    <div class="alert alert-danger">
                        <h5>Por favor corrige los errores mencionados arriba {{ $errors }}</h5>
                    </div>
                </div>
            @endif
        </div>
    </div>


@endsection
