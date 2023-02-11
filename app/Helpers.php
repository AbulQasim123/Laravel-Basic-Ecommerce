<?php
		 /* What are helper and how to use it in laravel. */
    if(!function_exists('removeWhiteSpace')){
		function removeWhiteSpace($strings){
			return strtolower(str_replace(" ","-", $strings));
		}
	}