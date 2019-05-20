<?php ?>

<style>
    <?php include "css/css_stock.css";
    ?>
</style>


<?php foreach ($machines as $machine) { ?>
    <ul class="machinesCafe">
        <li class="cafetiere"><a href="#2"><?php echo $machine['name']; ?></a></li>
    </ul>

    
<div>
	<div class="boite1">
		<p class="p_stock"> Café - Capsule restantes : <?php echo $machinesInfo[0]['stock']; ?></p>
		<img class="cafe" src="./img/coffee_icon.png">
		<div class="box">
			<a href="https://www.dolce-gusto.fr/boissons/grande-morning-16-capsules" target="_blank"> <button> Commander </button> </a>
		</div>
		<br>
		<div class="progress-bar green"></div>
	</div>




	<div class="boite2">
		<p class="p_stock"> Chocolat chaud - Capsule restantes : <?php echo $machinesInfo[1]['stock']; ?></p>
		<img class="cafe" src="./img/Chocolat.png">
		<div class="box">
			<a href="https://www.dolce-gusto.fr/boissons/chocolat/chococino-chocolat-chaud" target="_blank"> <button> Commander </button></a>
		</div>
		<br>
		<div class="progress-bar green"></div>
	</div>


	<div class="boite3">
		<p class="p_stock"> Latte - Capsule restantes : <?php echo $machinesInfo[2]['stock']; ?></p>
		<img class="cafe" src="./img/latte.png">
		<div class="box">
			<a href="https://www.dolce-gusto.fr/boissons/cappuccino-latte/latte-macchiato" target="_blank"> <button> Commander </button> </a>
		</div>
		<br>
		<div class="progress-bar green"></div>
	</div>

	<div class="boite4">
		<p class="p_stock"> Cappuccino - Capsule restantes : <?php echo $machinesInfo[3]['stock']; ?></p>
		<img class="cafe" src="./img/Cappuccino.png">
		<div class="box">
			<a href="https://www.dolce-gusto.fr/boissons/cappuccino-latte/cappuccino" target="_blank"> <button> Commander </button> </a>
		</div>
		<br>
		<div class="progress-bar green"></div>
	</div>
</div>

<?php } ?>

