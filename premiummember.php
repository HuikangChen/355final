<?php 
require_once 'initialize.php';

$page = 'membership';

$itemName   = "Premium Game Membership Purchase";
$itemNumber = "PREMIUM";
$payableAmount = 19.99;
$currency   = "USD";

$data = array(
    "payment" => [
        "itemNumber" => $itemNumber,
        "itemName" => $itemName,
        "payableAmount" => $payableAmount,
        "currency" => $currency
    ],
    "regulartitle" => "Regular Membership",
    "title" => "Premium Membership",
    "price" => "$$payableAmount",
    "membershipfrequency" => "per month",
    "premiumincludes" => [
        "unlimited games per month",
        "early access to pre-releases",
        "invites into beta tests",
        "get discounts on partner sites"
    ]              
);

require_once './inc/header.php';
?>
    <main>
        <!-- Premium Membership -->
        <section class="first-section">     
            <div class="container section-box">
                <div>
                    <h2><?php echo $data['title']?></h2>
                    <h4 class="membership-price__alt"><?php echo $data['price']?> <span class="membership-price__small"><?php echo $data['membershipfrequency']?></span>
                    </h4>
                </div>
                <div class="row membership--description">
                    <div class="row-item">
                        <ul class="card-membership--description">
                            <?php foreach($data['premiumincludes'] as $includes){
                                echo "
                                <li>
                                    <i class='icon icon--check'>&#10004;</i>$includes
                                </li>
                                ";
                            }?>
                        </ul>                       
                    </div>
                </div>
                <div class="card-payment">
                    <!-- Card from -->
                    <div id="paymentSection">
                        <form method="post" id="paymentForm">
                            <h4>Item: <?php echo $data["payment"]["itemName"]; ?></h4>
                            <h4>Payable amount: $<?php echo $data["payment"]["payableAmount"].' '.$data["payment"]["currency"]; ?></h4>
                            <ul>
                                <li>
                                    <label>Card number</label>
                                    <input type="text" placeholder="1234 5678 9012 3456" maxlength="20" id="card_number" name="card_number">
                                </li>
                    
                                <li class="vertical">
                                    <ul>
                                        <li>
                                            <label>Expiry month</label>
                                            <input type="text" placeholder="MM" maxlength="5" id="expiry_month" name="expiry_month">
                                        </li>
                                        <li>
                                            <label>Expiry year</label>
                                            <input type="text" placeholder="YYYY" maxlength="5" id="expiry_year" name="expiry_year">
                                        </li>
                                        <li>
                                            <label>CVV</label>
                                            <input type="text" placeholder="123" maxlength="3" id="cvv" name="cvv">
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <label>Name on card</label>
                                    <input type="text" placeholder="John Doe" id="name_on_card" name="name_on_card">
                                </li>
                                <li>
                                    <input type="hidden" name="card_type" id="card_type" value=""/>
                                    <input type="button" name="card_submit" id="cardSubmitBtn" value="Proceed" class="payment-btn" disabled="true" >
                                </li>
                            </ul>
                        </form>
                    </div>
                    <div class="row">
                        <div class="row-item">         
                            <h4 class="or-buffer">OR</h4>      
                            <a href="<?php echo $links["regularmembership"] ?>" class="btn btn__alt btn__alt--member"><?php echo $data["regulartitle"]; ?></a>  
                        </div>
                    </div>
                </div>
            </div>         
        </section>
    </main>

    <?php require_once './inc/footer.php';?>