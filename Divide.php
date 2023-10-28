<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $intA = isset($_POST['intA']) ? $_POST['intA'] : null;
    $intB = isset($_POST['intB']) ? $_POST['intB'] : null;

    if (!empty($intA) && !empty($intB)) {
        $xmlRequest = '<?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <Divide xmlns="http://tempuri.org/">
                        <intA>' . $intA . '</intA>
                        <intB>' . $intB . '</intB>
                    </Divide>
                </soap:Body>
            </soap:Envelope>';

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://www.dneonline.com/calculator.asmx',
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
                'SOAPAction: http://tempuri.org/Divide',
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
    <title>Calculator - Divide</title>
</head>
<body>
    <h2>Calculator - Divide</h2>
    <form method="post">
        <label for="intA">Enter the dividend:</label>
        <input type="text" name="intA" id="intA" required>
        <label for="intB">Enter the divisor:</label>
        <input type="text" name="intB" id="intB" required>
        <input type="submit" value="Divide">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($intA) && !empty($intB)) {
        echo "<p>Result of the division: $response</p>";
    }
    ?>
</body>
</html>
