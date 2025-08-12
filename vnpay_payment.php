<?php
// VNPay payment URL generator
function create_vnpay_payment($amount, $customer_name, $phone, $address) {
    $vnp_Url = "https://pay.vnpay.vn/vpcpay.html";
    $vnp_Returnurl = "http://yourdomain.com/vnpay_return.php"; // Update with your domain
    $vnp_TmnCode = "YOUR_VNPAY_TMNCODE"; // Provided by VNPay
    $vnp_HashSecret = "YOUR_VNPAY_HASHSECRET"; // Provided by VNPay
    $vnp_TxnRef = time();
    $vnp_OrderInfo = "Order payment for $customer_name";
    $vnp_OrderType = "billpayment";
    $vnp_Amount = $amount * 100; // VNPay expects amount in VND * 100
    $vnp_Locale = "vn";
    $vnp_BankCode = "";
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef
    );
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . $key . "=" . $value;
        } else {
            $hashdata .= $key . "=" . $value;
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . "&";
    }
    $vnp_Url .= "?" . $query;
    $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
    $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
    return $vnp_Url;
}
