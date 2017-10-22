<?php
$file = "order.json";
if (!file_exists($file)) {
    echo "There is no order uploaded to calculate the final price";
    exit();
    
}
//-----part1

$data     = file_get_contents("order.json");
$wizards  = json_decode($data, true);
$totalsum = 0;
foreach ($wizards['items'] as $q) {
    $eachprice = $q['total'];
    $totalsum += $eachprice;
}


if ($totalsum > 1000) {
    ;
    $totalsum10 = $totalsum * 0.9;
    
} else {
    $totalsum10 = $totalsum;
    
}

//-----part2
//For every product of category "Switches" (id 2), when you buy five, you get a sixth for free.

$prodata  = file_get_contents("products.json");
$products = json_decode($prodata, true);
$cart     = array();
$cartdis  = array();
foreach ($wizards['items'] as $pi) {
    $pid = $pi['product-id'];
    
    if ($pi['quantity'] >= 5) {
        foreach ($products as $product) {
            $id = $product['id'];
            if ($pid == $id) {
                if ($product['category'] == 2) {
                    $add       = $pi['product-id'];
                    $cart[]    = $add;
                    $khar      = intval($pi['quantity'] / 5);
                    $disvalue  = $khar * $pi['unit-price'];
                    $cartdis[] = $disvalue;
                    $offer1dis = array_sum($cartdis);
                    
                }
            }
            
        }
        
    } 
}
 

     if (empty($offer1dis)){
	 $offer1dis=0;
	 }
	 
//how many products from switch category?




$cart7 = array();

foreach ($wizards['items'] as $pi) {
    $pid = $pi['product-id'];
    
    foreach ($products as $product) {
        $id = $product['id'];
        if ($pid == $id) {
            if ($product['category'] == 2) {
                $add7     = $pi['product-id'];
                $cart7[]  = $add7;
                $add7i    = $pi['quantity'];
                $cart7i[] = $add7i;
                $combine  = array_combine($cart7, $cart7i);
                
            }
            
        }
        
        
    }
}
echo 'you have bought ' . '<b>' . (count($cart7)) . '</b>' . ' product(s) from the "SWITCH" category';

echo '<br/>';
if (!empty($combine)) {
    
    
    foreach ($combine as $m => $m_value) {
        echo 'you have bought ' . '<b>' . $m_value . '</b>' . ' quantities from ' . '<b>' . $m . '</b>';
        echo '<br/>';
    }
}
echo '<br/>';


//-----part3
//If you buy two or more products of category "Tools" (id 1), you get a 20% discount on the cheapest product

$cart1 = array();

foreach ($wizards['items'] as $pi) {
    $pid = $pi['product-id'];
    
    if ($pi['quantity'] >= 2) {
        foreach ($products as $product) {
            $id = $product['id'];
            if ($pid == $id) {
                if ($product['category'] == 1) {
                    $add     = $pi['unit-price'];
                    $cart1[] = $add;
                }
            }
            
        }
        
    }
}

if ((count($cart1) == 0) || empty($cart1)) {
    
    $discountfora = 0;
} else {
    $mini         = min($cart1);
    $discountfora = 0.2 * $mini;
    
    
}
//how many products from tools category?



$cart9 = array();

foreach ($wizards['items'] as $pi) {
    $pid = $pi['product-id'];
    
    foreach ($products as $product) {
        $id = $product['id'];
        if ($pid == $id) {
            if ($product['category'] == 1) {
                $add9      = $pi['product-id'];
                $cart9[]   = $add9;
                $add9i     = $pi['quantity'];
                $cart9i[]  = $add9i;
                $combineo2 = array_combine($cart9, $cart9i);
                
            }
            
        }
        
        
    }
}
echo 'you have bought ' . '<b>' . count($cart9) . '</b>' . ' product(s) from the "TOOLS" category';
echo '<br/>';
if (!empty($combineo2)) {
    
    
    
    ;
    foreach ($combineo2 as $m => $m_value) {
        echo 'you have bought ' . '<b>' . $m_value . '</b>' . ' quantities from ' . '<b>' . $m . '</b>';
        echo '<br/>';
    }
}



$offer1and2 = $offer1dis + $discountfora;
$totalsumf  = $totalsum10 - $offer1and2;

//overalllllll


echo '<br/><br/>';
echo '<b>' . 'offer1: ' . '</b>' . 'your discount based on every product of category ' . '<i>' . 'Switch' . '</i>' . ' when you buy five, you get a sixth for free: ' . '<b>' . $offer1dis . '</b>';
echo '<br/><br/>';
echo '<b>' . 'offer2: ' . '</b>' . 'your discount based on :If you buy two or more products of category' . '<i>' . ' Tools' . '</i>' . ', you will get a 20% discount on the cheapest product: ' . '<b>' . $discountfora . '</b>';
echo '<br/><br/>';
echo 'your final price' . '<b>' . ' without discount' . '</b>' . ' is: ' . '<b>' . $totalsum . '</b>' . '<br/>';
echo '<br/>';
echo "your " . '<b>' . "total discount" . '</b>' . " of offer 1 and offer 2 is:" . '<b>' . $offer1and2 . '</b>';
echo '<br/><br/>';
echo 'your' . '<b>' . ' final price' . '</b>' . " is (another 10 percent discount if you buy more than 1000): " . '<b>' . $totalsumf . '</b>';

?>
