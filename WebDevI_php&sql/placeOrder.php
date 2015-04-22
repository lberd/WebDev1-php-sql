<!DOCTYPE HTML>

<html>

<head>
  <title>Place Order</title>
  <meta charset="utf-8">
</head>

<body>
    <?php
        $db1 = new mysqli("us-cdbr-azure-west-a.cloudapp.net", "be81bae0c29c09",
            "a72f6223", "cdb_78ce6cb730");
        if (!$db1) echo "--- ERROR: Failure to Connect ---<br />\n";
        else echo "--- SUCCESS: making connection ---<br />\n";

        $q1 = "set @@auto_increment_increment=1";
        $q1Result = mysqli_query($db1, $q1);

        $name = $_REQUEST["name"];
        $title = $_REQUEST["title"];
        $cost = $_REQUEST["cost"];

        $q1 = "insert into buyers (person) values ('".$name."')";
        $q1Result = mysqli_query($db1, $q1);
        $idVal = mysqli_insert_id($db1);
        if(!$q1Result) echo "---- ERROR: Buyers Query Failure ----<br />\n";
        $q1 = "insert into purchases (buyerId, title, cost) values (".$idVal.", '".$title."', ".$cost.")";
        $q1Result = mysqli_query($db1, $q1);
        if(!$q1Result) echo "---- ERROR: Purchases Query FailureX ----<br />\n";
        echo "You have successfully placed your order!"
    ?>
</body>

</html>