@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Search</div>
                    <div class="panel-body">

                        {!! Form::open(['url'=>'search/token','method' => 'GET', 'class'=>'navbar-form']) !!}
                        <div class="input-group col-md-6 col-md-offset-3">
                            {!! Form::text('token',null,['class'=>'form-control','placeholder'=>'Search by Token']) !!}
                            <div class="input-group-btn">
                                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>
                        {!! Form::close() !!}

                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection