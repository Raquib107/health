@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Phone No</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">

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


                        <div class="form-group">
                            <label class="col-md-4 control-label">Who are you? </label>
                            <div class="col-md-6">
                                <input name="type" type="radio" value="doctor"> Doctor<br>
                                <input checked="checked" name="type" type="radio" value="user"> User
                            </div>
                        </div>
                            



                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <label class="col-md-15 ">If you are a doctor, fill up the following field </label>
                            </div>
                        </div>


                        

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
                                <input type="text" class="form-control" name="Affiliation" value="{{ old('Affiliation') }}">

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
                                <input type="text" class="form-control" name="Registration" value="{{ old('Registration') }}">

                                @if ($errors->has('Registration'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Registration') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>

                    <li><a href="{{ url('/serviceRegister') }}">Click here to submit your service company's info</a></li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
