<?php
require('dbcon.php');

$result = $conn->query("SELECT * FROM tblsubscriptions");

echo "<table border='1'><tr><th>ID</th><th>User</th><th>Plan</th><th>Amount</th><th>Transaction ID</th><th>Status</th><th>Timestamp</th></tr>";
while ($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>{$row['id']}</td>
        <td>{$row['username']}</td>
        <td>{$row['plan']}</td>
        <td>₹{$row['amount']}</td>
        <td>{$row['transaction_id']}</td>
        <td>{$row['payment_status']}</td>
        <td>{$row['created_at']}</td>
    </tr>";
}
echo "</table>";
?>
