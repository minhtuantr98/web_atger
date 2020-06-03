@extends('layouts.master')
@section('main')

<div class="col-md-7 col-xs-12">
    <div class="customer-login my-account">
        <form method="post" class="login" action="">
            @csrf
            <div class="form-fields">
                <h2>Đăng nhập</h2>
                <p class="form-row form-row-wide">
                    <label for="username">Email<span class="required">*</span></label>
                    <input type="email" class="input-text" required name="email" id="username" value="">
                </p>
                <p class="form-row form-row-wide">
                    <label for="password">Password <span class="required">*</span></label>
                    <input class="input-text" type="password" required name="password" id="password">
                </p>
            </div>
            <div class="form-action">
                <p class="lost_password" > <a style="color:red" href="{{route('get.forgot.password')}}">Quên mật khẩu?</a></p>
                <div class="actions-log">
                    <input type="submit" class="button" name="login" value="Đăng nhập">
                </div>
                <label for="rememberme" class="inline"> 
                <input name="remember" type="checkbox" id="rememberme" value="Remember"> Remember me </label>
            </div>
        </form>
    </div>
</div>
@stop