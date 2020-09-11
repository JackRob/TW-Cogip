<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "COGIP - List of contacts";

// Start recording
ob_start();
?>

<section class="jumbotron d-flex flex-row justify-content-end">
    <h1 class="mr-5 text-info"><i class="fas fa-address-book"></i> Contact Directory</h1>
</section>
<section class="container">
    <article class="column">

        <!-- Contact section -->
        <section class="col">
            <table class='table'>
                <h3><span class="badge badge-primary">Contacts</span></h3>
                <thead class='thead-light'>
                    <tr>
                        <th scope='col'>Lastname</th>
                        <th scope='col'>Firstame</th>
                        <th scope='col'>Email</th>
                        <th scope='col'>Company</th>
                    </th>
                </thead>
                <?php  while($row = $listContacts->fetch()){ ?>
                <tr>
                    <td><a href="index.php?action=detailContact&id=<?=$row['id']?>"><?=$row['last_name']?></a></td>
                    <td><a href="index.php?action=detailContact&id=<?=$row['id']?>"><?=$row['first_name']?></a></td>
                    <td><a href="mailto:<?=$row['email']?>"><?= $row['email']?></a></td>
                    <td><a href="index.php?action=detailCompany&id=<?=$row['id']?>"><?= $row['company_name']?></a></td>
                </tr>
            <?php } ?>
            </table>
        </section>
    
    </article>
</section>

<?php
// End recording
$content = ob_get_clean();

require('base.php');
?>
