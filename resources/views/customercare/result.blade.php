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
                <table class="table table-bordered ">
                    <thead>
                    <tr>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($problems as $problem)
                        <tr>
                            <td class="text-center">Branch Name</td>
                            <td class="text-center">{{$problem->devicename or 'Default'}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">Model Name</td>
                            <td class="text-center">{{$problem->modelname or 'Default'}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">Problem</td>
                            <td class="text-center">{{$problem->problem or 'Default'}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">Description</td>
                            <td class="text-center">{{$problem->description or 'Default'}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">Token</td>
                            <td class="text-center">{{$problem->token or 'Default'}}</td>
                        </tr>
                        <tr>
                            <td class="text-center">Status</td>
                            @if($problem->status)
                                <td class="text-center">Done</td>
                            @else
                                <td class="text-center">Not Done Yet</td>
                            @endif
                        </tr>


                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection