<?php
session_start();
if (isset($_COOKIE["basket"])) {
    foreach ($_COOKIE["basket"] as $name => $value) {
        if ($name == "id") {
            $ids = explode(":", $value);
        }
        if ($name == "name") {
            $names = explode(":", $value);
        }
        if ($name == "price") {
            $prices = explode(":", $value);
        }
        if ($name == "qty") {
            $qtys = explode(":", $value);
        }
        if ($name == "imageName") {
            $imageNames = explode(":", $value);
        }
        if ($name == "type") {
            $type = explode(":", $value);
        }
    }
    $sizeIds = sizeof($ids);
    for ($i = 0; $i <  $sizeIds; $i++) {
        $basket[] = array("id" => $ids[$i], "name" => $names[$i], "price" => $prices[$i], "qty" => $qtys[$i], "imageName" => $imageNames[$i], "type" => $type[$i]);
    }
    $_SESSION["basket"] = $basket;
} else if (!isset($_SESSION["basket"])) {
    $basket = array();
    $_SESSION["basket"] = $basket;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Furniture &amp; House Decoration &#124; FurniCrafted</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link href="css/home.css" rel="stylesheet" type="text/css" />
    <!--///////////////////////////////END OF STYLE SHEET ///////////////////////-->

    <script src="javascript/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="javascript/jquery.cycle.all.js" type="text/javascript"></script>
    <script src="javascript/jquery.easing.1.3.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(document).ready(
            function() {
                $('#imgSlides').cycle({
                    fx: 'fade',
                    speed: 800,
                    timeout: 3000,
                    pager: '#ulThumbs',
                    pause: 1,
                    pagerAnchorBuilder: function(idx, slide) {
                        // return sel string for existing anchor
                        return '#ulThumbs li:eq(' + (idx) + ') a';
                    }
                });

                $('#featuredSlides').cycle({
                    fx: 'scrollHorz',
                    timeout: 0,
                    next: '#right',
                    prev: '#left',
                    nowrap: 0
                });
            });
    </script>
</head>
<!--///////////////////////////////END OF HEAD///////////////////////////////-->

<body>
    <div id="containerDiv">
        <div id="headerDiv">
            <!--/////////////////////////// WELCOME USER ////////////////////////////////-->
            <?php
            if (isset($_POST["btnLogout"])) {
                unset($_SESSION["customer"]);
            }
            if (isset($_SESSION["customer"])) {
                $custName = $_SESSION["customer"]["name"];
                echo "<span id='welcomeSpan'><a id='aWelcome' href='account.php'>Welcome, $custName</a></span>";
                echo "  <script> 
                            $(function() 
                                {
                                    $('#login').remove();
                                })
                            </script>";
            }
            ?>
            <!--///////////////////////// END OF WELCOME USER ///////////////////////////-->
            <p>
                <a id="login" href="login.php">login &#124;</a>
                <a id="cart" href="basket.php">
                    <img src="css/images/imgCartW26xH26.png" width="26" height="26" alt="Cart Image" />
                    my cart&nbsp;<?php $size = sizeof($_SESSION["basket"]);
                                    echo "$size"; ?>&nbsp;items
                </a>
            </p>
        </div>
        <!--///////////////////////////////NAVIGATION PANEL//////////////////////////-->
        <form action="search.php" method="post">
            <div id="navigationDiv">
                <ul>
                    <li> <a class="logo" href="index.php"></a> </li>
                    <li> <a class="button" style="width:110px" href="prodList.php?prodType=bed">BEDS</a> </li>
                    <li> <a class="button" style="width:110px" href="prodList.php?prodType=chair">CHAIRS</a> </li>
                    <li> <a class="button" style="width:110px" href="prodList.php?prodType=chest">CHESTS</a> </li>
                    <li> <a class="button" style="width:120px" href="contactus.php">Contact Us</a> </li>
                    <li class="txtNav"> <input type="text" name="txtSearch" /> </li>
                    <li class="searchNav"> <input type="submit" name="btnSearch" value="" /> </li>
                    <p>


                 






                 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form - Online Furniture Shop</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"], textarea, select {
            width: 100%;
            padding: 10px;
            margin: 8px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 19px 20px;
            cursor: pointer;
            border-radius: 1px;
            
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .note {
            font-size: 0.9em;
            color: #555;
        }
    </style>
</head>
<body>

<div class="container">
    <br/>
       <h1>Feedback Form</h1>
    
    <form action="/submit-feedback" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Your name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Your email address" required>

        <label for="rating">How would you rate our furniture shop?</label>
        <select id="rating" name="rating" required>
            <option value="">Select a rating</option>
            <option value="excellent">Excellent</option>
            <option value="good">Good</option>
            <option value="average">Average</option>
            <option value="poor">Poor</option>
        </select>

        <label for="feedback">Your Feedback:</label>
        <textarea id="feedback" name="feedback" rows="5" placeholder="Write your feedback here..." required></textarea>

        <label for="recommend">Would you recommend us to others?</label>
        <select id="recommend" name="recommend" required>
            <option value="">Select an option</option>
            <option value="yes">Yes</option>
            <option value="no">No</option>
        </select>

        <input type="submit" value="Submit Feedback">
    </form>
    <p class="note">Thank you for taking the time to share your feedback!</p>
</div>

</body>
</html>


            </p>
                </ul>
            </div>
        </form>
        <!--///////////////////////////////END OF NAVIGATION/////////////////////////-->

      
</body>

</html>