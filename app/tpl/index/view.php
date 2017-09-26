<?php

echo 'index view tpl';

?>

<div>

    <table id="chess_grid" class="table table-bordered">
        <?php for ($i=8; $i>=0; $i--): ?>
            <tr>
                <?php if ($i == 0): ?>
                    <th></th>
                    <?php foreach (str_split('abcdefgh', 1) as $j): ?>
                        <th><?= $j ?></th>
                    <?php endforeach; ?>
                <?php else: ?>
                    <th><?= $i ?></th>
                    <?php foreach (str_split('abcdefgh', 1) as $j): ?>
                        <td><?= $j, '', $i ?></td>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tr>
        <?php endfor; ?>
    </table>

</div>
