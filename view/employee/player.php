
<img src="/Cards/<?= $cards["card1"]?>.jpg" class="w-50 float-left" alt="image">
<img src="/Cards/<?= $cards["card2"]?>.jpg" class="w-50 float-right"alt="image">

<form name="create" method="post" action= "" >

<input type="number" name="bet" placeholder="Jouw inzet: <?php echo $bet; ?>">

<input type="Submit" value="Submit">

</form>

<?php
		
?>