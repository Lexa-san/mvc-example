<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chess Position written by Aleksei Solovev</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link href="static/style.css" rel="stylesheet" type="text/css">
</head>

<body>

<div class="container">

    <div class="content">
<!--        --><?php //include 'app/tpl/'.$this->viewTemplate ?>
        <?php $this->parseViewTemplate() ?>
        <?php var_export($test) ?>
    </div>

    <div class="main">

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

    </div>

</div>

<footer class="footer">
    <div class="container">
        <div class="copyrights pull-left">2017 Aleksei Solovev for Consultant Plus</div>
        <div class="contacts pull-right">ryoha.san@gmail.com</div>
    </div>
</footer>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>