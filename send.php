<?php
    /*****************************************
    You need to change:
        {flow_hash} - Tracking URL hash
        {apiToken} - Token from API
    *****************************************/

    if (!empty($_REQUEST["phone"])) {
        send_the_order($_REQUEST);
    }

    function send_the_order($request)
    {
        $params = array(
            "flow_hash" => "{slHk}",
            "landing" => "https://macapnd.com/",
            "phone" => $request["phone"],
            "name" => $request["name"],
            "country" => $request["country"],
            "referrer" => $request["referrer"],
            "address" => $request["address"],
            "email" => $request["email"],
            "lastname" => $request["lastname"],
            "comment" => $request["comment"],
            "layer" => $request["layer"],
            "sub1" => $request["sub1"],
            "sub2" => $request["sub2"],
            "sub3" => $request["sub3"],
            "sub4" => $request["sub4"],
            "sub5" => $request["sub5"],
        );

        $url = "http://wapi.leadbit.com/api/pub/new-order/{_61d04c352b3ae801683032}";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        $return = curl_exec($ch);
        curl_close($ch);

        header("Location: https://priceloo.shop/thank-you-it/");
    }
        