<?php
require ('./backend/profilAction.php');
require ('./backend/security.php')
    ?>
<!DOCTYPE html>
<html lang="en">
<?php include ('./components/head.php') ?>

<body>
    <?php include ('./components/navbar.php') ?>
    <?php include ('./components/link.php') ?>

    <!-- ------------------------ -->
    <div>
        <div class="bg-body-tertiaryp-5 rounded mt-5">
            <div class="col-sm-8 mx-auto">
                <h1>Profil Chauffeur</h1>

                <?php if (!empty($errorMsg)) { ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?= $errorMsg ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <?php } else { ?>
                <section class="section profile">
                    <div class="row">
                        <div class="col-xl-4">
                            <div class="card">
                                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                                    <img src="<?= $profil ?>" width="90" alt="Profile" class="rounded-circle">
                                    <h2><?= $fname ?></h2>
                                    <div class="social-links mt-2">
                                        <p class="fw-bold"><?= $tag ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-8">
                            <div class="card">
                                <div class="card-body pt-3">
                                    <!-- Bordered Tabs -->
                                    <ul class="nav nav-tabs nav-tabs-bordered">

                                        <li class="nav-item">
                                            <button class="nav-link active" data-bs-toggle="tab"
                                                data-bs-target="#profile-overview">Aperçu</button>
                                        </li>

                                        <li class="nav-item">
                                            <button class="nav-link" data-bs-toggle="tab"
                                                data-bs-target="#profile-edit">Voiture</button>
                                        </li>

                                        <li class="nav-item">
                                            <button class="nav-link" data-bs-toggle="tab"
                                                data-bs-target="#profile-settings">Trafic</button>
                                        </li>

                                    </ul>
                                    <div class="tab-content pt-2">
                                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                            <h5 class="card-title">A propos</h5>
                                            <p class="small fst-italic">Sunt est soluta temporibus accusantium
                                                neque nam maiores cumque temporibus. Tempora libero non est unde
                                                veniam est qui dolor. Ut sunt iure rerum quae quisquam autem
                                                eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                                            <h5 class="card-title">Détails du profil</h5>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label ">Nom et prénom</div>
                                                <div class="col-lg-9 col-md-8"><?= $fname ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">Télephone</div>
                                                <div class="col-lg-9 col-md-8"><?= $phone ?>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">E-mail</div>
                                                <div class="col-lg-9 col-md-8">john.exemple@.com</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">Ville</div>
                                                <div class="col-lg-9 col-md-8">Kinshasa</div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-3 col-md-4 label">Adress</div>
                                                <div class="col-lg-9 col-md-8">56, blv National 1B</div>
                                            </div>

                                        </div>

                                        <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                            <!-- Profile Edit Form -->
                                            <form>
                                                <div class="row mb-3">

                                                    <div class="col-md-8 col-lg-12 d-flex">
                                                        <img src="<?= $image ?>" width="400" alt="Profile">
                                                        <div class="pt-2">
                                                            <img src="<?= $qrcode ?>" width="100" alt="qrcode">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <label for="fullName"
                                                        class="col-md-4 col-lg-3 col-form-label">Marque :
                                                        <?= $marque ?></label>
                                                    <label for="fullName"
                                                        class="col-md-3 col-lg-4 col-form-label">Vitesse :
                                                        <?= $vitesse ?> km/h</label>
                                                    <label for="fullName"
                                                        class="col-md-3 col-lg-4 col-form-label">Reservoire :
                                                        <?= $reservoir ?> Lt</label>

                                                </div>
                                            </form>

                                        </div>

                                        <div class="tab-pane fade pt-3" id="profile-settings">

                                            <?php if (isset($traficError)) { ?>

                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <?= $traficError ?>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>

                                            <?php } else { ?>
                                            <?php while ($trafic = $checkTrafic->fetch()) { ?>
                                            <p>Station : <?= $trafic['station'] ?> </p>
                                            <p>Litre: <?= $trafic['liter'] ?> Lt</p>
                                            <p>Jour: <?= $trafic['dates'] ?></p>
                                            <hr>
                                            <?php }
                                                } ?>


                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </section>
                <?php } ?>





            </div>
        </div>
    </div>
    <?php include ("./components/footer.php") ?>

</body>

</html>