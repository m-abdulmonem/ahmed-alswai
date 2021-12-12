<?php

/**
 * @param string $phrase
 * @return string
 */
function AR(string $phrase){

    static $language = array(
        'LOGO'                => 'For Buildings Future',
        'SIGN_IN'             => 'تسجيل الدخول',
        'SIGN_UP'             => 'تسجيل',
        'ACCOUNT'             => 'حسابك',
        'ORDERS'              => 'الطلبات',
        'BUY_PRODUCT'         => 'شراء',
        'HOME_PAGE'           => 'الصفحة الرئيسية',
        'ABOUT_US'            => 'عنا',
        'CONTACT_US'          => 'الإتصال بنا',
        'OUR_PROJECTS'        => 'منتجاتنا',
        'OUR_PHOTOS'          => 'صورنا',
        'SITE_MAP'            => 'خريطة الموقع',
        'FACEBOOK_NEWS'       => 'صفحتنا',
        'ABOUT_ME'            => 'عنى',
        'FIRST_RIGHT'         => 'AllCopyRights For',
        'DEVELOPER'           => 'Design And Dev By',
        'ME'                  => 'Mohamed Abdulmonem',
        'MANGER'              => 'Essam Jumea',
        'MANGER_DESC'         => 'Iam A Manager Almostaqbal Company For Create A Zaghaf For Modern And Best Design',
        'LOG_OUT'                      => 'تسجيل الخروج',
        'REGISTER_MSG_OK'              => 'برجاء تأكيد حسابك بالرجوع الى الايميل الذى تم التسجيل بية',
        'PASS_ERROR_DR'                => 'عفوا! كلمة المرور غير صحيحه',
        'PASS_ERROR_EM'                => 'عفوا! لايجب ترك كلمة المرور فارغة',
        'RE_PASS_ERROR_EM'             => 'عفوا لايجب ترك إعادة كلمة المرور فارغة',
        'USER_ERROR_DR'                => 'عفوا! إسم المستخدم غير صحيح',
        'USER_ERROR_EM'                => 'عفوا! لايجب ترك إسم المستخدم فارغ',
        'NAME_ERROR_EM'                => 'عفوا! لايجب ترك ﻹسم فارغ',
        'EMAIL_ERROR_EM'               => 'عفوا! لايجب ترك البريد ﻹكترونى فارغ',
        'FORM_ERROR_EM'                => 'عفوا لايجب ترك الحقول فارغة',
        'BACK_HOME'                    => 'عفوا لاتستطيع الدخول هنا برجاء الرجوع الى الصفحة الرئيسية',
        'REMEMBER_ME'                  => 'تذكرنى',
        'EMAIL'                        => 'البريد الإلكترونى',
        'PASSWORD'                     => 'كلمة المرور',
        'RE_PASSWORD'                  => 'إعادة كلمة المررو',
        'USERNAME'                     => 'إسم المستخدم',
        'FULL_NAME'                    => 'الإسم كاملا',
        'CANCEL'                       => 'إلغاء',
        'UPLOAD'                       => 'رفع',
        'CHOICE_PICTURE'               => 'إختار صورتك',
        'NOT_EXTE_IMG'                 => 'عفوا! برجاء رفع صورة فقط',
        'UP_SIZE'                      => 'عفوا حجم الصورة يجب ان يكون اقل من 2mg',
        'DESC'                         => 'الوصف',
        'USER>4'                       => 'عفوا! إسم المستخدم يجب ان يكون اكبر من 4 أحرف',
        'PASS>6'                       => 'عفوا! كلمة المرور يجب ان تكون اكبر من 6 حروف',
        'PASS_NOT_MATCH'               => 'عفوا! كلمة المرور غير مطتابقة',
        'EMAIL_EXISTS'                 => 'عفوا هذا البريد الالكترونى موجود مسبقا',
        'USER_EXISTS'                  => 'عفوا هذا المستخدم موجود مسبقا',
        'VALID_EMAIL'                  => 'برجاء كتابة عنوان بريد إلكترونى صحيح',
        'U_HAVE_ERROR'                 => 'عفوا هناك خطأبرجاء المحاولة مره اخرى',
        'ACCOUNT_CREATED'              => 'تم إنشاء حسابك بنجاح.<br /> برجاء تأكيد حسابك',
        'LOGIN_INVALID'                => 'عفوا! البيانات المدخلة غير صحيحة',
        'USER_MUST_STRING'             => 'عفوا إسم المستخدم لابد ان يكون نص',
        'LOGIN_ACTIVATION'             => 'عفوا! برجاء تأكيد الحساب لتتمكن من الدخول',
        'LOGIN'                        => 'تسجيل الدخول',
        'REGISTER_INVALID_MAIL'        => 'من فضللك أدخل بريد إلكترونى صحيح',
        'USER'                         => 'مستخدم',
        'SUBJECT_ACTIVE'               => 'رسالة تفعيل',
        'TRY_AGAIN'                    => 'برجاء المحاولة مره اخرى',
        'F_PASS'                       => 'هل نسيت كلمة مرورك؟',
        'REGISTER'                     => 'ليس لديك حساب إنشاء واحد',
        'ADMIN'                        => 'لوحة التحكم',
        'BLOCK_MAIL'                   => 'رسالة تأكيد الحظر',
        'UNBLOCK_MAIL'                 => 'رسالة فك الحظر',
        'REGISTER_MAIL'                => 'رسالة دعوه ',



        );

    return $language[$phrase];
}