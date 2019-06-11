<?php

/**
 * Created by PhpStorm.
 * User: Godson
 * Date: 8/17/2017
 * Time: 1:37 PM
 */
class login extends CI_Controller
{
    public function index(){
       // $this->db->query("insert into users(uname,upass) VALUES('system','".md5('password')."') ");
         session_start();
         if(isset($_SESSION['uname']) && isset($_SESSION['upass'])){

             header("location:/app");
         }else{

             $this->load->view("login");

         }

    }

}