<?php 
session_start();
if (!isset($_SESSION['invoice_data'])) {
    header("Location: index.php");
    exit();
}

$invoice = $_SESSION['invoice_data'];
$date_time = date("d-m-Y H:i:s"); // Current Date and Time
$invoice_number = 'INV-' . strtoupper(substr(md5(uniqid()), 0, 8)); // Generate Unique Invoice Number

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drivons | Invoice</title>
    <link rel="shortcut icon" href="images/logo/logor_dark.png" type="image/x-icon">
    <link rel="icon" href="images/logo/logor_dark.png" type="image/x-icon">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 40px;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 900px;
            background: #fff;
            padding: 40px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            min-height: 800px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            margin-top: 50px;
            position: relative;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 18px;
        }
        h2 {
            font-size: 24px;
            font-weight: bold;
        }
        .invoice-details, .supplier-customer {
            margin-top: 70px;
        }
        .supplier-customer {
            display: flex;
            justify-content: space-between;
            margin-top: 80px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 70px;
        }
        .invoice-table th, .invoice-table td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: left;
            font-size: 16px;
        }
        .invoice-table th {
            background-color: #eef5ff;
            font-size: 18px;
        }
        .total {
            text-align: right;
            font-size: 20px;
            font-weight: bold;
            margin-top: 40px;
        }
        .button {
            display: inline-block;
            padding: 12px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .button:hover {
            background: #0056b3;
        }
        .outer-button-container {
            display: flex;
            justify-content: space-between;
            max-width: 900px;
            margin: 30px auto 0;
        }
        .invoice-number {
            font-size: 18px;
            font-weight: normal;
            color: #333;
        }
        .print-button {
            position: absolute;
            top: 20px;
            right: 100px;
            margin-top: 50px;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #555;
            margin-top: 40px;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        @media print {
            .outer-button-container {
                display: none;
            }
        }
    </style>
</head>
<body>

<a href="#" class="button print-button" onclick="window.print()">Print Invoice</a>

<div class="container">
    <div>
        <div class="header">
            <h2>DRIVONS</h2>
            <p class="invoice-number"><strong>Invoice #</strong> <?= htmlspecialchars($invoice_number) ?></p>
        </div>
        <div class="invoice-details">
            <p><strong>Invoice Date:</strong> <?= date("d/m/Y") ?></p>
            <p style="position: relative; top: -32px; text-align: right;"><strong>Due Date:</strong> <?= date("d/m/Y", strtotime("+30 days")) ?></p>
        </div>
        <div class="supplier-customer">
            <div>
                <h3>Dealer</h3>
                <p>Drivons Car Rental</p>
                <p>20 Main Street, Central-Mumbai,</p>
                <p>Maharashtra, 400001.</p>
            </div>
            <div>
                <h3>Customer</h3>
                <p><strong>Name:</strong> <?= $invoice['username'] ?></p>
                <p><strong>Email:</strong> <?= $invoice['email'] ?></p>
                <p><strong>Transaction ID:</strong> <?= $invoice['transaction_id'] ?></p>
            </div>
        </div>
        
        <table class="invoice-table">
            <tr>
                <th>Plan</th>
                <th>Price</th>
                <th>Total</th>
            </tr>
            <tr>
                <td><?= htmlspecialchars($invoice['plan']) ?></td>
                <td>₹<?= number_format($invoice['amount'], 2) ?></td>
                <td>₹<?= number_format($invoice['amount'], 2) ?></td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <p><a href="https://www.Drivons.com" target="_blank" style="color: #007bff; text-decoration: none;">www.Drivons.com</a> &nbsp; | &nbsp; hersafarenquiry@gmail.com &nbsp; | &nbsp; +91 99999 99999</p>
    </div>
</div>

<div class="outer-button-container">
    <a href="index.php" class="button" style="background:#007bff;">Go to Home</a>
</div>
</body>
</html>