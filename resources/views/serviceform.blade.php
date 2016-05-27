@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Service's Data Submission</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/serviceRegister') }}">
                        {!! csrf_field() !!}

                        
                        <div class="form-group">
                         <label class="col-md-4 control-label">Service Type</label>
                         <div class="col-md-6">
                            <div>

                                {{Form::select('type', $type)}}
                                
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                         <label class="col-md-4 control-label">Location</label>
                         <div class="col-md-6">
                            <div>

                                {{Form::select('location', $location)}}
                                
                            </div>
                        </div>
                    </div>

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



                <div class="form-group{{ $errors->has('license') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">License No.</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="license" value="{{ old('license') }}">

                        @if ($errors->has('license'))
                        <span class="help-block">
                            <strong>{{ $errors->first('license') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
                

                <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Contact No.</label>

                    <div class="col-md-6">
                        <input type="text" class="form-control" name="contact" value="{{ old('contact') }}">

                        @if ($errors->has('contact'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label class="col-md-4 control-label">Email Address</label>

                    <div class="col-md-6">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-btn fa-user"></i>Submit
                        </button>
                    </div>
                </div>


            </form>

            {{--$location--}}
            <br>
            {{--$type--}}

        </div>
    </div>
</div>
</div>
</div>
@endsection
