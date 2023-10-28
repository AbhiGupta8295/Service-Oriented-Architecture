<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $celsius = isset($_POST['celsius']) ? $_POST['celsius'] : null;

    if (!empty($celsius)) {
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
            <soap12:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap12="http://www.w3.org/2003/05/soap-envelope">
                <soap12:Body>
                    <CelsiusToFahrenheit xmlns="https://www.w3schools.com/xml/">
                        <Celsius>' . $celsius . '</Celsius>
                    </CelsiusToFahrenheit>
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
    <title>Celsius to Fahrenheit Conversion</title>
</head>
<body>
    <h2>Celsius to Fahrenheit Converter</h2>
    <form method="post">
        <label for="celsius">Enter Celsius temperature:</label>
        <input type="text" name="celsius" id="celsius" required>
        <input type="submit" value="Convert">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($celsius)) {
        echo "<p>$celsius degrees Celsius is equivalent to:</p>";
        echo "<p>$response</p>";
    }
    ?>
</body>
</html>
