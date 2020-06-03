@extends('layouts.master')
@section('main')

<div class="col-md-6 col-xs-12">
    <div class="customer-login my-account">
        <form method="post" class="login" action="">
            @csrf
            <div class="form-fields">
                <h2>Lấy lại mật khẩu</h2>
                <p class="form-row form-row-wide">
                    <label for="username">Email đăng ký <span class="required">*</span></label>
                    <input type="email" class="input-text" required name="email" id="username" value="">
                    @if($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </p>
            </div>
            <div class="form-action">
                <div class="actions-log">
                    <input type="submit" class="button" onclick="return confirm('Bạn có chắc muốn lấy lại mật khẩu cho tài khoản này không?')" name="login" value="Xác nhận">
                </div>
            </div>
        </form>
    </div>
</div>
@stop