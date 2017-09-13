<?php

require_once 'class/classGiftCard.php';

$giftCardModel = new airportAssGiftCard\giftCard;
 echo json_encode($giftCardModel->moveUploadFile($_FILES));
