<?php 

	class Animal
	{
		protected $name;
		protected $gender;
		protected $health;

		
		function __construct($name, $gender, $health)
		{
			$this->name = $name;
			$this->gender = $gender;
			$this->health = $health;
		}

		public function getName(){
			return $this->name;
		}
		public function getGender(){
			return $this->gender;
		}
		public function getHealth(){
			return $this->health;
		}

		public function changeHealth($healthPoints){
			$hp = $this->health + $healthPoints;
			if ( $hp < 0 ){
				$hp = 0;
			}
			return $this->health = $hp;
		}

		public function doSpecialMove(){
			return 'walk';
		}

	}

?>