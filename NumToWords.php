<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ubiNum = isset($_POST['ubiNum']) ? $_POST['ubiNum'] : null;

    if (!empty($ubiNum)) {
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <NumberToWords xmlns="http://www.dataaccess.com/webservicesserver/">
                        <ubiNum>' . $ubiNum . '</ubiNum>
                    </NumberToWords>
                </soap:Body>
            </soap:Envelope>';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.dataaccess.com/webservicesserver/NumberConversion.wso',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $xmlRequest,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: text/xml; charset=utf-8',
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Number Conversion - NumberToWords</title>
</head>
<body>
    <h2>Number Conversion - NumberToWords</h2>
    <form method="post">
        <label for="ubiNum">Enter a number:</label>
        <input type="text" name="ubiNum" id="ubiNum" required>
        <input type="submit" value="Convert to Words">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($ubiNum)) {
        echo "<p>Result: $response</p>";
    }
    ?>
</body>
</html>
