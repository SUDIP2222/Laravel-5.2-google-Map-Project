@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Problem</div>
                    <div class="panel-body">
                        {!! Form::open(['url'=>['/problem'],'class'=>'form-horizontal']) !!}
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Date</label>
                            <div class="col-md-6">
                                {!! Form::date('date',null,['class'=>'date form-control','placeholder'=>'Enter Contest Date']) !!}
                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('devicename') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Device name</label>

                            <div class="col-md-6">
                                {!! Form::text('devicename',null,['class'=>'form-control','placeholder'=>'Enter Device Name']) !!}

                                @if ($errors->has('devicename'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('devicename') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('modelnumber') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Model Number</label>

                            <div class="col-md-6">
                                {!! Form::text('modelnumber',null,['class'=>'form-control','placeholder'=>'Enter Model Number']) !!}

                                @if ($errors->has('modelnumber'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('modelnumber') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('problem') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Problem</label>

                            <div class="col-md-6">
                                {!! Form::text('problem',null,['class'=>'form-control','placeholder'=>'Enter problem']) !!}

                                @if ($errors->has('problem'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('problem') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                {!! Form::textarea('description',null,['class'=>'form-control','placeholder'=>'Enter problem description','rows' => 4, 'cols' => 4]) !!}

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {!!Form::hidden('id', $beanches->id) !!}
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="glyphicon glyphicon-envelope"></i> Submit
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('.date').datepicker({
            format: 'dd-mm-yyyy',
        });
    </script>
@endsection