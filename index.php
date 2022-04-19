<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Home Page</title>
        <style>
            *{
                margin: 0;
                padding: 0;
            }
            body{
                margin: 0;
                padding: 0;
                font-family: Arial, Helvetica, sans-serif;

            }
            img{
                width: 100%;
                height: 100%;
                position: absolute;
                z-index: 0;
            }
            .header{
                position: relative;
                background-color: rgb(1, 216, 216);
                padding: 30px;
                display: flex;
                justify-content: center;
                align-items: center;
                color: rgb(46, 45, 45);
                width: 100;
                box-shadow: 0 0 30px 20px rgb(31, 31, 31);
            }
            p{
                font-weight: bold;
                font-size: 20px;
            }
            span{
                font-weight: bold;
                font-size: 20px;
                color: white;
            }
            .content{
                position: absolute;
                top: 170px;
                left: 370px;
                background-color: rgb(241, 51, 3);
                width: 50%;
                height: 400px;
                z-index: 5;
                display: flex;
                flex-direction: column;
                flex-wrap: wrap;
                justify-content: space-around;
                align-items: center;
                padding: 10px;
                border-radius: 20px 100px;
                box-shadow: 0 0 40px 20px rgb(31, 31, 31);
            }
            a{
                background-color: rgb(41, 41, 41);
                display: block;
                padding: 15px;
                text-decoration: none;
                color: white;
                font-weight: bold;
                font-size: 15px;
                border-radius: 20px 100px;
                box-shadow: 0 0 20px 0 rgb(31, 31, 31);
                transition: background-color 0.5s ease, padding 0.5s ease;
            }
            a:hover{
                background-color: rgb(1, 216, 216);
                border-radius: 5px;
                opacity: 1;
                padding: 20px;
                text-decoration: none;
            }
            a:link, a:visited {
                text-decoration: none;
                cursor: auto;
            }
        </style>
    </head>
    <body>
        <img src="background.jpg" alt="background">
            <div class="header">
                <p><span>>>>>>>>>>>>>>>></span> ADMIN AND EMPLOYEE LOGIN SYSTEM <span><<<<<<<<<<<<<<<</span></p>
            </div>
            <div class="content">
                <span>ADMIN LOGIN</span>
                <a href="admin/adminlogin.php" target="_blank">Click Here To Admin Website</a>
                <span>EMPLOYEE LOGIN</span>
                <a href="login.php" target="_blank">Click Here To Employee Website</a>
            </div>
    </body>
</html>