<?php



use MRDEVELOPER\Vendor\Helper\Filter;
use MRDEVELOPER\Vendor\Helper\Redirect;
use MRDEVELOPER\Vendor\Http\Request;
use MRDEVELOPER\Models\Setting;


/**
 * @param $array
 * @param $key
 * @param null $default
 * @return null
 */
if (!function_exists("array_get")) {
    function array_get($array, $key, $default = null)
    {
        return isset($array[$key]) ? $array[$key] : $default;
    }
}




if (!function_exists("post")){
    /**
     * @param $key
     * @param null $default
     * @return null
     */
    function post($key, $default = null){
        return array_get($_POST,$key,$default);
    }
}

if (! function_exists("get"))
{
    function get($key,$default = null){
        return array_get($_GET,$key,$default);
    }
}


if (!function_exists('is')){
    /**
     * @param $data
     * @return bool
     */
    function is($data){
        return isset($data) ? true : false;
    }
}


/**
 * Hashing Password
 * @param $pass
 * @param int $algo
 * @return bool|string
 */
function pass_hash($pass, $algo = PASSWORD_DEFAULT){
    return password_hash($pass,$algo,['cost' => 12]);
}



if (!function_exists("tags")){
    /**
     * @param $tags
     * @param string $strReplace
     * @return array|mixed
     */
    function tags($tags, $strReplace = ','){
        $tags = Filter::String($tags);
        if (is_array($tags)){
            $tags = explode($strReplace,$tags);
            foreach ($tags as  $tag){
                return $tag;
            }
        } else{
            return $tags;
        }
    }
}

if (! function_exists('refresh')){

    /**
     *
     */
    function refresh(){
        Redirect::location(Request_Uri());
    }
}

if (! function_exists("back")){

    /**
     * @internal param $url
     * @param null $url
     */
    function back($url = null){
        if (referer() != null)
            Redirect::location(referer());
        else
            Redirect::location($url);
    }
}

if (! function_exists("redirect")){

    function redirect($location){
        Redirect::location($location);
    }
}

if (! function_exists("errors")){

    /**
     * @param array $errors
     * @return mixed|string
     */
    function errors($errors = []){
        foreach ($errors as $error) {
            $error = "<div class='alert alert-danger'>" . $error . "</div>";
        }
        return $error;
    }
}


if (! function_exists("is_post")){

    /**
     * @param $post
     * @return bool
     */
    function is_post($post){
        return isset($post);
    }
}

if (! function_exists("Script_Redirect"))
{
    /**
     *
     */
    function Script_Redirect(){
        echo "<script> location.reload = window.location.href </script>";
    }
}

if (!function_exists("getIco")){

    function getIco(){
        return settings()[Setting::getColumn(4)];
    }
}

if (! function_exists('ip')){

    /**
     * @return mixed
     */
    function ip(){
        return Request::server('REMOTE_ADDR');
    }
}

if (! function_exists("referer")){

    /**
     * @return mixed|null
     */
    function referer(){
        $back = Request::server("HTTP_REFERER");
        if ($back != null)
            return $back;
        else
            return null;
    }
}

if (! function_exists("Request_Uri")){

    /**
     * @return mixed
     */
    function Request_Uri(){
        return Request::server("REQUEST_URI");
    }
}


/**
 * The Method For Deleting Files Or Directories
 * @param $file
 * @return string
 */
function deleteFile($file){

    if (file_exists($file)) {
        if (unlink($file))
            $msg = "OK, File Was Deleted";
        else
            $msg = "Error While Deleting File";
    } else{
        $msg = "Sorry The " . $file . " Not Found";
    }
    return $msg;
}

/**
 * This Method For Rename File
 * @param $oldName
 * @param $newName
 * @return string
 */
function renameFile($oldName, $newName){
    if (file_exists($oldName)) {
        if (rename($oldName, $newName))
            $msg = "Ok, The " . $oldName . " Has Renamed To " . $newName;
        else
            $msg = "Error: While Renaming " . $oldName;
    } else{
        $msg = "Sorry The " . $oldName . " Not Found";
    }
    return $msg;
}


/**
 * Print_R Function
 * @param $data
 */
function pre($data){
    echo "<pre>";
        echo print_r($data);
    echo "</pre>";
}

if (! function_exists("getTitle")){

    /**
     *
     */
    function getTitle(){
        global $Name;
        if (isset($Name) && !empty($Name)){
            echo $Name . " | ";
        }
        ?> <?php echo settings()['title'];
    }
}

if (! function_exists("settings")){

    /**
     * @return null|stdClass
     */
    function settings(){
        return Setting::where(Setting::getKey(),1);
    }
}

if (! function_exists("ma_site_url")){

    /**
     * @return mixed
     */
    function ma_site_url(){
        return settings()['url'];
    }
}

if (! function_exists("window_link")){

    function window_link(){
        return ma_site_url() . Request_Uri();
    }
}

if (! function_exists("now")){

    /**
     * @return false|string
     */
    function now(){
        return date("Y-m-d H:i:s");
    }
}



if (! function_exists("ma_hash")){

    /**
     * @param null $string
     * @return bool|string
     */
    function ma_hash($string = null){
        if (!$string) {
            $string = rand(0, 1000000);
        }

        return pass_hash(sha1(md5($string, uniqid())));
    }
}

if (! function_exists("hash_verify")){

    /**
     * @param $string
     * @param $hash
     * @return bool
     */
    function hash_verify($string, $hash){
        return password_verify(sha1(md5($string,uniqid())),$hash);
    }
}


if (!function_exists("null")){

    /**
     * @param $var
     * @return bool
     */
    function null($var){
        return empty($var) ? true : false;
    }
}

if (! function_exists("alert")){

    /**
     * @param $type
     * @param $msg
     * @param $ico
     * @return string
     */
    function alert($type, $msg, $ico = null){
        $alert = "
                <div class='alert alert-" . $type . " alert-dismissible fade show' role='alert'>
                  <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                  </button>
                  <strong>. $ico . " . "  . $msg . </strong>
                </div>";
        return $alert;
    }
}

if (! function_exists("DataTable")){

    /**
     * @param int $column
     * @param string $sort
     * @return string
     */
    function DataTable( $sort = "desc",$column = 0){
        $sort = strtolower($sort);
        $script = '<script> $(function() { 
            var desc = "desc",acs = "acs";
            var table = $("#example1").DataTable(); 
            table.order([' . $column . ',' . $sort . ']).draw();
            })</script>';
        return $script;
    }
}




























