<?php

namespace MRDEVELOPER\Vendor\Http;
use MRDEVELOPER\Models\Setting;
use MRDEVELOPER\Models\Users;

/**
 * Class EmailTemplate
 * @package MRDEVELOPER\Vendor\Http
 */

class EmailTemplate
{


    public static function Activate($id,$code,$user)
    {
        $body = '
<html>
<title>

</title>
<body>
    <div class="container">
        <div class="main">
            <st>Thank You For Register With Us In <b> ' . settings()['title'] . ' </b></st>
            <div class="content">
                <p class="title">
                    This Is The Activate Message.
                </p>
                <p>To Activate Your Account Please Follow Invitation. Are You Ready?</p>
                <ol>
                    <li>
                        Click On The Button In The Below To Redirect You To The Activation Page
                    </li>
                    <li>
                        Enter Your Username <span class="user">[' . $user . ']</span> And Your Password You Chosen <span class="pass">[*******]</span>
                    </li>
                    <li>
                        Congratulation, This Is Finally Step Enjoy With US.
                    </li>
                </ol>
                <div>
                    <a href="' . ma_site_url() . '/auth/activation/' . $id . '/'. $code .'" class="btn btn-default">Confirm Your Account</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
        ';
        return $body;
    }





    public static function reset($id,$code,$user)
    {
        $body = '
<html>
<title>

</title>
<body>
    <div class="container">
        <div class="main">
            <st>I Hobby To Help You ? <b> ' . settings()['title'] . ' </b></st>
            <div class="content">
                <p class="title">
                    Reset Password <p>[' . $user . ']</p>.
                </p>
                <p>To Reset Your Account Password Please Follow This Steps. Are You Ready?</p>
                <ol>
                    <li>
                        Click On The Button In The Below To Redirect You To The Reset Page
                    </li>
                    <li>
                        Enter Your Username <span class="user">[' . $user . ']</span> And Your Password <span class="pass">[*******]</span>
                    </li>
                    <li>
                        After Your Entered Account Details You Will Be Redirect To Home Page.
                        Congratulation, This Is Finally Step Enjoy With US.
                    </li>
                </ol>
                <div>
                    <a href="' . ma_site_url() . '/auth/reset/' . $id . '/'. $code .'" class="btn btn-default">Reset Your Password</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
        ';
        return $body;
    }

    public static function rested($id, $user,$ip)
    {
        $body = '

<html>
<title>

</title>
<body>
    <div class="container">
        <div class="main" style="text-align: center">
            <st>I Hobby To Help You ? <a href="' . self::settings()['url'] . '"><b> ' . self::settings()['title'] . ' </b></a></st>
            <div class="content">
                <p class="title">
                   <p>[' . $user . ']</p> Your Password Has Been Updated Form [IP ADDRESS = ' . $ip . '] At [' . date("Y-m-d l h:i:sa") . '].
                  If You are not this Please Click here To Return Your Account , 
                  If You are This Forget This Message , Thank You For Using My App. 
                   <b> We <b>' . self::settings()['title'] . '</b> Help team </b> 
                </p>
                
                <div>
                    <a href="' . self::settings()['url'] . '/auth/not-me/' . $id . '/' . $ip . '" class="btn btn-default">Not Me</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
        ';
        return $body;
    }









    public static function stopped($user)
    {
        $body = '
<html>
<title>

</title>
<body>
    <div class="container">
        <div class="main" style="text-align: center">
            <st>Help Team ? <a href="' . self::settings()['url'] . '"><b> ' . self::settings()[Users::getColumn(0)] . ' </b></a>- Stop Account</st>
            <div class="content">
                <p class="title">
                   <p>[' . $user . ']</p> You Tell Us You Are Not Change Your Account Password Therefore We Stopped Your Account.
                   To Return Start Your Account Please Send A Message For Us To Active Your Account, Thank You [ ' . $user . ' ]
                   <b> We <b>' . self::settings()['title'] . '</b> Help team </b> 
                </p>
            </div>
        </div>
    </div>
</body>
</html>
        ';
        return $body;
    }




    public static function unblock($user)
    {
        $body = '
            <html>
            <body>
                <div class="container">
                    <div class="main" style="text-align: center">
                        <st>Help Team ? <a href="' . self::settings()['url'] . '"><b> ' . self::settings()[Setting::getColumn(0)] . ' </b></a>- Unblock The  Account</st>
                        <div class="content">
                            <p class="title">
                               <p>[' . $user . ']</p> We Tell You In The Mail To Congratulation You For Unblock Your Account Now You Can Use Your Email Normal .
                               You Have More Information Or Helping Please Tell Us [ ' . $user . ' ]
                               <b> We <b>' . self::settings()[Setting::getColumn(0)] . '</b> Help team </b> 
                            </p>
                        </div>
                    </div>
                </div>
            </body>
            </html>
        ';
        return $body;
    }









    private static function settings()
    {
        return settings();
    }

    public static function Register($invented_user,$user)
    {

        $body = '
                <html>
                <title>
                
                </title>
                <body>
                    <div class="container">
                        <div class="main" style="text-align: center">
                            <st>Help Team ? <a href="' . self::settings()['url'] . '"><b> ' . self::settings()[Users::getColumn(0)] . ' </b></a>- Signed Up New Account</st>
                            <div class="content">
                                <p class="title">
                                   <p>Hey [ ' . $user . ' ] You Invented Of [ ' . $invented_user . ' ]  To Sign Up In [ ' . self::settings()[Setting::getColumn(0)] . ' ]</p>
                                   <b>You Are Accept This Invitation Or You Want To Continue Using Our App, Please Read This FAQ</b>
                                   <a href="' . self::settings()['url'] .'/page/faq#invitation-of-admin' . '">FAQ</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </body>
                </html>
                        ';
        return $body;

    }

}

