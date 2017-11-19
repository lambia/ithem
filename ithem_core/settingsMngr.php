<?php
/*
Name: Modulo Settings - ithem CMS 
Version: Draft
Author: Bruno Paolillo
Author URI: https://github.com/ziobru

Creazione cartella settings e file settings.json per contenere url o settaggi del cms Ithem.

*/


class settings{
       
public $cdn_url;
private $_backend_login;         
        

/*  

@param $cdn_url - L'eventuale cartella o url che ospita il cdn di fogli di stile e file javascript.

@param $backend_url - L'eventuale url della pagina di login del back-end o del front-end.

*/    
    
function __construct($cdn_url, $backend_url){
    if($cdn_url != null and $backend_url != null){
    $this->cdn_url = $cdn_url;
    $_backend_login = $backend_url;    
    $this->path = realpath(__DIR__).DIRECTORY_SEPARATOR.'settings'.DIRECTORY_SEPARATOR;
    $_pathContents = $this->path.'settings.json';    
    if(!file_exists($this->path)){
        mkdir($this->path, 0777, true);    
    $cms_url_settings = array('media_cdn_url'=>$this->cdn_url,'backend_login_url'=>$_backend_login);    
    $_saveSettings = file_put_contents($_pathContents,json_encode($cms_url_settings, JSON_UNESCAPED_SLASHES));    
        return $_saveSettings;
            }  
        }               
    }

/*

Metodo per il caricamento del file settings.json

*/    
    
public function loadSettings(){
    $_pathContents = $this->path.'settings.json';    
    $_loadSettings = file_get_contents($_pathContents);
    $_readSettings = json_decode($_loadSettings);    
        return $_readSettings;
    }
}

?>
