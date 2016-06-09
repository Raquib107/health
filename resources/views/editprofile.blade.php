@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/editprofile') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('first') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"> First Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="first" value="{{ $user->First_name }}">

                                @if ($errors->has('first'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        
                        <div class="form-group{{ $errors->has('last') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label"> Last Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="last" value="{{ $user->Last_name }}">

                                @if ($errors->has('last'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ $user->email }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Phone No</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{--new--}}

                        {{--
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="doctor"> Doctor
                                    </label>
                                </div>
                            </div>
                        </div>
                        --}}
                        
                        {{--
                         <div class="form-group">
                         <label class="col-md-4 control-label">Your specialty</label>
                            <div class="col-md-6">
                                <div>
                                    
                                        {{ Form::select('category', $categories) }}
                                    
                                </div>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('Affiliation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Affiliation</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="Affiliation" value="{{ $doctor->Affiliation}}">

                                @if ($errors->has('Affiliation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Affiliation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('Registration') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Registration No.</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="Registration" value="{{ $doctor->reg_no }}">

                                @if ($errors->has('Registration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Registration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        --}}

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Update
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
