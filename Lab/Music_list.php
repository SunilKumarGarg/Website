<!doctype html>
<html>
<head>

<style>

#Music {
    float:left;
    top: 0px;
    left: 170px;
    width:160px;
    height:400px;
    margin:20px; 
}

#Musicbar {
    top: 0px;
    left: 170px;
    width:100%;
    height:200%;
    margin:5px;    
}

</style>

</head>
<body>


<div id='Musicbar'>

<?php
include ("Database.php");
$conn = getDatabaseConnection();

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else
{    
    $sql = "Select * FROM Music";
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
    {        
        while($row = $result->fetch_assoc()) 
        {
			$link = $row["Link"] . "?product=" .  $row["Product number"]. "&item=Music";
?>
            <div id="Music">
            <a href= <?php echo $link; ?> target="_blank">
            <img src=<?php echo $row["Image"]; ?> height="200" width="150">
            </a>
            <div class="content_box">
            <div class="item_add"><span class="item_price"><h6><?php echo $row["Name"]; ?></h6></span></div>
            <div class="item_add"><span class="item_price"><h6>Price: $ <?php echo $row["Price"]; ?></h6></span></div>
			<div class="item_add"><span class="item_price"><h6>Discount: $ <?php echo $row["Discount"]; ?></h6></span></div>
            </div>
            </div>
<?php

        }
    }
}
?>
</div>
</body>
</html>