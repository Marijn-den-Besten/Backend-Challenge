<style>
    img {
        width: 70px;
    }

    .centered {
        text-align: center;
    }
</style>


<table style="width: 100%;">
    <tr>
        <th>bets</th>
    </tr>
	<?php

	/** @var Player[] $players */
    $som = 0;
    foreach ($players as $player) {
	    $hand = $player->getHand($table);
        $som += $player->bet;
		?>
        <tr>
            <td><?php echo $player->number; ?></td>
            <td>
                <?php echo $player->bet; ?>
            </td>
        </tr>
		<?php
	} ?>
<tr>
</tr>

</table>
