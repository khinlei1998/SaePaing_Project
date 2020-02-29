@extends('layouts.app')

@section('content')
    <div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card py-3">
                <div class="d-flex justify-content-center">
                    <img src="{{asset('images/logo.png')}}" width="150px" alt="Logo">
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="input-group mb-3{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="input-group-append">
                                <span class="d-block rounded bg-info text-white px-3 pt-2"><i class="fa fa-user"></i></span>
                            </div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                        </div>
                        @if ($errors->has('email'))
                            <span class="text-danger text-sm-center">
                                <small>{{ $errors->first('email') }}</small>
                            </span>
                        @endif
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="d-block rounded bg-info text-white px-3 pt-2"><i class="fa fa-key"></i></span>
                            </div>
                            <input id="password" type="password" class="form-control" name="password"  placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="text-danger text-sm-center">
                                        <small>{{ $errors->first('password') }}</small>
                                </span>
                            @endif
                        </div>
                        <button type="submit" name="button" class="btn btn-danger w-100 mt-2">Login</button>
                    </form>
                </div>
                <div class="mt-4 text-center">
                    <a  href="#exampleModal" data-toggle="modal">Forgot your password?</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Forget Password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body" style="text-align:center;">
                    <i class="fas fa-exclamation-triangle text-warning" style="font-size: 100px; margin-bottom: 20px;"></i>
                    <h1>Please contact your IT administrator</h1>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        html,body{
            height:100%;
        }
        #app{
            height: 100%;
            background-image: url({{ asset('images/background.png') }});
        }
        .user_card {
            width: 350px;
            margin-top: 50px;
            position: relative;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;
        }
        footer{
            display:none;
        }
    </style>
@endpush