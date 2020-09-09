<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// require('../model/AdminManager.php');
// require_once('Connection.php');
require_once('./model/CompanyManager.php');
// require('../model/ContactManager.php');
// require('../model/InvoiceManager.php');
// require('../model/LoginManager.php');



function listCompanies()
{
   $list = getListCompanies();
    
   require('./view/listCompaniesView.php');
}


// function invoice()
// {
//     $invoiceManager = new InvoiceManager();

//     $invoice = $invoiceManager->getPost($_GET['id']);

//     require('../view/invoiceView.php');
// }

function listContacts() {

   $list = getListContacts();
   require('view/listContactsView.php');
}

function listInvoices() {

   $list = getListInvoices();
   require('view/listInvoicesView.php');
}

function detailCompany() {
   
   $details = getCompany();
   require('view/companyView.php');
}

function detailContact() {

   $details = getContact();
   require('view/contactView.php');
}

function detailInvoice() {

   $details = getInvoice();
   require('view/invoiceView.php');
}