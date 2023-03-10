@extends('layouts.app')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-sm-6 col-md-9 col-lg-9">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{$panel}} |{{$title}} Forms
                                <a href="{{route($route .'index')}}" class="btn btn-success">Lists</a>
                            </h3>
                        </div>
        <!-- /.card-header -->
        <!-- form start -->
        {!! Form::open(['route' => $route .'store' , 'method' => 'post' , 'class' => 'form-horizontal']) !!}
{{--        @csrf--}}

        <div class="card-body">
            <div class="form-group row">
                {!! Form::label('module_id', 'Module: <span class="required">*</span>',['class' => 'col-sm-2 col-form-label'],false); !!}
                <div class="col-sm-10">
                    {!! Form::select('module_id', $data['module'], null,['class' => 'form-control','placeholder' => 'Select Module','id'=>'semester',]) !!}
                    @error('module_id')
                    <span class="text text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                {!! Form::label('name', 'Name: <span class="required">*</span>',['class' => 'col-sm-2 col-form-label'],false); !!}
                <br>
                <div class="col-sm-10">
                    {!! Form::text('name', '', [ 'class'=>'form-control', 'placeholder'=>'Enter Name']); !!}
                    @error('name')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('route', 'Route: <span class="required">*</span>',['class' => 'col-sm-2 col-form-label'],false); !!}
                <br>
                <div class="col-sm-10">
                    {!! Form::text('route', '', [ 'class'=>'form-control', 'placeholder'=>'Enter route']); !!}
                    @error('route')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                {!! Form::label('status', 'Status: <span class="required">*</span>',['class' => 'col-sm-2 col-form-label'],false); !!}
                <br>
                <div class="col-sm-10">
{{--                    status--}}
                    <div class="form-group">
                        {!! Form::label('status','Status',['class' => 'control-label']) !!}
                        {!! Form::radio('status',1) !!}Active
                        {!! Form::radio('status',0,true) !!}De-Active
                    </div>
                    @error('status')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary" >Submit</button>
        </div>

    </div>
</div>






            </div>
            <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection

@section('csss')
    <style>
        .required{
            color: red;
        }
    </style>
@endsection
