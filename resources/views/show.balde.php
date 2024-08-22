<html>
<head>
<!-- 
    All use of data here is purely speculative, encountered error trying to access this view via the controller
    Error encountered: View [view] not found.
    Steps I took to fix it:
    -Hard refreshed page
    -Closed all incognito windows and reopened in ignito window
    -Cleared view cache in terminal using php artisan view:clear
    -Cleared config cache using php artisan config:clear
    -Checked if the view was in the correct folder
    -Renamed page from view to show
-->
    <script>
        var id = {{ $id }};

        fetch(`https://pokeapi.co/api/v2/pokemon/${id}`)
            .then(response => response.json())
            .then(data => {
                console.log(data);
                document.getElementById("pokemon-image").src = data.sprites.front_default;
                document.getElementById("pokemon-name").innerText = data.name;
            });
    </script>
</head>
<body>
    <input type="button" value="Back" onclick="window.history.back()">
    {{ $id }}
    <h1 id="pokemon-name"></h1>
    <img src="" alt="" id="pokemon-image">
</body>
</html>