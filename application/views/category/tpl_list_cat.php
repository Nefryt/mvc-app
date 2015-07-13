<section class="login-section">

    <h2>Marki w naszej bazie</h2><hr>

    <table class="table-bordered">
        <thead>
            <th>Nazwa</th>
        </thead>

        <?php foreach($data as $marka)    { ?>
           <tr>
               <td><?php echo $marka['nazwa']; ?></td>
               <td><a title="Usuń kategorię" href="<?php echo Url::getUrl( 'category', 'delete', array ( 'id' => $marka[ 'id' ] ) ) ?> ">Usuń</a></td>
           </tr>
        <?php  } ?>
    </table>

    <div class="nav-links">
        <h5><a href="<?php echo Url::getUrl( 'category', 'add') ?>">Dodaj markę</a></h5>
        <h5><a href="<?php echo Url::getUrl('car', 'index'); ?>">Strona Główna</a></h5>
    </div>

</section>
