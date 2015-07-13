<section class="login-section">

    <h2>Dodaj samochód</h2><hr>

    <form class="login" action="<?php echo Url::getUrl('car', 'add'); ?>" method="post" enctype="multipart/form-data">

        <input class="form-control" type="text" name="model" placeholder="Model" />

        <select class="form-control" name="marka_id">
            <?php foreach ($data as $marka)   { ?>
                <option value="<?php echo $marka['id']; ?>">
                    <?php echo $marka['nazwa']; ?>
                </option>
            <?php } ?>
        </select>

        <input class="form-control" type="file" name="zdjecie" />
        <textarea class="form-control" name="opis" placeholder="Opis"></textarea>
        <button class="btn btn-primary" type="submit">Zapisz</button>

    </form>

</section>
