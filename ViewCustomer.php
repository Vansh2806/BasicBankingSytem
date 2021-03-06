<?php
$connect = new PDO("mysql:host=localhost;dbname=bankingsystem", "root", "");

$sql = "SELECT * FROM customer_details ORDER BY cust_id";

$statement = $connect->prepare($sql);
$statement->execute();

$rows=$statement->fetchAll();

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
        <a href="#viewContainer">View Customers Details</a>
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
            <th class="tg-amwm">Actions</th>
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
            <td class="tg-0lax"><div class="actions"><a href=<?php echo '"'."viewTransaction.php?email=".$rec['cust_email'].'"'?> ><i class="fa fa-eye" aria-hidden="true"></i></a><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                </div></td>
        </tr>
<?php } ?>
        </tbody>
    </table>
</div>
</body>
</html>