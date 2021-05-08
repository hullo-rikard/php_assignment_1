<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Superstore</title>
</head>
<style>
  .product-wrapper {
    width: 300px;
    margin-bottom: 20px;
    display: inline-block;
    vertical-align: top;
    text-align: center;
  }
  .product-image {
    max-width: 200px;
    display: block;
    margin: auto;
  }
  .title {
    font-weight: bold;
    margin-bottom: 10px;
  }
  .price {
    text-align: center;
    font-size: 20px;
    margin-top: 10px;
  }
</style>
<body>

<h1>Welcome to Superstore!</h1>

<?php

//get data from api
$file = "https://fakestoreapi.com/products";
$data = file_get_contents($file);
$result = json_decode($data, true);

//set approved categorys
$approved_cats = ["men's clothing","jewelery","women's clothing"];

//variable needed
$last_printed_category = "";

//loop trough result and show only approved items
foreach($result as $item){

  if(in_array( $item['category'], $approved_cats )){

    //print category if it hasent been printed before
    if($last_printed_category != $item['category']){
      echo "<h2>".ucfirst($item['category'])."</h2>";
      $last_printed_category = $item['category'];
    }

    //print product
    echo '<div class="product-wrapper" id="product'.$item['id'].'">';

      echo '<img class="product-image" src="'.$item['image'].'">';
      echo '<div class="title">'.$item['title'].'</div>';
      echo $item['description'];
      echo '<div class="price">'.number_format($item['price'],2).' SEK</div>';
      echo "<br>";

    echo '</div>';

  }

}
?>
</body>
</html>