<html>
    <body>
        <h1>Hello, {{urldecode($name) }}</h1>
        <img src="{{str_replace('+99+','/',$avatar)}}">
        <div>
            The current UNIX timestamp is {{ time() }}.
        </div>
    </body>
</html>