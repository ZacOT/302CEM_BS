<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="stylesheet" href="<?php echo asset('css/homepage.css')?>" type="text/css"> 
<link rel="icon" href="{!! asset('images/book_logo.png') !!}"/>

<head>
    <!-- Header -->

    <div class="wrapper row1">
        <p style="text-align: center;"> &nbsp;&nbsp;&nbsp;&nbsp; Spend more and save more! With the new launch event under the New Back To School Promotion!</p>
    </div>
        <header id="header" class="clear">
            <table border="0" width="830px">
                <tr>
                    <td align="center">
                        <a href="/"><img src='images/book_logo.png' height='80' width='80'></a>
                    </td>
                    <td>
                        <h1>Online Book Store </h1>
                    </td>
                    <td align="right">
                        <a href="cart"><img src='images/cart_logo.png' height='40' width='40'></a>
                    </td>
                </tr>
            </table>
        </header>

        <center>
        <div class="wrapper row1">
            <header id="header" class="clear">
                <div id="hgroup">
                <nav>
                        <ul>
                        <li><a href='/'>Home</a></li>
                        <li><a href=''>Purchase History</a></li>
                        <li><a href=''>Setting</a></li>
                        <li><a href='addBook'>Admin Page</a></li>
                        <li><a href='register'>Register</a></li>
                        
                        <?php 

                        if(Auth::user() == NULL){
                        echo" <li><a href='login'>Login</a></li> "; }
                        
                        ?>
                        <li class='last'><a href='logout'>Logout</a></li>
                        </ul>
                </nav>
              </div>
            </header>
        </div>
</center>
</head>