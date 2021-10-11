<?php

namespace App;

use \Illuminate\Database\Eloquent\Model;
use DB;

class LoginModel extends Model {


    public static function checklogin($data = NULL) {
        if (empty($data) || $data == NULL) {

            return 0;
        } else {
            $data = (array) DB::table('users')->where($data)->first();
            if ($data != null) {

                return $data;
            }
        }
    }

    public static function checkusername($username = NULL) {
        if (trim($username) == "") {
            return 0;
        }
        $user = DB::table('users')->where('username', trim($username))->pluck('username');

        if (!empty($user)) {
            return 0;
        } else {
            return 1;
        }
    }

    public static function getUserEmail($username = null) {
        if ($username != null) {
            $data = (array) DB::table('users')->where('username', '=', $username)->first();
            if ($data != null) {
                return $data;
            }
        }
        return false;
    }

    public static function updatepassword($email = null, $pass = null) {
        if ($email != null && $pass != null) {
            DB::table('users')
                ->where('username', $email)
                ->update(array('password' => md5($pass)));
            return true;
        }
        return FALSE;
    }

    public static function updateStatus($email = null) {
        if ($email != null) {
            DB::table('users')
                ->where('username', $email)
                ->update(array('status' => 1));
            return true;
        }
        return FALSE;
    }

}
