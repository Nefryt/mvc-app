<section class="login-section">

    <h2>Lista samochodów</h2><hr>

    <table class="table-bordered">
        <thead>
            <th>ID</th>
            <th>Marka</th>
            <th>Model</th>
            <th>Opis</th>
            <th>Zdjęcie</th>
        </thead>

        <?php
            $config = Config::getInstance();
            $config = $config->getConfig();

            foreach( $data as $car )
            {?>
                <tr>
                    <td><?php echo $car[ 'samochody_id' ] ?></td>
                    <td> <?php echo $car[ 'nazwa' ] ?> </td>
                    <td> <?php echo $car[ 'model' ] ?> </td>
                    <td> <?php echo $car[ 'opis' ] ?> </td>
                    <td> <img src="<?php echo $config['CUSTOM_IMG_DIR'] . $car[ 'podpis' ] ?>.png" width="150px" </td>
                    <td>
                        <a href="
                         <?php echo Url::getUrl( 'car', 'edit', array( 'id' => $car['samochody_id'] ) ) ?> "> Edytuj
                        </a>
                    </td>
                    <td>
                        <a href="
                         <?php echo Url::getUrl( 'car', 'delete', array ( 'id' => $car[ 'samochody_id' ] ) ) ?> "> Usuń
                        </a>
                    </td>
                </tr>
            <?php } ?>
    </table>

    <?php $partial->display('pager'); ?><br>

    <div class="nav-links">
        <h5><a href="<?php echo Url::getUrl( 'car', 'add') ?>">Dodaj samochód</a></h5>
        <h5><a href="<?php echo Url::getUrl('car', 'index'); ?>">Strona Główna</a></h5>
    </div>

</section>