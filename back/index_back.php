<?php
session_start();
require('inc/pdo.php');
require('inc/fonctions.php');
$page_title = 'Accueil administrateur';

if(!isLoggedAsAdmin()){
    redirect403();
    die();
}

$sql = "SELECT COUNT(id) FROM vac_users";
$query = $pdo->prepare($sql);

$query->execute();
$user_nb = $query->fetchColumn();

$sql = "SELECT COUNT(id) FROM vac_vaccins";
$query = $pdo->prepare($sql);

$query->execute();
$vaccin_nb = $query->fetchColumn();

include('inc/header.php'); ?>

    <section id="index_back">
        <div class="wrap">

            <div class="nav">
                <nav>
                    <ul>
                        <a href="gestion_users.php">
                            <li>
                                <?php
                                if($user_nb > 0 && (empty($_GET['menu']) || intval($_GET['menu']) == 0)){
                                ?>
                                <i class="fas fa-users">
                                        <span><?php echo $user_nb; ?></span>
                                </i>
                                    <?php
                                }
                                ?>
                                <p>Gestion des utilisateurs</p>
                            </li>
                        </a>
                        <a href="gestion_vaccins.php">
                            <li>
                                <?php
                                if($vaccin_nb > 0 && (empty($_GET['menu']) || intval($_GET['menu']) == 0)){
                                ?>
                                <i class="fas fa-syringe">
                                        <span><?php echo $vaccin_nb; ?></span>
                                </i>
                                    <?php
                                }
                                ?>
                                <p>Gestion des vaccins</p>
                            </li>
                        </a>
                        <a href="newsletter.php">
                            <li>
                            <?php
                            if($vaccin_nb > 0 && (empty($_GET['menu']) || intval($_GET['menu']) == 0)){
                                ?>
                                <i class="fas fa-envelope"></i>
                                <p>Envoyer une newsletter</p>
                                <?php
                            }
                            ?>
                            </li>
                        </a>
                        <a href="stats.php">
                            <li>
                            <?php
                            if($vaccin_nb > 0 && (empty($_GET['menu']) || intval($_GET['menu']) == 0)){
                                ?>
                                <i class="fas fa-chart-pie"></i>
                                <p>Consulter les statistiques</p>
                                <?php
                            }
                            ?>
                            </li>
                        </a>
                    </ul>
                </nav>
            </div>
        </div>
    </section>



<?php include('inc/footer.php');
