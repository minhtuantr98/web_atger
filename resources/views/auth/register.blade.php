@extends('layouts.master')
@section('main')
<div class="col-md-8 col-xs-12">
        <div class="customer-register my-account">
            <form method="post" class="register" action="">
            @csrf
                <div class="form-fields">
                    <h2>Đăng ký</h2>
                    <p class="form-row form-row-wide">
                        <label for="reg_email">Họ tên <span class="required">*</span></label>
                        <input type="text" class="input-text" required name="name" id="reg_email" value="">
                    </p>
                    <p class="form-row form-row-wide">
                        <label for="reg_email">Email <span class="required">*</span></label>
                        <input type="email" class="input-text" required name="email" id="reg_email" value="">
                        @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                    </p>
                    <p class="form-row form-row-wide">
                        <label for="reg_password">Password <span class="required">*</span></label>
                        <input type="password" class="input-text" required name="password" id="reg_password">
                    </p>
                    <p class="form-row form-row-wide">
                        <label for="reg_email">Số điện thoại <span class="required">*</span></label>
                        <input type="text" class="input-text" required name="phone" id="reg_email" value="">
                    </p>
                    <p class="form-row form-row-wide">
                        <label for="reg_email">Địa chỉ <span class="required">*</span></label>
                        <input type="text" class="input-text" required name="address" id="reg_email" value="">
                    </p>
                </div>
                <div class="form-action">
                    <div class="actions-log">
                        <input type="submit" class="button" name="register" value="Đăng ký">
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop