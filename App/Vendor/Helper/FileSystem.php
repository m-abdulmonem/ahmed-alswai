<?php
namespace MRDEVELOPER\Vendor\Helper;

/**
 * Class FileSystem
 * @package AlMOSTAQBAL\Vendor\Helper
 */
class FileSystem{


    /**
     * @param $file
     * @return bool
     */
    public static function remove($file)
    {
        if (file_exists($file))
            return unlink($file);
    }
    /**
     * The Method For Deleting Files Or Directories
     * @param $file
     * @return string
     */

    public static function deleteFile($file){

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
    public static function renameFile($oldName, $newName){
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

    public static function renamOnly($oldName, $newName)
    {
        if (file_exists($oldName)) {
            if (rename($oldName, $newName))
                return rename($oldName,$newName);
            else
                return null;
        }
    }

}

