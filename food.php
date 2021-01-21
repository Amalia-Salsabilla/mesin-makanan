<?php
class food{
	public $food;
	public $foodprice = 0;

	public $lighttopping = array();
	public $mediumtopping = array();

	public $totallighttopping = 0;
	public $totalmediumtopping = 0;

	public $costlighttopping = 0;
	public $costmediumtopping = 0;

	// method untuk menentukan jenis makanan
	function setFood($new_food){
		if($new_food == 1){
			$this->food = "Soto";
			$this->foodprice  += 20000;
		}elseif($new_food == 2){
			$this->food = "Rawon";
			$this->foodprice  += 13000;			
		}elseif($new_food == 3){
			$this->food = "Nasi Campur";
			$this->foodprice  += 20000;
		}
	}
	function getFood(){
		return $this->food;
	}

// aturan 1
	// method untuk menentukan topping ringan
	function addLightTopping($light, $total){
		if($light == 1){
			$light = "Krupuk";
			$this->costlighttopping += 500*$total;
		}else if($light == 2){
			$light = "Selada";
			$this->costlighttopping += 50*$total;
		}else if($light == 3){
			$light = "Garam 1 sendok";
			$this->costlighttopping += 3*$total;
		}else if($light == 4){
			$light = "Gula 1 sendok";
			$this->costlighttopping += 1*$total;
		}

		//menambahkan ke Array
		array_push($this->lighttopping, $light);
		$this->totallighttopping += $total;
	}

// aturan 2
	// method untuk menentukan topping sedang\
	function addMediumTopping($medium, $total){
		if($medium == 1){
			$medium = "Ayam Suwir";
			$this->costmediumtopping += 3000*$total;
		}else if($medium == 2){
			$medium = "Daging potong";
			$this->costmediumtopping += 1000*$total;
		}

		// menambahkan ke Array
		array_push($this->mediumtopping, $medium);
		$this->totalmediumtopping += $total;
	}

	function totalFinal(){
		$subTotal = $this->foodprice + $this->costlighttopping + $this->costmediumtopping;
		$disc = 0;
		$totalDiscount = 0;
		$grandTotal = 0;

// aturan 3
		if($this->food == "Nasi Campur" && count ($this->lighttopping) > 0 && count($this->mediumtopping) > 0){
			$disc = 2;
			$totalDiscount = $subTotal * 2/100;
			$grandTotal = $subTotal - $totalDiscount;
// aturan 4
		}elseif ($this->food == "Soto" || $this->food == "Rawon"){
			if($this->totallighttopping == 3 && $this->totalmediumtopping == 4){
				$disc = 3;
				$totalDiscount = $subTotal * 3/100;
				$grandTotal = $subTotal - $totalDiscount;
			}else{
				$grandTotal = $subTotal;
			}
		}else{
			$grandTotal = $subTotal;
		}

		echo "\n\n==================== INFORMASI PEMBELIAN ====================";
		echo "\nMakanan \t: $this->food";
		echo "\nTopping Ringan \t: ";
		if (count($this->lighttopping) > 0){
			for($i=0; $i<count($this->lighttopping); $i++){
				echo $this->lighttopping[$i];
				if ($i < count($this->lighttopping)-1) {
					echo ", ";
				} else {
					echo ".";
			}
		}
	} else {
		echo "-";
	}
	echo "\nTopping Sedang \t: ";
	if(count($this->mediumtopping) > 0){
		for ($i=0; $i < count($this->mediumtopping); $i++){
			echo $this->mediumtopping[$i];
			if ($i < count($this->mediumtopping)-1){
				echo ", ";
			}else{
				echo ".";
			}
		}
	}else{
		echo "-";
	}
	echo "\nDiskon Makanan \t: $disc%";
	echo "\nTotal Diskon \t: Rp. ".number_format($totalDiscount).",-";
	echo "\nGrand Total \t : Rp. ".number_format($grandTotal).",-";

	echo "\n======================================================================";
}
}
?>