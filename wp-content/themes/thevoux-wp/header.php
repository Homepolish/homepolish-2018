<?php

$path = explode( '/', $_SERVER['REQUEST_URI'] );

if ( $path[1] == 'mag' || $path[1] == 'designer' ) {

	require( 'header-mag.php' );
}
else {

	require( 'header-2018.php' );
}