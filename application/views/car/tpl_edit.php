<section class="login-section">

    <h2>Edytuj samochód (ID = <?php echo $_GET['id']; ?>)</h2>
    <hr>

    <form class="login" action="<?php echo Url::getUrl( 'car', 'edit') ?>" method="post" enctype="multipart/form-data">

        <input class="form-control" type="text" name="model" placeholder="Nowy model" />

        Nowa marka: <select name="marka_id">
            <?php foreach ($data as $marka)   { ?>
                <option value="<?php echo $marka['id']; ?>">
                    <?php echo $marka['nazwa']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        Nowe zdjęcie: <input class="form-control" type="file" name="zdjecie" /><br>
        <textarea name="opis" placeholder="Nowy opis"></textarea><br>
        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" ?><br>
        <input class="btn btn-primary" type="submit" value="Zapisz">

    </form>

</section>
