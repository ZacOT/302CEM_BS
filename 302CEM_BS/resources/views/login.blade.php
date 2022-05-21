<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="<?php echo asset('css/login.css')?>" type="text/css"> 

    <h1 style="text-align:center;">Login Page 1</h1>
    @if (session('status'))
    <p style="text-align:center;">{{ session('status') }}</p>
    @endif
    <div style="text-align:center;">
        <form action="{{ route('login') }}" method="post" style="background-image:url('images/openbook.png');background-repeat:no-repeat;background-position: center;"> 
            @csrf
            <p><input type="text" name="username" placeholder="Username" id="username" required\></p>

            <p><input type="text" name="password" placeholder="Password" id="password" required\></p>   

            <p><button type="submit" class="login" name="login_submit">Login</button></p>
        </form>
    </div>

</html>