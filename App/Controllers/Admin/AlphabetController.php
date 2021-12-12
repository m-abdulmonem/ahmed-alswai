<?php
namespace MRDEVELOPER\Controllers\Admin;

use MRDEVELOPER\Controllers\Controller;
use MRDEVELOPER\Models\Alphabet;

class AlphabetController extends controller
{


    public function index()
    {
        $this->Data['Name'] = "كل الفئات";
        $this->Data['javascript'] = [DataTable("desc")];
        $this->Data['alphabets'] = Alphabet::order("DESC");
        return $this->View();
    }

    public function all()
    {
        $this->setAction("index");
        $this->index();
    }

}