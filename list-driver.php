<?php
require ('./backend/allDriverAction.php');
require ('./backend/security.php') ?>
<!DOCTYPE html>
<html lang="en">
<?php include ('./components/head.php') ?>

<style>
.table {
    border-collapse: collapse;
    border: 2px solid rgb(140 140 140);
    font-family: sans-serif;
    font-size: 0.8rem;
    letter-spacing: 1px;
}

caption {
    caption-side: bottom;
    padding: 10px;
    font-weight: bold;
}

thead,
tfoot {
    background-color: rgb(228 240 245);
}

th,
td {
    border: 1px solid rgb(160 160 160);
    padding: 8px 10px;
}

td:last-of-type {
    text-align: center;
}

tbody>tr:nth-of-type(even) {
    background-color: rgb(237 238 242);
}

tfoot th {
    text-align: right;
}

tfoot td {
    font-weight: bold;
}
</style>

<body>

    <?php include ('./components/navbar.php') ?>
    <!-- ------------------------ -->
    <?php include ('./components/link.php') ?>


    <div>
        <div class="bg-body-tertiaryp-5 rounded mt-5">
            <div class="col-sm-8 mx-auto">
                <h1>Liste des chauffeurs</h1>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#tag</th>
                            <th scope="col">nom & prénom</th>
                            <th scope="col">action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($driver = $allDriver->fetch()) { ?>
                        <tr>
                            <th scope="row"><?= $driver['tag'] ?></th>
                            <td><?= $driver['fname'] ?></td>
                            <td><a href="profil-driver.php?tag=<?= $driver['tag'] ?>">Voir plus ..</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include ("./components/footer.php") ?>
</body>

</html>