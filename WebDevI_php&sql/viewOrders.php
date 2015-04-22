<!DOCTYPE HTML>

<html>

<head>
  <title>View Orders</title>
  <meta charset="utf-8">
  <style type="text/css">
    table{
      text-align: right;
      margin: auto;
    }

  </style>
</head>

<body>
    <?php
        $db1 = new mysqli("us-cdbr-azure-west-a.cloudapp.net", "be81bae0c29c09",
            "a72f6223", "cdb_78ce6cb730");
        if (!$db1) echo "--- ERROR: Failure to Connect ---<br />\n";
        else echo "--- SUCCESS: making connection ---<br />\n";

        $q1 = "select buyers.buyerId, buyers.person, purchases.title, purchases.cost from purchases inner join buyers on purchases.buyerId=buyers.buyerId order by buyerId";
        $q1Result = mysqli_query($db1, $q1);
        if (!$q1Result) echo "---- ERROR: Query Failure ----<br />\n";
        echo "<table border='1'\n";
        echo "<tr> <th>ID</th> <th>Name</th> <th>Title</th> <th>Cost</th> </tr>\n";
        while(list($buyerId, $person, $title, $cost) = mysqli_fetch_row($q1Result))
        {
            $cost = number_format((float)$cost, 2, '.', '');
            echo "<tr> <td>$buyerId</td> <td>$person</td> <td>$title</td> <td>$cost</td> </tr>\n";
        }
        echo "</table>\n";
    ?>
</body>

</html>