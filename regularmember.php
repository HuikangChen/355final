<?php 

require_once 'initialize.php';

$page = 'membership';

$itemName   = "Premium Game Membership Purchase";
$itemNumber = "PREMIUM";
$payableAmount = 9.99;
$currency   = "USD";

$data = array(
    "payment" => [
        "itemNumber" => $itemNumber,
        "itemName" => $itemName,
        "payableAmount" => $payableAmount,
        "currency" => $currency
    ],
    "title" => "Regular Membership",
    "premiumtitle" => "Premium Membership",
    "price" => "$$payableAmount",
    "membershipfrequency" => "per month", 
    "regularincludes" => [
        "get up to 2 free games per month",
        "get free demos of latest games"
    ]               
);

require_once './inc/header.php';
?>
    <main>
        <!-- Regular Membership -->
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
                            <?php foreach($data['regularincludes'] as $includes){
                                echo "
                                <li>
                                    <i class='icon icon--check'>&#10004;</i>$includes
                                </li>
                                ";
                            }?>
                        </ul>                       
                    </div>
                </div>
                    
                <form action="#" class="membership-form">
                    <div class="row">
                        <div class="row-item">         
                            <h4>Debit/Credit Card Info</h4>
                            <div class="input-container">
                                <label for="cardnumber">Card number</label>
                                <input type="text" name="cardnumber" placeholder="12345678912345678" class="input-field__white">
                            </div>
                            <div class="input-container input-container__tiny">
                                <label for="expmonth">Expiry month</label>
                                <input type="text" name="expmonth" placeholder="MM" class="">
                            </div>
                            <div class="input-container input-container__tiny">
                                <label for="expyear">Expiry year</label>
                                <input type="text" name="expyear" placeholder="YYYY" class="">
                            </div>
                            <div class="input-container input-container__tiny">
                                <label for="cvv">CVV</label>
                                <input type="text" name="cvv" placeholder="123" class="">
                            </div>

                            <div class="input-container">
                                <label for="cardname">Name On Card</label>
                                <input type="text" name="cardname" placeholder="John Doe" class="input-field__white">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row-item">         
                            <input type="button" value="Start 30 Day Trial" class="btn btn--trial">
                            <h4 class="or-buffer">OR</h4>      
                            <a href="<?php echo $links["premiummembership"] ?>" class="btn btn__alt btn__alt--member"><?php echo $data["premiumtitle"]; ?></a>  
                        </div>
                    </div>
                </form>  
            </div>         
        </section>
    </main>
    
    <?php require_once './inc/footer.php';?>