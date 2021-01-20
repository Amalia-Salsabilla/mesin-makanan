<?php 
include("food.php");
	$foodmachine = new food();
	$lightToppingMenu = false;
	$mediumToppingMenu = false;

	echo "\n+===== DAFTAR MAKANAN YANG TERSEDIA =====+\n";
	echo "1. Soto = Rp. 20.000 \n";
	echo "2. Rawon = Rp. 13.000 \n";
	echo "3. Nasi Campur = Rp.20.000 \n";
	$inputFood = readline("Masukkan Pilihan Makanan (1/2/3): ");

	if($inputFood > 3){
		echo "Invalid menu.";
		exit();
	}else{
		$foodmachine->setFood($inputFood);
	}

	echo "\n";

	$needLightTopping = readline("Ingin Topping Ringan? (Y/N) : ");
	if ($needLightTopping == "Y" || $needLightTopping == "y"){
		$lightToppingMenu = true;
	}elseif ($needLightTopping == "N" || $needLightTopping == "n") {
		$lightToppingMenu = false;
	}else{
		echo "Invalid menu.";
		exit();
	}

	while ($lightToppingMenu) {
		echo "\n+===== DAFTAR TOPPING RINGAN =====+\n";
		echo "1. Krupuk = Rp. 500 \n";
		echo "2. Selada = Rp. 50 \n";
		echo "3. Garam = Rp. 3 \n";
		echo "4. Gula = Rp. 1 \n\n";
		$inputlightTopping = readline("Masukkan pilihan topping ringan (1/2/3/4) : ");
		
		if($inputlightTopping > 4){
			echo "Invalid menu.";
			exit();
		}
		$inputTotalLightTopping = readline("Masukkan banyaknya topping : ");
		echo "\n";
		
		$foodmachine->addLightTopping($inputlightTopping, $inputTotalLightTopping);

		$isFinish = readline("Apakah ingin menambah topping ringan lagi? (Y/N) : ");
		if($isFinish == "Y" || $isFinish == "y"){
			$lightToppingMenu = true;
		}elseif ($isFinish == "N" || $isFinish == "n") {
			$lightToppingMenu = false;
		}
	}

	echo "\n";

	$needMediumTopping = readline("Ingin Topping Sedang? (Y/N) : ");
	if ($needMediumTopping == "Y" || $needMediumTopping == "y"){
		$mediumToppingMenu = true;
	}elseif ($needMediumTopping == "N" || $needMediumTopping == "n") {
		$mediumToppingMenu = false;
	}else{
		echo "Invalid menu.";
		exit();
	}

	while ($mediumToppingMenu) {
		echo "\n+===== DAFTAR TOPPING SEDANG =====+\n";
		echo "1. Ayam suwir = Rp. 3000 \n";
		echo "2. Daging potong kecil = Rp. 1000 \n\n";
		$inputMediumTopping = readline("Masukkan pilihan topping sedang (1/2) : ");
		if($inputMediumTopping > 2){
			echo "Invalid menu.";
			exit();
		}

		$inputTotalMediumTopping = readline("Masukkan banyaknya topping : ");
		echo "\n";
		
		$foodmachine->addMediumTopping($inputMediumTopping, $inputTotalMediumTopping);

		$isFinish = readline("Apakah ingin menambah topping sedang lagi? (Y/N) : ");
		if($isFinish == "Y" || $isFinish == "y"){
			$mediumToppingMenu = true;
		}elseif ($isFinish == "N" || $isFinish == "n") {
			$mediumToppingMenu = false;
		}
	}

	$foodmachine->totalFinal();

?>