<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;

// Enable Unicode support
$options = new Options();
$options->set('defaultFont', 'DejaVu Sans');
$dompdf = new Dompdf($options);

// Database connection
$conn = new mysqli("localhost", "root", "", "grocery");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// Get Order ID
$oid = isset($_GET['oid']) ? intval($_GET['oid']) : 0;

// Fetch order and customer
$order = $conn->query("SELECT * FROM `ord` WHERE oid = $oid")->fetch_assoc();
if (!$order) die("Order not found.");

$customer = $conn->query("SELECT * FROM `user` WHERE uid = {$order['uid']}")->fetch_assoc();
if (!$customer) die("Customer not found.");

// Fetch order items
$items_result = $conn->query("
    SELECT oi.*, p.name AS product_name 
    FROM order_items oi 
    JOIN product p ON oi.pid = p.pid 
    WHERE oi.oid = $oid
");

$html = '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice</title>
    <style>
        * { box-sizing: border-box; }
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 13.5px;
            color: #2c2c2c;
            margin: 0;
            padding: 20px;
            line-height: 1.5;
        }
        h1 {
            text-align: center;
            margin-bottom: 4px;
            font-size: 26px;
            font-weight: bold;
            letter-spacing: 0.5px;
        }
        h2 {
            text-align: center;
            margin-top: 4px;
            font-size: 18px;
            font-weight: normal;
            color: #666;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 24px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px 12px;
            text-align: left;
        }
        th {
            background-color: #f5f5f5;
            font-weight: bold;
        }
        .summary th {
            width: 25%;
            background-color: #f0f0f0;
        }
        .items thead th {
            background-color: #f7f7f7;
        }
        .section-title {
            margin-top: 40px;
            font-size: 16px;
            font-weight: bold;
            color: #444;
            border-bottom: 1px solid #ddd;
            padding-bottom: 6px;
        }
    </style>
</head>
<body>

<h1>Arasi Wood Pressed Oils</h1>
<h2>Invoice</h2>

<table class="summary">
    <tr><th>Invoice ID</th><td>' . $order['oid'] . '</td></tr>
    <tr><th>Date</th><td>' . $order['date'] . '</td></tr>
    <tr><th>Customer Name</th><td>' . htmlspecialchars($customer['name']) . '</td></tr>
    <tr><th>Mobile</th><td>' . htmlspecialchars($customer['mobile']) . '</td></tr>
    <tr><th>Address</th><td>' . htmlspecialchars($customer['address1']) . '</td></tr>
    <tr><th>Total</th><td>₹' . number_format($order['total'], 2) . '</td></tr>
</table>

<div class="section-title">Items</div>
<table class="items">
    <thead>
        <tr>
            <th>Item ID</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Amount</th>
            <th>Subtotal</th>
        </tr>
    </thead>
    <tbody>';

if ($items_result && $items_result->num_rows > 0) {
    while ($item = $items_result->fetch_assoc()) {
        $html .= '
        <tr>
            <td>' . $item['item_id'] . '</td>
            <td>' . htmlspecialchars($item['product_name']) . '</td>
            <td>' . $item['quantity'] . '</td>
            <td>₹' . number_format($item['amount'], 2) . '</td>
            <td>₹' . number_format($item['subtotal'], 2) . '</td>
        </tr>';
    }
} else {
    $html .= '<tr><td colspan="5" style="text-align:center;">No items found.</td></tr>';
}

$html .= '
    </tbody>
</table>

</body>
</html>
';

// Output PDF
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$dompdf->stream("Invoice_" . $order['oid'] . ".pdf", ["Attachment" => false]);
?>
