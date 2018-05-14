<?php

$path = explode( '/', $_SERVER['REQUEST_URI'] );

if ( $path[1] == 'mag' || $path[1] == 'designer' ) {

	require( 'footer-mag.php' );
}
else {

	require( 'footer-2018.php' );
}