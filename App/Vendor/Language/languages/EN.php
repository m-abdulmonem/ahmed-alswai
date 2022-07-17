<?php


/**
 * @param string $phrase
 * @return string
 */
function EN(string $phrase){
    static $language = array(
        //البريد الإلكترونى
        'LOGO'                         => 'For Buildings Future',
        'SIGN_IN'                      => 'Sign In',
        'SIGN_UP'                      => 'Sign Up',
        'LOG_OUT'                      => 'Log out',
        'ACCOUNT'                      => 'Account',
        'ORDERS'                       => 'Orders',
        'BUY_PRODUCT'                  => 'Buy Product',
        'HOME_PAGE'                    => 'Home Page',
        'ABOUT_US'                     => 'About US',
        'CONTACT_US'                   => 'Contact US',
        'OUR_PROJECTS'                 => 'Our Project',
        'OUR_PHOTOS'                   => 'Our Photos',
        'SITE_MAP'                     => 'Site Map',
        'FACEBOOK_NEWS'                => 'Facebook News',
        'ABOUT_ME'                     => 'About Me',
        'FIRST_RIGHT'                  => 'AllCopyRights For',
        'DEVELOPER'                    => 'Design And Dev By',
        'ME'                           => 'Mohamed Abdulmonem',
        'MANGER'                       => 'Essam Jumea',
        'MANGER_DESC'                  => 'Iam A Manager Almostaqbal Company For Create A Zaghaf For Modern And Best Design',
        'FULL_NAME'                    => 'Full Name',
        'EMAIL'                        => 'Email',
        'SUBJECT'                      => 'Subject',
        'MESSAGE_CONTENT'              => 'Message Content',
        'SEND'                         => 'Send Message',
        'REMEMBER_ME'                  => 'Remember me',
        'PASSWORD'                     => 'Password',
        'RE_PASSWORD'                  => 'Re Password',
        'USERNAME'                     => 'Username',
        'F_PASS'                       => 'I Forget My Password?',
        'REGISTER'                     => 'Register A New Membership?',
        'REGISTER_MSG_OK'              => 'Your Account Has Been created:). Please Activate Your Account.',
        'SUBJECT_ACTIVE'               => 'Activation Message',
        'USER'                         => 'User',
        'ADMIN'                        => 'Control Panel',
        'TEST'                         => 'Testimonials',
        'LOGIN'                        => 'Login',
        'REGISTER_INVALID_MAIL'        => 'Please Enter A Valid Email',
    );
    return array_key_exists($phrase,$language) ?  $language[$phrase] : $phrase;
}
