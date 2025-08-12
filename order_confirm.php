<?php
function send_order_confirmation($order_id, $customer_name, $phone, $address, $total) {
    // Send email
    $to = $phone . '@example.com'; // Replace with actual email logic
    $subject = "Order Confirmation #$order_id";
    $message = "Thank you $customer_name for your order!\nOrder ID: $order_id\nTotal: $total VND\nDelivery Address: $address";
    $headers = "From: no-reply@fastfood.com";
    mail($to, $subject, $message, $headers);

    // Send Zalo OA message
    $access_token = 'YOUR_ZALO_OA_ACCESS_TOKEN'; // Replace with your token
    $zalo_url = 'https://openapi.zalo.me/v2.0/oa/message';
    $zalo_data = [
        'recipient' => ['user_id' => $phone],
        'message' => [
            'text' => "Order #$order_id confirmed! Total: $total VND. Thank you, $customer_name."
        ]
    ];
    $ch = curl_init($zalo_url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($zalo_data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $access_token
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);
}
