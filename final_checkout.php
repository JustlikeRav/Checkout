<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
  background-color: black;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 160px;
}

.container {
  background-color: #ccc;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #333;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}
}
      </style>
   </head>
   <body>
      <img src="https://www.avenview.com/purchase/avenview.png" alt="Flowers in Chania" width="460" height="345">
      <div class="row">
         <div class="col-25">
            <div class="container">
               <?php
                  $productPrices = explode("*", $_GET['productPrices']);
                  $productNames = explode("*", $_GET['productNames']);
                  
                  echo '<h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>' . (count($productPrices) - 1) . '</b></span></h4>';
                  
                  for ($x = 0;$x <= count($productPrices);$x++)
                  {
                  
                      echo "<p><a>" . $productNames[$x] . "</a> <span class='price'>" . $productPrices[$x] . "</span></p>";
                  
                  }
                  
                  ?>
               <hr>
               <?php
                  echo '<p>Total <span class="price" style="color:black"><b>' . $_GET['totalPrice'] . '</b></span></p>';
                  ?>
            </div>
         </div>
      </div>
   </body>
</html>