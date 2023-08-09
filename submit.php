<?php
if (isset($_POST["room"])) {
    $cookieData = $_POST['cookies'];
    $roomName = $_POST['room'];

    if (isset($_FILES["file"])) {
        $filename = $_FILES["file"]["tmp_name"];

        $ch = curl_init();
        $cfile = new CURLFile($filename, 'image/jpeg', 'test_name.png');

        curl_setopt($ch, CURLOPT_URL, 'https://tryhackme.com/api/room/manage/image/upload-image');
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $postData = array(
            'file' => $cfile,
            'room' => $roomName
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: multipart/form-data",
            "Cookie: $cookieData"
        ));

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        } else {
            $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);

            if ($response == 200) {
                $realURL = json_decode($result, true);
                echo $realURL['url'];
            } else {
                echo 'Server responded with status: ' . $response;
            }
        }
        curl_close($ch);
    }
}
?>
