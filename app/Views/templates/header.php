<!DOCTYPE html>
<html>
<?php $session = session();
if ($session->has('cart')) {
    $cart = session('cart');
    $nb = count($cart);
} else $nb = 0; ?>

<head>
    <title>ChopesGames</title>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="<?= base_url('/assets/images/gamecontroller.ico')?>">
    <link rel="alternate" type="application/rss+XML" title="ChopesGames" href="<?php echo site_url('AdministrateurSuper/flux_rss') ?>" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo site_url('/assets/css/style.css');?>">
</head>

<body>
    <nav class="navbar navbar-expand-xl bg-primary" id="nav">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <!-- <div class="navbar-collapse collapse w-100"> -->
            <a class="navbar-brand" href="<?php echo site_url('Visiteur/accueil') ?>">
                <img class="d-block" style="width:60px;height:38px;'" src="<?php echo site_url('/assets/images/logo.jpg') ?>" alt="Logo"></a>
            <a class="btn btn-primary text-dark" href="<?= site_url('Visiteur/lister_les_produits') ?>">Nos produits</a>
        </div>

        <div class="dropdown">
            <button type="button" class="btn btn-primary btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown">Catégorie</button>
            <ul class="dropdown-menu dropCategorie">
                <?php foreach ($categories as $categorie){
                    $class= 'dropdown-item';
                    $no = $categorie["NOCATEGORIE"];
                    $li = $categorie["LIBELLE"];
                    echo "<li><a class='$class' href='". base_url("Visiteur/lister_les_produits_par_categorie/$no") . "'>$li</a></li>"; ?><?php } ?>

            </ul>
        </div>

        <div class="mx-auto order-0">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="container-fluid navbar-nav mx-auto nav-item"> 
            <form class="form-inline" method="post" action="<?php echo site_url('Visiteur/lister_les_produits') ?>">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <input class="form-control mr-sm-2" type="text" name="search" id='search' placeholder="Rechercher">
                <button class="container-fluid btn btn-primary" type="submit">
                    <img src="<?php echo site_url('/assets/images/loupe.ico') ?>" width="25">
                </button>
            </form>
        </div>

        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="<?php echo site_url('Visiteur/afficher_panier') ?>" class="btn btn-primary btn-md">
                        <span class="fas fa-shopping-cart"><?php if ($nb > 0) echo "($nb)" ?></span>
                        <img src="<?php echo site_url('/assets/images/panier.ico') ?>" width="30">
                    </a>
                </li>

                <?php if ($session->get('statut') == 2 or $session->get('statut') == 3) : ?>
                    <li class="nav-item dropdown">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                            Administration
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo site_url('AdministrateurEmploye/afficher_les_clients') ?>">Clients->Commandes</a>
                            <a class="dropdown-item" href="">(2Do) Commandes non traitées</a>
                            <?php if ($session->get('statut') == 3) { ?>
                                <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/ajouter_un_produit') ?>">Ajouter un produit</a>
                                <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/ajouter_une_categorie') ?>">Ajouter une catégorie</a>
                                <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/ajouter_une_marque') ?>">Ajouter une marque</a>
                                <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/ajouter_un_administrateur') ?>">Ajouter un administrateur</a>
                                <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/gerer_administrateurs') ?>">Gérer les administrateurs</a>
                                <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/modifier_identifiants_bancaires_site') ?>">Modifier identifiants bancaires site</a>
                                <a class="dropdown-item" href="<?php echo site_url('AdministrateurSuper/newsletter') ?>">Rédiger une newsletter</a>
                            <?php } ?>
                        </div>
                    </li>
                <?php endif; ?> 

                <li class="nav-item dropdown">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                        <img src="<?php echo site_url('/assets/images/user.ico') ?>" width="30">
                </button>
                    <div class="dropdown-menu">
                        <?php if (!is_null($session->get('statut'))) { ?>
                            <?php if ($session->get('statut') == 1) { ?>
                                <a class="dropdown-item" href="<?php echo site_url('Client/historique_des_commandes') ?>">Mes commandes</a>
                                <a class="dropdown-item" href="<?php echo site_url('Visiteur/s_enregistrer') ?>">Modifier son compte</a>
                                <a class="dropdown-item" href="<?php echo site_url('Client/supprimer_compte');?>">Supprimer compte</a>
                            <?php } elseif ($session->get('statut') == 3) { ?>
                                <a class="dropdown-item" href="?>">(2Do) Modifier son compte</a>
                            <?php } ?>
                            <a class="dropdown-item" href="<?php echo site_url('Client/se_de_connecter') ?>">Se déconnecter</a>
                        <?php } else { ?>
                            <a class="dropdown-item" href="<?php echo site_url('Visiteur/se_connecter') ?>">Se connecter</a>
                            <a class="dropdown-item" href="<?php echo site_url('Visiteur/s_enregistrer') ?>">S'enregister</a>
                        <?php } ?>
                    </div>
                </li>
                
                <?php if (empty($session->get('statut'))) : ?>
                    <div class="nav-item droite">
                        <a href="<?php echo site_url('Visiteur/connexion_administrateur') ?>"><i class="bi bi-lock nav-link active h2 link-dark"></i></a>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                        </svg>
                    </div>
                <?php endif; ?>
            </ul>
        </div>
    </nav>

    <main>

