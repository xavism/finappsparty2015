<?php

/** Development Environment **/
// when Set to false, no error will be throw out, but saved in temp/log.txt file.
define ('DEVELOPMENT_ENVIRONMENT',true);

/** Site Root **/
// Domain name of the site (no slash at the end!)
//define('SITE_ROOT' , 'http://You domain name');
define('SITE_ROOT' , 'http://192.168.10.25');


define ('DEFAULT_CONTROLLER', "index");
define ('DEFAULT_ACTION', "index");

/** MYSQL Options **/
define ('MYSQL_SERVER', 'localhost');
define ('MYSQL_USER', 'pi');
define ('MYSQL_PASSWORD', 'fiber4fiber');
define ('MYSQL_DB', 'finapps');