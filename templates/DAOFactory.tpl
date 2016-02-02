<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{

   public function __construct(){
        define('DB_HOST', '${host}');
        define('DB_NAME', '${database}');
        define('DB_USER', '${username}');
        define('DB_PASS', '${password}');
    }

	${content}
}
?>