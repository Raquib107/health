@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add Chamber</div>
                <div class="panel-body">


                    {{--chamber add--}}
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/addchamber') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Location zone</label>
                            <div class="col-md-6">
                                <div>

                                    {{ Form::select('location', $location) }}

                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{old('name') }}">

                                @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Address</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" value="{{ old('address') }}">

                                @if ($errors->has('address'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Contact No</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">

                                @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Add Chamber
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

{{--schedule add--}}

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Add Schedule</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/addschedule') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Select Chamber</label>
                            <div class="col-md-6">
                                <div>

                                    

                                    <select id="" name="chamber">
                                        <?php foreach ( $chamber as $option ) : ?>
                                          
                                            <option value="<?php echo $option->Chamber_id; ?>"><?php echo $option->Chamber_name; ?></option> 
                                        <?php endforeach; ?></select>

                                </div>
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <label class="col-md-4 control-label">Select Day</label>
                            <div class="col-md-6">
                                <div>

                                    <select name="day" id="day" onchange="" size="1">
                                        <option value="1">Saturday</option>
                                        <option value="2">Sunday</option>
                                        <option value="3">Monday</option>
                                        <option value="4">Tuesday</option>
                                        <option value="5">Wednesday</option>
                                        <option value="6">Thrusday</option>
                                        <option value="7">Friday</option>
                                        
                                    </select>

                                </div>
                            </div>
                        </div>
                        

                        <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Write Time</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="HH:MM - HH:MM"  name="time" value="{{ old('time') }}">

                                @if ($errors->has('time'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('time') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('limit') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Limit</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="limit" value="{{ old('limit') }}">

                                @if ($errors->has('limit'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('limit') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Add Schedule
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>



        </div>
    </div>
</div>

{{--edit schedule--}}

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-heading">Edit Schedule</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/editSchedule') }}">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Select Schedule</label>
                            <div class="col-md-6">
                                <div>
                                    <select id="" name="schedule">
                                        <?php foreach ( $schedules as $option ) : ?>
                                          
                                            <option value="<?php echo $option->id; ?>"><?php $day=\DB::table('days')->where('id',$option->day_id)->first(); echo $day->day.' '.$option->Time; ?></option> 
                                        <?php endforeach; ?></select>

                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-4 control-label">Select Day</label>
                                <div class="col-md-6">
                                    <div>

                                        <select name="day" id="day" onchange="" size="1">
                                            <option value="1">Saturday</option>
                                            <option value="2">Sunday</option>
                                            <option value="3">Monday</option>
                                            <option value="4">Tuesday</option>
                                            <option value="5">Wednesday</option>
                                            <option value="6">Thrusday</option>
                                            <option value="7">Friday</option>

                                        </select>

                                    </div>
                                </div>
                            </div>


                            <div class="form-group{{ $errors->has('time') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Write Time</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="HH:MM - HH:MM"  name="time" value="{{ old('time') }}">

                                    @if ($errors->has('time'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('time') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('limit') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Limit</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="limit" value="{{ old('limit') }}">

                                    @if ($errors->has('limit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('limit') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Update Schedule
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>



            </div>
        </div>
    </div>


    @endsection
