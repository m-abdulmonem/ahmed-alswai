<?php
namespace MRDEVELOPER\Vendor\Language;
use MRDEVELOPER\Controllers\Admin\SettingsController;
use MRDEVELOPER\Models\Setting;
use MRDEVELOPER\Models\Users;
use MRDEVELOPER\Vendor\session;

/**
 * Class Lang
 * @package MRDEVELOPER\Vendor\Language
 */
class Lang
{
    /**
     * @param string $phrase
     * @return mixed
     */
    public static function lang(string $phrase)
    {
        $phrase = strtoupper($phrase);
        if (!session::has("MR_DEVELOPER") or !session::has("MR_DEVELOPER_ADMIN")) {
            if (settings()['lang'] == "ar")
                return self::AR($phrase);
            else
                return self::EN($phrase);
        } else{
            if (Users::where("UserId " , session::get("MR_DEVELOPER") or session::get("MR_DEVELOPER_ADMIN"))['lang'] == "ar")
                return self::AR($phrase);
            else
                return self::EN($phrase);
        }
    }

    /**
     * @param string $phrase
     * @return string
     */
    protected function AR(string $phrase){
        include_once "languages/Ar.php";
        return AR($phrase);
    }

    /**
     * @param string $phrase
     * @return string
     */
    protected function EN(string $phrase){
        include_once "languages/EN.php";
        return EN($phrase);
    }












    /**
     * @param string $phrase
     * @return mixed
     */
    protected function MA_EN(string $phrase){

//        try{
//            $lang =  simplexml_load_file("languages/en.xml");
//            $lang->About;
//        } catch (Thrown $error){
//            $error->getMessage();
//        }

    }
}