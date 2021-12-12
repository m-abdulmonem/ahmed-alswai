<?php
namespace MRDEVELOPER\Vendor\Helper;
use MRDEVELOPER\Vendor\Language\Lang;

/**
 * Class Uploader
 * @package ALMOSTAQBAL\Vendor\Helper
 */
class upload
{

    /**
     * @var string
     */
    private static $url = [];
    /**
     * @var array
     */
    private static $errors = [];

    /**
     * @var bool
     */
    private static $hasError = false;


    /**
     * upload constructor.
     * @param string $type
     * @param null $count
     */
    public function __construct($type = "img", $count = null)
    {
        $this->trigger($type,$count);
    }


    /**
     * @param string $type
     * @param null $count
     */
    private function trigger($type = "img", $count = null)
    {
        if ($type == "img"){
            if ($count == "s"){
                $this->uploadImages();
            } else{
                $this->uploadImage();
            }
            // end img
        }

    }



    /**
     * @return array
     */
    public  function getError()
    {
        return static::$errors;
    }

    /**
     * @return string
     */
    public  function getUrl()
    {
        return static::$url;
    }

    /**
     * @return bool|string
     */
    public  function img()
    {
        return self::uploadImage();
    }

    /**
     * @return array|string
     */
    public  function imgs()
    {
        return self::uploadImages();
    }


    /**
     * @return bool
     */
    public  function hasError()
    {
        return empty(static::$hasError);
    }

    /**
     * @param $name
     * @return bool
     */
    public  function hasUpload($name)
    {
        return !empty($_FILES[$name]['name']);
    }

    /**
     * @return array|string
     */
    public static function uploadImages()
    {
        $files = $_FILES['images'];
        for ($i=0;$i<count($files['name']);$i++){
            $name = $files['name'][$i];
            $tmp = $files['tmp_name'][$i];
            $size = $files['size'][$i];
            $type = $files['type'][$i];
            $path = RESOURCES;
            $extensions = explode('.',$name);
            $extensions = end($extensions);
            $extensions = strtolower($extensions);
            $array_extension = array('jpg','jpeg','png','gif');
            $array_type = array('image/jpg','image/jpeg','image/png','image/gif');
            $errors = array();
//            if (!in_array($extensions,$array_extension)){
//                $errors[] = Lang::lang("NOT_EXTE_IMG");
//            }
            if (!in_array($type,$array_type)){
                $errors[] = Lang::lang("NOT_EXTE_IMG");
            }
            if ($size > 2000000){
                $errors[] = Lang::lang("UP_SIZE");
            }

            if (empty($errors))
            {
                $name = "MA_IMG_" .date("Y-h-d") . "_" . $name;
                $path = $path . $name;
                $links[] = '/Uploads/Images/' . $name;
                static::$hasError = false;
                move_uploaded_file($tmp,$path);

                return  $links;
            }
            else
            {
                static::$hasError = true;
                return  $errors;
            }
        }

    }

    /**
     * @return array|string
     */
    private function uploadImage()
    {
        $name = $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];
        $size = $_FILES['image']['size'];
        $type = $_FILES['image']['type'];
        $path = RESOURCES;
        $extensions = explode('.',$name);
        $extensions = end($extensions);
        $extensions = strtolower($extensions);
        $array_extension = array('jpg','jpeg','png','gif');
        $array_type = array('image/jpg','image/jpeg','image/png','image/gif');
        $errors = array();
        if (!in_array($extensions,$array_extension)){
            $errors[] = Lang::lang("NOT_EXTE_IMG");
        }
        if (!in_array($type,$array_type)){
            $errors[] = Lang::lang("NOT_EXTE_IMG");
        }
        if ($size > 2000000){
            $errors[] = Lang::lang("UP_SIZE");
        }

        if (empty($errors))
        {
            $name = "MA_IMG_" . date("Y-h-d") . "_" . $name;
            $path = $path . $name;
            $url = '/Uploads/Images/' . $name;

            static::$hasError = false;
            move_uploaded_file($tmp,$path);
            return static::$url[] = $url;
        }
        else
        {
            static::$hasError = true;
            return static::$errors[] = $errors;
        }
    }

    public function isEmpty()
    {
        return empty($_FILES);
    }

}