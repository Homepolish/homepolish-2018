<?php

// maybe make this a function, return true and use header/footer

$path = explode( '/', $_SERVER['REQUEST_URI'] );

if ( $path[1] == 'mag' || $path[1] == 'designer' ) {

	require( 'functions-mag.php' );
}
else {

	require( 'functions-2018.php' );
}