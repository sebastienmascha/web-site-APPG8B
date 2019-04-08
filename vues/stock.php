<?php  /** * Vue : accueil */ ?>

<style>
<?php include "css/css_stock.css"; ?>
</style>


<form class="formulaire">
	<select>
	<option value="">Maison par défaut</option>
	<option value="">Maison Lyon</option>
	<option value="">Chalet Avoriaz</option>
	<option value="">Appartement Biarritz</option>
	</select>
</form>

<ul class="machinesCafe">
    <li class="cafetiere"><a href="#1"> Machine Cuisine </a></li>
    <li class="cafetiere"><a href="#2"> Machine chambre Titouan </a></li>
    <li class="cafetiere"><a href="#3"> Machine chambre d'amis</a></li>
    <li class="cafetiere"><a href="#4"> Machine salon</a></li>
</ul>



<div classe="boiteprincipale">
	<div class="boite1">
		<p class="p_stock"> Café </p>
		<img class="cafe" src="./img/coffee_icon.png" >
		<div class="box">
			<a href="https://www.dolce-gusto.fr/boissons/grande-morning-16-capsules" target="_blank"> <button> Commander </button> </a>
		</div>
		<br>
		<div class="progress-bar green"></div>
	</div>




	<div class="boite2">
	<p class="p_stock"> Chocolat chaud </p>
	<img class="cafe" src="./img/Chocolat.png" >
	<div class="box">
		<a href="https://www.dolce-gusto.fr/boissons/chocolat/chococino-chocolat-chaud" target="_blank"> <button> Commander </button></a>
	</div>
	<br>
	<div class="progress-bar green"></div>
	</div>


	<div class="boite3">
		<p class="p_stock"> Latte </p>
		<img class="cafe" src="./img/latte.png" >
		<div class="box">
			<a href="https://www.dolce-gusto.fr/boissons/cappuccino-latte/latte-macchiato" target="_blank"> <button> Commander </button> </a>
		</div>
		<br>
		<div class="progress-bar green"></div>
	</div>

		<div class="boite4">
		<p class="p_stock"> Cappuccino </p>
		<img class="cafe" src="./img/Cappuccino.png" >
		<div class="box">
		<a href="https://www.dolce-gusto.fr/boissons/cappuccino-latte/cappuccino" target="_blank"> <button> Commander </button> </a>
		</div>
		<br>
		<div class="progress-bar green"></div>
		</div> 
	</div>
</div>

