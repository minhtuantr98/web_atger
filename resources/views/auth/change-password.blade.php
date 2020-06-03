@extends('layouts.master')
@section('main')

<div class="col-md-8 col-xs-12">
    <div class="customer-login my-account">
        <form method="post" class="login" action="">
            @csrf
            <div class="form-fields">
                <h2>Đổi mật khẩu</h2>
                <p class="form-row form-row-wide">
                        <label for="reg_password">Mật khẩu cũ<span class="required">*</span></label>
                        <input type="password" class="input-text" required name="old_password" id="reg_password">
                </p>
                <p class="form-row form-row-wide">
                        <label for="reg_password">Mật khẩu mới<span class="required">*</span></label>
                        <input type="password" class="input-text" required name="new_password" id="new_password">
                </p>
                <p class="form-row form-row-wide">
                        <label for="reg_password">Nhập lại mật khẩu<span class="required">*</span></label>
                        <input type="password"  class="input-text" required name="re_password" id="re_password">
                </p>
            </div>
            
            <div class="form-action">
                <div class="actions-log">
                    <input type="submit" class="button" name="changepassword" onclick="return Validate()" value="Xác nhận">
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("new_password").value;
        var confirmPassword = document.getElementById("re_password").value;
        if (password != confirmPassword) {
            alert("Mật khẩu không trùng khớp");
            return false;
        }
        return true;
    }
</script>
@stop