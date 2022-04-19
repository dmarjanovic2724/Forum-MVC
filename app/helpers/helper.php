<?php
session_start();
function redirect($page){
    header('Location:'.$page);
}

function cancle()
{
     if (isset($_SERVER['HTTP_REFERER'])) {
        echo "<a class='btn btn-outline-primary  m-1' href=" . $_SERVER['HTTP_REFERER'] . ">Cancle</a>";
    } 
}

function linkTo(string $link, string $text)
{
   echo "<a class='btn btn-outline-primary m-1' href='".URLROOT.$link."'>$text</a>";
}
function previous(string $link, string $text)
{
   echo "<a class='btn btn-outline-primary m-1' href='".URLROOT.$link."'>$text</a>";
}

function setUserSession($user)
{
    $_SESSION['currentUser'] = $user;
}

function unsetUserSession(){
    unset($_SESSION['currentUser']);
}

function getUserSession(){
    if(isset($_SESSION['currentUser'])){     
        return $_SESSION['currentUser'];
    }else{        
        return false;
    }
}

function flash($name='', $message='')
{
    if(!empty($name))
    {
        if(!empty($message))
        {
            if(isset($_SESSION[$name]))
            {
                unset($_SESSION[$name]);
            }
            $_SESSION[$name]=$message;
        }else
        {
            if(isset($_SESSION[$name]))
            {
                echo "<div class='alert alert-success'>".$_SESSION[$name]."</div>";
                unset($_SESSION[$name]);
            }
        }
}

}

function dd($data)
{
        echo "<pre>";
        var_dump($data);
        echo "</pre>";
        exit;
}


function putSession($name='', $value){
    if(isset($_SESSION[$name])){
        unset($_SESSION[$name]);
    }
    $_SESSION[$name] = $value;
}

function getSession($name='')
{
    if(isset($_SESSION[$name])){
        return $_SESSION[$name];
    }
}

function deleteSession($name='')
{
    if(isset($_SESSION[$name])){
        unset($_SESSION[$name]);
    }
}

function setCurrentId($value){
    if(isset($_SESSION['curId'])){
        unset($_SESSION['curId']);
    }
    $_SESSION['curId'] = $value;
}

function getCurrentId(){
    if(isset($_SESSION['curId'])){
        return $_SESSION['curId'];
    }
 }

 function deleteCurrentId(){
    if(isset($_SESSION['curId'])){
        unset($_SESSION['curId']);
    }
 }