<?php

namespace App\Http\Controllers;
 
use Illuminate\Routing\Controller as BaseController;

class TestController extends BaseController
{ 
    public function show()
    {
        echo "show2";
    }
    public function check($user)
    {
        echo $user;
        echo "sus";
    }
}

?>