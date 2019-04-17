<?php  /** * Vue : accueil */ ?>

<style>
<?php include "css/css_stock.css"; ?>
</style>

<script>
	function placement()
	{
		var d=document.getElementById("selectPlacement");
		var displaytext=d.options[d.selectedIndex].text;
		document.getElementById("txt").innerHTML=displaytext;
	}	
</script>

</style>

	<div class=testbox>
		<img class="homestock" src="img/home.png" >
		<div class="selectbox">

			<select id="selectPlacement" onchange="placement()">
			<?php foreach ($maisons as $element) { ?>
			<option value=""> <?php echo $element['nom']; ?> <?php echo $element['location']; ?> </option>
			<?php } ?>
			</select>
		</div>
	</div>


<div id="txt">
</div>


	<ul class="machinesCafe">

	    <li class="cafetiere"><a href="#1"> Machine yes </a></li>
	    <li class="cafetiere"><a href="#2"> Machine chambre Sebastien </a></li>
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
