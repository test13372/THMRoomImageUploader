<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload and Cookies POST</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <form action="submit.php" type="multipart/form-data" method="POST">
        <label for="room">Room Name:</label>
        <input type="text" name="room" id="room" required>
        <br>
        
        <label for="file">Choose a file:</label>
        <input type="file" name="file" id="file" required>
        <br>
        
        <label for="cookies">Enter Cookies:</label>
        <input type="text" name="cookies" id="cookies" placeholder="Enter cookies data" required>
        <br>
        
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <span id="errorMessage" style="color:red;"></span>
    <div id="responseMessage" style="padding: 10px;"></div>

    
    <script src="script.js"></script>
</body>

</html>
