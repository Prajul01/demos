@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Create user
                    <span class="float-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}">Users</a>
                </span>
                </div>

                <div class="card-body">
                    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                    <div class="form-group row">
                        {!! Form::label('name', 'Name: <span class="required">*</span>',['class' => 'col-sm-2 col-form-label'],false); !!}
                        <br>
                        <div class="col-sm-10">
                            {!! Form::text('name', null, [ 'class'=>'form-control', 'placeholder'=>'Enter name']); !!}
                            @error('name')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                    </div>
                    <div class="form-group row">
                        {!! Form::label('email', 'Email: <span class="required">*</span>',['class' => 'col-sm-2 col-form-label'],false); !!}
                        <br>
                        <div class="col-sm-10">
                            {!! Form::text('email', null, [ 'class'=>'form-control', 'placeholder'=>'Enter Email']); !!}
                            @error('email')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group row">
                        {!! Form::label('role_id', 'Module: <span class="required">*</span>',['class' => 'col-sm-2 col-form-label'],false); !!}
                        <div class="col-sm-10">
                            {!! Form::select('role_id',  $data['role'], null,['class' => 'form-control','placeholder' => 'Select Role','id'=>'semester',]) !!}
                            @error('role_id')
                            <span class="text text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
