
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(empty($_SESSION['username'])){
    header('location: ./view/login.php');
    die();
}

$title = "COGIP - Companies Directory";

// Content start
ob_start(); 
?>

<section class="jumbotron d-flex flex-row justify-content-end">
    <h1 class="mr-5 text-info"><i class="fas fa-building"></i> Company Directory</h1>
</section>
<section class="container">
    <article class="column">

        <!-- Clients section -->
        <section class="col">
            <table class='table'>
                <h3><span class="badge badge-primary">Clients</span></h3>
                <thead class='thead-light'>
                    <tr>
                        <th scope='col'>Name</th>
                        <th scope='col'>Country</th>
                        <th scope='col'>TVA</th>
                    </tr>
                </thead>
                    <?php while($row = $clientsList->fetch()){ ?>
                    <tr>
                        <td><a href='index.php?action=detailCompany&id=<?=$row['id']?>"'><?=$row['company']?></td>
                        <td><?=$row['country']?></td>
                        <td><a href="index.php?action=detailCompany&id=<?=$row['id']?>"><?=$row['vat']?></td></a>
                    </tr>
                    <?php } ?>
            </table>
        </section>

        <!-- Provider section -->
        <section class="col">
            <table class='table'>
                    <h3><span class="badge badge-primary">Providers</span></h3>
                    <thead class='thead-light'>
                        <tr>
                            <th scope='col'>Name</th>
                            <th scope='col'>Country</th>
                            <th scope='col'>TVA</th>
                        </tr>
                    </thead>
            <?php while($row = $providersList->fetch()){?>
                    <tr>
                        <td><a href="index.php?action=detailCompany&id=<?=$row['id']?>"><?=$row['company']?></td>
                        <td><?=$row['country']?></td>
                        <td><a href="index.php?action=detailCompany&id=<?=$row['id']?>"><?=$row['vat']?></a></td>
                    </tr>
            <?php } ?>
            </table>
        </section>

    </article>
</section>

<?php
    $content = ob_get_clean();
    
    require('base.php');
?>