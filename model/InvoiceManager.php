<?php

// namespace Becode\Cogip\model;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./model/Connection.php');

class InvoiceManager extends Connection
{
    function getInvoice() 
    {
        return $this->dbConnect()->query('SELECT invoices.*, users.*  FROM invoices INNER JOIN users ON invoices.user_id=users.id WHERE invoices.id='.$_GET['id']);
    }

    function getInvoiceCompany()
    {
        return $this->dbConnect()->query('SELECT * FROM companies WHERE id='.$_GET['id']);
    }

    function getListInvoices() 
    { 
        $invoiceList = $this->dbConnect()->query('SELECT invoices.*, users.last_name AS last_name, companies.company_name AS company_name FROM invoices INNER JOIN users ON invoices.user_id=users.id INNER JOIN companies ON invoices.company_id=companies.id ORDER BY invoices.invoice_date DESC');

        return $invoiceList;
    }

    function addInvoice() 
    {
        $number = '';
        $invContent = '';
        $idComp = '';
        $idUser = '';

        if (isset($_POST['invoice_number']) AND isset($_POST['invoice_content'])
        AND isset($_POST['user_id']) AND isset($_POST['company_id']))
        {
            $number = $_POST['invoice_number'];
            $invContent = $_POST['invoice_content'];
            $idComp = $_POST['company_id'];
            $idUser = $_POST['user_id'];
            
            date_default_timezone_set('Europe/Brussels');
            $tz = date_default_timezone_get();
            $date = date('Y-m-d H:i:s');
    
            $sql = "INSERT INTO invoices (invoice_number, invoice_date, invoice_content, user_id, company_id) 
                                VALUES (:invoice_number, :invoice_date, :invoice_content, :user_id, :company_id)";
                
            $stmt = $this->dbConnect()->prepare($sql);
            $stmt->execute(['invoice_number' => $number,
                            'invoice_date' => $date,
                            'invoice_content' => $invContent,
                            'user_id' => $idUser,
                            'company_id' => $idComp]);
        };

    }

    function deleteInvoice()
    {
        if (isset($_POST['delete']))
        {
            try {
                $id = $_POST['delete'];
                $sql = "DELETE FROM invoices WHERE id=$id";

                $stmt = $this->dbConnect();
                $stmt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt->exec($sql);
                header('Location: index.php?action=listInvoices');
            }
            catch (PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
            }
        };
    }

    function getListCompanies()
    {
        $result =  $this->dbConnect()->query('SELECT * FROM companies');
        $rows = $result->fetchAll();

        return $rows;
    }

    function getListContacts()
    {
        $result = $this->dbConnect()->query('SELECT * FROM users');
        $rows = $result->fetchAll();

        return $rows;
    }
}


