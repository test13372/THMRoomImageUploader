<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Uploader</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <form action="submit.php" type="multipart/form-data" method="POST">
        <label for="room">Room code:</label>
        <input type="text" name="room" id="room" required>
        <br>
        
        <label for="file">Choose a file:</label>
        <input type="file" name="file" id="file" required>
        <br>
        
        <label for="cookies">Enter Cookies:</label>
        <input type="text" name="cookies" id="cookies" placeholder="Enter cookies data" required>
        <br>

        <label for="cookies">Alt Text:</label>
        <input type="text" name="altText" id="altText" placeholder="Enter Alt Text" required>
        <br>
        
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <button id="copyButton" style="margin-top: 10px;">Copy HTML</button>
    <button id="copyButton2" style="margin-top: 10px;">Copy Markdown</button>
    <div id="responseMessage" style="padding: 10px;"></div>
    <div id="htmlMessage" style="padding: 10px;"></div>
    <div id="markdownMessage" style="padding: 10px;"></div>

    
    <script src="script.js"></script>
</body>

</html>
