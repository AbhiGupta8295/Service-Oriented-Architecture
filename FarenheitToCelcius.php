<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fahrenheit = isset($_POST['fahrenheit']) ? $_POST['fahrenheit'] : null;

    if (!empty($fahrenheit)) {
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
            <soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
                <soap12:Body>
                    <FahrenheitToCelsius xmlns="https://www.w3schools.com/xml/">
                        <Fahrenheit>' . $fahrenheit . '</Fahrenheit>
                    </FahrenheitToCelsius>
                </soap12:Body>
            </soap12:Envelope>';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.w3schools.com/xml/tempconvert.asmx',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $xmlRequest,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/soap+xml; charset=utf-8',
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
    <title>Fahrenheit to Celsius Conversion</title>
</head>
<body>
    <h2>Fahrenheit to Celsius Converter</h2>
    <form method="post">
        <label for="fahrenheit">Enter Fahrenheit temperature:</label>
        <input type="text" name="fahrenheit" id="fahrenheit" required>
        <input type="submit" value="Convert">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($fahrenheit)) {
        echo "<p>$fahrenheit degrees Fahrenheit is equivalent to:</p>";
        echo "<p>$response</p>";
    }
    ?>
</body>
</html>
