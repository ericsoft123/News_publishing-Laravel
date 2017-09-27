@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Page  {{$status}} {{$token}}</div>
  <!--              @if(session('status'))
                Reset Page {{session ('status')}}</div>
@endif-->
              
      <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('newpassword') }}">
                        {{ csrf_field() }}
                         <input type="hidden" name="token" value="{{$token}}">
<!--@if(session('token'))-->
               <!-- Reset Page  {{session ('token')}}-->
               <!-- <input type="text" name="token" value="{{session ('token')}}">-->
               
<!--@endif-->
           
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">confirm Password</label>

                            <div class="col-md-6">
                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                   
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Send
                                </button>

                             <a href=""></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
