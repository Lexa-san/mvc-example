<?php
/* @var \app\View\ViewAbstract $this */
?>
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

<div id="wrapper">

    <header id="header" class="container">
        <h3>Шахматные Позиции</h3>
    </header>

    <div class="container" role="main">

        <div class="row">
            <div class="col-sm-3 sidebar">

                <div>
                    <h4>Позиции</h4>
                    <!--                --><?php //var_export($chessPositions) ?>
                    <?php
                    /* @var app\Model\ChessCollection $collection */
                    $collection = $this->getViewData('chessPositions');

                    if ($collection instanceof app\Model\ChessCollection && count($collection->getItems())) {
                        echo '<ul class="nav nav-pills nav-stacked">', PHP_EOL;
                        /* @var \app\Model\Chess $item */
                        foreach ($collection->getItems() as $item) {
                            echo sprintf('<li><a href="%s">%s</a></li>', $item->getLink(), $item->getName()), PHP_EOL;
                        }
                        echo '</ul>', PHP_EOL;
                    }

                    ?>
                </div>

            </div>
            <div class="col-sm-9" id="content">
                <!--                <p>content container</p>-->
                <?php echo $this->parseViewTemplate() ?>
            </div>
        </div>

    </div>


</div>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="copyrights col-sm-9">2017 Aleksei Solovev for Consultant Plus</div>
            <div class="contacts col-sm-3">ryoha.san@gmail.com</div>
        </div>
    </div>
</footer>


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>