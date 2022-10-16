<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            Popup
        </title>
        <link rel="stylesheet" href="../css/trackPopup.css">
    </head>
    <body>
        <div class="container">
            <button type="submit" class="btn" onclick="openPopup()">Track</button>
            <div class="popup" id="popup">
                <img src="trackIcon.png">
                <h2>Sample text</h2>
                <p>Sample text again</p>
                <button type="button" onclick="closePopup()">Ok</button>
            </div>
        </div>
        <script>
            let popup = document.getElementById("popup");

            function openPopup(){
                popup.classList.add("open-popup");
            }
            function closePopup(){
                popup.classList.remove("open-popup");
            }
        </script>
    </body>
</html>