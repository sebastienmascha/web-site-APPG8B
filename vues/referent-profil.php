<?php 
/**
* Vue : accueil
*/
?>

<style>
<?php include "css/css_referent-profil.css"; ?>
</style>

	<table class="table">
		<tr id="tr">	
			<td colspan="3" id="td">
				<p>Gaétan</p>
				<p>Réferent</p>
				<p><input id="edite"type="button" value="Edit" onclick="edit_div('editer');" /> </p>
			</td>
		</tr>
		<tr id="tr" >
			<td colspan="3" id="td">
				<p>Seb</p>
				<p>Enfant</p>
				<p><input id="edite"type="button" value="Edit" onclick="edit_div('editer');" /></p>
			</td>
		</tr>
		<tr  id="tr">
			<td clospan="3" id="td">
				<p>Gus</p>
				<p>Parent</p>
				<p><input id="edite"type="button" value="Edit" onclick="edit_div('editer');" /></p>
			</td>
		</tr>
		<tr  id="tr">
			<td clospan="3" id="td">
				<p>Agathe</p>
				<p>Parent</p>
				<p><input id="edite"type="button" value="Edit" onclick="edit_div('editer');" /></p>
			</td>
		</tr>
		
		<tr id="tr" >
			<td clospan="3" id="td">
				<p>Olivier</p>
				<p>Enfant</p>
				<p><input id="edite"type="button" value="Edit" onclick="edit_div('editer');" /></p>
			</td>
		</tr>
		
		<tr id="tr">
			<td clospan="3" id="td">
				<p>Astrid</p>
				<p>Enfant</p>
				<p><input id="edite"type="button" value="Edit" onclick="edit_div('editer');" /></p>
			</td>
		</tr>
	</table>

<div id="editer" style="display:none">
	<h2>MODIFIER LE COMPTE</h2>
	<table id="table1">
		<tr id="tr1">
			<td id="td1">Email</td>
			<td id="td1"> <input type="email" /></td>
		</tr>
		<tr id="tr1">
			<td id="td1">Prénom </td>
			<td id="td1"><input type="text" /></td>
		</tr>
		<tr id="tr1">
			<td id="td1">Préférence </td>
			<td id="td1">
				<FORM>
					<SELECT name="préférence" size="1">
					<OPTION>latte
					<OPTION>café
					<OPTION>cappuccino
					<OPTION>chocolat chaud
					</SELECT>
				</FORM>
			</td>
		</tr>
		<tr id="tr1">
			<td id="td1">Heure de préparation </td>
			<td id="td1">
				<FORM>
					<SELECT name="heure" size="1">
					<OPTION>00
					<OPTION>01
					<OPTION>02
					<OPTION>03
					<OPTION>04
					<OPTION>05
					<OPTION>06
					<OPTION>07
					<OPTION>08
					<OPTION>09
					<OPTION>10
					<OPTION>11
					<OPTION>12
					<OPTION>13
					<OPTION>14
					<OPTION>15
					<OPTION>16
					<OPTION>17
					<OPTION>18
					<OPTION>19
					<OPTION>20
					<OPTION>21
					<OPTION>22
					<OPTION>23
					</SELECT>
				</FORM>
			</td>
			<td id="td1">	
				<FORM>
					<SELECT name="minute" size="1">
					<OPTION>00
					<OPTION>01
					<OPTION>02
					<OPTION>03
					<OPTION>04
					<OPTION>05
					<OPTION>06
					<OPTION>07
					<OPTION>08
					<OPTION>09
					<OPTION>10
					<OPTION>11
					<OPTION>12
					<OPTION>13
					<OPTION>14
					<OPTION>15
					<OPTION>16
					<OPTION>17
					<OPTION>18
					<OPTION>19
					<OPTION>20
					<OPTION>21
					<OPTION>22
					<OPTION>23
					<OPTION>24
					<OPTION>25
					<OPTION>26
					<OPTION>27
					<OPTION>28
					<OPTION>29
					<OPTION>30
					<OPTION>31
					<OPTION>32
					<OPTION>33
					<OPTION>34
					<OPTION>35
					<OPTION>36
					<OPTION>37
					<OPTION>38
					<OPTION>39
					<OPTION>40
					<OPTION>41
					<OPTION>42
					<OPTION>43
					<OPTION>44
					<OPTION>45
					<OPTION>46
					<OPTION>47
					<OPTION>48
					<OPTION>49
					<OPTION>50
					<OPTION>51
					<OPTION>52
					<OPTION>53
					<OPTION>54
					<OPTION>55
					<OPTION>56
					<OPTION>57
					<OPTION>58
					<OPTION>59
					</SELECT>
					
				</FORM>
			</td>
		</tr>
		<tr id="tr1">
			<td id="td1">Type </td>
			<td id="td1">
				<FORM>
					<SELECT name="Type" size="1">
					<OPTION>Réferant
					<OPTION>Parent
					<OPTION>Enfant
					<OPTION>Invité
					</SELECT>
					
				</FORM>
			</td>
		</tr>
	</table>

   
   <input id ="valider"type="button" value="Valider" onclick="valider_div('editer');" />
   
</div>

<script src="js/afficher_masquer.js"></script>






	


