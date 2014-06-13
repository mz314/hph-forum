<?php

require_once 'request.php';
require_once 'dbConn.php';
require_once 'url.php';
require_once 'user.php';
require_once 'menu.php';
require_once 'dataAbstract.php';
require_once 'language.php';

class factory {

    static private $objects = array();
    static private $models = array();
    static private $lang = Null;

    static function getLang() {
        if (!factory::$lang) {
            factory::$lang = new language(factory::getRequest());
        }
        return factory::$lang;
    }

    static private function get($name) {
        if (!array_key_exists($name, factory::$objects)) {
            factory::$objects[$name] = new $name();
        }
        return factory::$objects[$name];
    }

    static function getUser() {
        return factory::get('user');
    }

    static function getRequest() {
        return factory::get('request');
    }

    static function getURL() {
        return factory::get('url');
    }

    static function getGroups() {
        return factory::get('groups');
    }

    static function getDB() {
        return factory::get('dbConn');
    }

    static function getMenu() {
        return factory::get('menu');
    }

    static function getModel($name) {
        $model = null;
        $model_fn = APP_WD . '/models/' . $name . 'Model.php';

        if (!array_key_exists($name, factory::$models)) {
            if (file_exists($model_fn)) {
                require $model_fn;
                $mname = $name . 'Model';
                $model = new $mname;

                factory::$models[$name] = $model;
            } else {
                return null;
            }
        }

        return factory::$models[$name];
    }

}

/* shortcuts */

function url($params) {
    return factory::getURL()->makeGet($params);
}

function t($key) {
    $l = factory::getLang(factory::getRequest());
    return $l->translate($key);
}

function isL() {
    return factory::getUser()->isLogged();
}

function isA() {
    return factory::getUser()->isAdmin();
}

function isM() {
    return factory::getUser()->isModerator();
}