<?php
/**
 * Created by PhpStorm.
 * User: MMA
 * Date: 01/07/2017
 * Time: 11:05 PM
 */

namespace App;

use Illuminate\Support\Facades\Auth;
use Session;

class MmaFunctions
{
public static function mmaauth12(){
$usertype=Auth::user()->usertypeid;
    if ((int)$usertype > 2)
    {
        Session::flash('danger','You are not authorized to access this command.');

        return false;
    }
    else
    {
        return true;
    }

}

}