<?php

class CurrentUSPresident {
	const name = "Barack Obama";

	public static function greet($name){
		return "Hello ". $name . ", my name is " . CurrentUSPresident::name . ", nice to meet you!";
	}
}

$greetings_from_president = CurrentUSPresident::greet("Donald");