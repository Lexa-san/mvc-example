<?php
/**
 * @var \app\View\Index\View $this
 * @var \app\Model\Chess $position
 */
$position = $this->getViewData('chessPosition');
?>

<h4><?php echo $position->getName() ?></h4>

<?php if ($this->getViewData('hasError')): ?>
    <div class="alert alert-danger" role="alert"><?php echo $this->getViewData('errorMessage') ?></div>
<?php endif; ?>

<div>

    <table id="chess_grid" class="table table-bordered">
        <?php for ($i = 8; $i >= 0; $i--): ?>
            <tr>
                <?php if ($i == 0): ?>
                    <?php // draw horizontal header ?>
                    <?php foreach (str_split(' abcdefgh', 1) as $j): ?>
                        <th><?= $j ?></th>
                    <?php endforeach; ?>
                <?php else: ?>
                    <th><?= $i ?></th><?php // draw vertical header ?>
                    <?php for ($j = 1; $j <= 8; $j++): ?>
                        <?php $figure = $position->getFigureOnGrid($j, $i);?>
                        <td><?= ($figure) ? $figure : ' ' ?></td>
                    <?php endfor; ?>
                <?php endif; ?>
            </tr>
        <?php endfor; ?>
    </table>

</div>
