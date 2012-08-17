<?php
class animal{
	public $sHungry='hell yeah!';// class variable

	
	// class method
	function eat($food,$theBreed){
			// global $sBreed will not work here since it must be global outside the class
			// changing the class variable value
			// nota: $food is not used in this function
			$food=','.$food.',';
			$this->sHungry=(strchr(',people,cats,iguanas,wolves,rats,douche bags,',$food))?'hell yeah! '.$theBreed.' likes it':'not so much! '.$theBreed.' no like it.';
	}
	

}// end class

interface Gender{
	// this interface implements that there is only two genders male and female with their proper id
	// thus i can't call Gender.Androgenous must be Gender.Male or Gender.Female
	const MALE='m';
	const FEMALE='f';
}

interface Showble{
	public function show();
	
}

class dog extends animal implements Gender,Showble{
	public $sBreed='Lab';
	
	//constructor always this syntax "__construct"
	function __construct($sBreed){
		$this->sBreed=$sBreed;
		$this->sGender=Gender::MALE;// gets the constant from the interface
		echo $this->sGender;
	}	
	
	function Show(){
		//echo $this->sGender;
		//echo $this->sBreed;
		//echo $this->sHungry;
		foreach($this as $name => $value){
			echo "<li>$name = $value</li>";
		}
	}
	
	function __destruct(){
		// this will destroy the instance of this object when going out of scope
		echo "<br/>in the destructor";
	}	
}// end class

?>