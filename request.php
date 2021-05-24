<?php

?>
<head>
    <style>
 table {
    border: solid 1px #DDEEEE;
    border-collapse: collapse;
    border-spacing: 0;
    font: normal 13px Arial, sans-serif;
}
table thead th {
    background-color: #DDEFEF;
    border: solid 1px #DDEEEE;
    color: #336B6B;
    padding: 10px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
}
table tbody td {
    border: solid 1px #DDEEEE;
    color: #333;
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
}
.error {
    border-color: darkred 1px solid;
    background: #ff6666;
    color: white;
    padding: 5px;
    border-radius: 5px;
}
        
</style>
</head>

<html>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  MeterId: <input type="text" name="meterId">
  <input type="submit">
</form>

<?php
    echo "<table style='margin-top: 15px;'><thead>";
    echo "
    <th>currencyCode</th>
    <th>tierMinimumUnits</th>
    <th>retailPrice</th>
    <th>unitPrice</th>
    <th>armRegionName</th>
    <th>location</th>
    <th>effectiveStartDate</th>
    <th>meterId</th>
    <th>meterName</th>
    <th>productId</th>
    <th>skuId
    <th>productName</th>
    <th>skuName</th>
    <th>serviceName</th>
    <th>serviceId</th>
    <th>serviceFamily</th>
    <th>unitOfMeasure</th>
    <th>type</th>
    <th>isPrimaryMeterRegion</th>
    <th>armSkuName</th>
    </thead>
    ";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $name = $_POST['meterId'];
  if (empty($name)) {
    echo "<span class='error'>Name is empty</span>";
  } else {
    
    $url = 'https://prices.azure.com/api/retail/prices?$filter=meterId%20eq%20%27' . $name . '%27'; 
    echo "<h1>fetched data</h1>";
    $data = file_get_contents($url); // put the contents of the file into a variable
    echo $data;
    echo "<h1>results json decode</h1>";
    $results = json_decode($data,true); // decode the JSON feed
    echo $results;
    echo "<h1>var dump</h1>";
      
    $resultsarr = array($results['Items']);
    var_dump($resultsarr);
    

  }
    for ($row = 0; $row < 1; $row++) {
        echo "<p>row number $row</p>";
        for ($col = 0; $col < 1; $col++) {
            echo "<li>".$results[0]['currencyCode']."</li>";
            
        }
    }
    
foreach ($resultsarr as $result) { 
    echo "<tr>";
    echo "<td>" . $result[0]['currencyCode'] . "</td>";
    echo "<td>" . $result[0]['tierMinimumUnits']. "</td>";
    echo "<td>" . $result[0]['retailPrice']. "</td>";
    echo "<td>" . $result[0]['unitPrice']. "</td>";
    echo "<td>" . $result[0]['armRegionName']. "</td>";
    echo "<td>" . $result[0]['location']. "</td>";
    echo "<td>" . $result[0]['effectiveStartDate']. "</td>";
    echo "<td>" . $result[0]['meterId']. "</td>";
    echo "<td>" . $result[0]['meterName']. "</td>";
    echo "<td>" . $result[0]['productId']. "</td>";
    echo "<td>" . $result[0]['skuId']. "</td>";
    echo "<td>" . $result[0]['productName']. "</td>";
    echo "<td>" . $result[0]['skuName']. "</td>";
    echo "<td>" . $result[0]['serviceName']. "</td>";
    echo "<td>" . $result[0]['serviceId']. "</td>";
    echo "<td>" . $result[0]['serviceFamily']. "</td>";
    echo "<td>" . $result[0]['unitOfMeasure']. "</td>";
    echo "<td>" . $result[0]['type']. "</td>";
    echo "<td>" . $result[0]['isPrimaryMeterRegion']. "</td>";
    echo "<td>" . $result[0]['armSkuName']. "</td>";

  }
}
?>
    		

</body>
</html>