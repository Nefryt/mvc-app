<section class="login-section">

<h2>Dodawanie nowej marki</h2><hr><br>

<form class="login" action="<?php echo Url::getUrl( 'category', 'add') ?>" method="POST">
    <input class="form-control" type="text" name="category" placeholder="Nazwa marki">
    <button class="btn btn-primary" type="submit">Dodaj markę</button>
</form>

</section>