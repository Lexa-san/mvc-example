<?php
/* @var \app\View\Index\View $this */
?>

<?php if ($this->getViewData('hasError')): ?>
    <div class="alert alert-danger" role="alert"><?php echo $this->getViewData('errorMessage') ?></div>
<?php endif; ?>

