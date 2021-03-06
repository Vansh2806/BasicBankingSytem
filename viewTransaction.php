<?php
$connect = new PDO("mysql:host=localhost;dbname=bankingsystem", "root", "");
$email = $_REQUEST['email'];
$sql = "SELECT * FROM customer_details WHERE cust_email = '".$email."'";

$statement = $connect->prepare($sql);
$statement->execute();

$rows=$statement->fetchAll();
$sql = "SELECT * FROM transaction_details WHERE cust_email = '".$email."'";

$statement = $connect->prepare($sql);
$statement->execute();

$rows1=$statement->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Banking System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="header">
    <img class="logo" src="logo_small.png" alt="logo">
    <h1 class="heading">Spark Foundation Banking System</h1>
</div>
<div class="nav">
    <input type="checkbox" id="nav-check">
    <div class="nav-header">

    </div>
    <div class="nav-btn">
        <label for="nav-check">
            <span></span>
            <span></span>
            <span></span>
        </label>
    </div>

    <div class="nav-links">
        <a href="/BasicBankingSystem/index.html" >Home</a>
        <a href="/BasicBankingSystem/ViewCustomer.php">View Customers Details</a>
        <form method="post">
            <input type="text" class="textbox" placeholder="Search">
            <input title="Search" value="" type="submit" class="button">
        </form>
    </div>
</div>
<div class="viewContainer">
    <table class="tg">
        <thead>
        <tr>
            <th class="tg-baqh"><span style="font-weight:bold">Customer Name</span></th>
            <th class="tg-amwm">Customer Email </th>
            <th class="tg-amwm">Current Balance</th>

        </tr>
        </thead>
        <tbody>
        <?php
        foreach($rows as $rec)
        {

            ?>
            <tr>
                <td class="tg-0lax"> <?php echo $rec['cust_name']?></td>
                <td class="tg-0lax"><?php echo $rec['cust_email']?></td>
                <td class="tg-0lax"> &#x20b9; <?php echo $rec['cust_amount']?></td>

            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
<h1 class="headingTransaction">Transaction History</h1>
<div class="transactionContainer">
    <table class="tg">
        <thead>
        <tr>
            <th class="tg-baqh"><span style="font-weight:bold">Transaction Name</span></th>
            <th class="tg-amwm">CR/DR </th>
            <th class="tg-amwm">Transaction Amount</th>

        </tr>
        </thead>
        <tbody>
        <?php
        foreach($rows1 as $rec1)
        {

            ?>
            <tr>
                <td class="tg-0lax"> <?php echo $rec1['trans_name']?></td>
                <td class="tg-0lax"><?php echo $rec1['trans_type']?></td>
                <td class="tg-0lax"> &#x20b9; <?php echo $rec1['trans_amount']?></td>

            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>
