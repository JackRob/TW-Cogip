
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start recording view
ob_start(); 

$title = "COGIP - Administration panel"; 
?>

<section class="jumbotron d-flex flex-row justify-content-end">
    <h1 class="mr-5 text-info"><i class="fas fa-users-cog"></i> Administration Panel</h1>
</section>
<section class="container">
    <article class="row">

        <!-- Display last created invoices -->
        <section class="col">
            <table class='table'>
                <span class="badge badge-primary">Last 5 Invoices</span>
                <tr class="row bg-light text-primary">
                    <th scope='col'>Invoice ID</th>
                    <th scope='col'>Last Name</th>
                    <th scope='col'>First Name</th>
                </tr>
                <?php while($row = $lastInvoices->fetch()){ ?>
                <tr>
                    <td><a href='index.php?action=detailInvoice&id="<?= $row['invoice_id']?>"'><?= $row['invoice_number']?></a></td>
                    <td><a href='index.php?action=detailContact&id="<?= $row['user_id']?>"'><?= $row['last_name']?></a></td>
                    <td><a href='index.php?action=detailContact&id="<?= $row['user_id']?>"'><?= $row['first_name']?></td></a>
                    <td><button class="btn btn-primary btn-warning">EDIT</button><button class="ml-2 btn btn-primary btn-danger">DELETE</button></td>
                </tr>
                <?php }?>
            </table>
        </section>

        <!-- Display last created companies -->
        <section class="col">
            <table class='table'>
                <span class="badge badge-primary">Last 5 Companies</span>
                <tr class="row bg-light text-primary">
                    <th scope='col'>Company Name</th>
                    <th scope='col'>Country</th>
                </tr>
                <?php while($row = $lastCompanies->fetch()){ ?>
                <tr>
                    <td><?= $row['company_name']?></td>
                    <td><?= $row['country']?></td>
                    <td><button class="btn btn-primary btn-warning">EDIT</button></td>
                    <td><button class="ml-2 btn btn-primary btn-danger">DELETE</button></td>
                </tr>
                <?php }?>
            </table>
        </section>

        <!-- Display last created contacts -->
        <section class="col">
            <table class='table'>
                <span class="badge badge-primary">Last five Contacts</span>
                <tr class="row bg-light text-primary">
                    <th scope='col'>Last Name</th>
                    <th scope='col'>First Name</th>
                    <th scope='col'>Email</th>
                </tr>
                <?php while($row = $lastContacts->fetch()){ ?>
                <tr>
                    <td><?= $row['last_name']?></td>
                    <td><?= $row['first_name']?></td>
                    <td><?= $row['email']?></td>
                    <td><button class="btn btn-primary btn-warning">EDIT</button><button class="ml-2 btn btn-primary btn-danger">DELETE</button></td>
                </tr>
                <?php }?>
            </table>
        </section>

    </article>
</section>

<!-- End record and create view -->
<?php

    $content = ob_get_clean();
    
    require('base.php');
?>
