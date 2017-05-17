<?php 
class Player {
	public $blood = 100;
	public $mana = 40;
}

class Create extends Player {
	private $nama = '';

	public function setNama($nama) {
		$this->nama = $nama;
	}
	public function getNama() {
		return $this->nama;
	}
	public function setMana($mana) {
		$this->mana = $mana;
	}
	public function getMana() {
		return $this->mana;
	}
	public function setBlood($blood) {
		$this->blood = $blood;
	}
	public function getBlood() {
		return $this->blood;
	}
}

class Run {
	public function Main() {
		$p1 = new Create();
		$p2 = new Create();
			
		echo "# ============================== #
# Welcome to the Battle Arena #
# ------------------------------------------------- ---- #
# Description: #
# 1 type \"new\" to create a character #
# 2. type \"start\" to begin the fight #
# ------------------------------------------------- ---- #
# Current Player: #
# - #
# * Max player 2 or 3 #
# ------------------------------------------------- ---- # \n";

		echo "\n";

		echo "Choose name Player 1 : ";
		fscanf(STDIN,"%s\n", $input);
		$p1->setNama($input);

		echo "\n";

		echo "Choose name Player 2 : ";
		fscanf(STDIN,"%s\n", $input);
		$p2->setNama($input);

		echo "\n";
		echo "# ============================================= #\n";
		echo "Player Status\n";
		echo "Player 1 = Name : ".$p1->getNama()." Blood : ".$p1->getBlood()." Mana : ".$p1->getMana();
		echo "\nPlayer 2 = Name : ".$p2->getNama()." Blood : ".$p2->getBlood()." Mana : ".$p2->getMana();

		echo "\n\n";
		for($i = 0;;$i++) {
			if($p1->getMana() == 0) {
				echo "\n\nGame Over !!!";
				break;
			} elseif ($p2->getMana() ==0) {
				break;
				echo "\n\nGame Over !!!";
			} elseif($p2->getBlood() == 0) {
				break;
				echo "\n\nGame Over !!!";
			} elseif($p1->getBlood() == 0) {
				break;
				echo "\n\nGame Over !!!";
			} else {
				echo "\nwho will attack: ";
				fscanf(STDIN,"%s\n", $att);
				echo "\n";
				echo "who defend: ";
				fscanf(STDIN,"%s\n", $def);
				echo "\n";
				if(($att == $p1->getNama() || $att == $p2->getNama()) && ($def == $p1->getNama() || $def == $p2->getNama()) )
				{
					if($att == $p1->getNama()) {
						echo $p1->getNama(). " Attack!\n\n";

							$mana = rand(1,10);

						$sisamanap1 = $p1->getMana() - $mana;
						$p1->setMana($sisamanap1);
						$sisadarahp2 = $p2->getBlood() -$mana * 2.5;
						$p2->setBlood($sisadarahp2);
						echo "Player Status\n";
						echo "Player 1 = Name : ".$p1->getNama()." Blood : ".$p1->getBlood()." Mana : ".$p1->getMana();
						echo "\nPlayer 2 = Name : ".$p2->getNama()." Blood : ".$p2->getBlood()." Mana : ".$p2->getMana() . "\n";
					} else {
						echo $p2->getNama(). " Attack!\n\n";

							$mana = rand(1,10);

						$sisamanap2 = $p2->getMana() - $mana;
						$p2->setMana($sisamanap2);
						$sisadarahp1 = $p1->getBlood() -$mana*2.5;
						$p1->setBlood($sisadarahp1);
						echo "Player Status\n";
						echo "Player 1 = Name : ".$p1->getNama()." Blood : ".$p1->getBlood()." Mana : ".$p1->getMana();
						echo "\nPlayer 2 = Name : ".$p2->getNama()." Blood : ".$p2->getBlood()." Mana : ".$p2->getMana() ."\n";
					}
				} else 
				{
					if(!($att == $p1->getNama() || $att == $p2->getNama()) ) {
						echo "Wrong name attacker !\n";		
					} else {
						echo "Wrong name defender !\n";
					}
					
				}
			}
		}
	}
}

$exec = new Run();
$exec->main();
?>

