<!doctype html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Learn & practice guitar strings names" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#000" />
    <title>Guitar strings</title>
    <style>
        html {
            font-size: 14px;
        }
        
        body, html {
            margin: 0;
            padding: 0;
        }
        
        body {
            font-family: monospace;
            padding: 1em;
            text-align: center;
            background-color: #000;
            color: #fff;
        }
        
        form {
            text-align: right;
        }
        
        .speed {
            position: relative;
            top: -.5em;
        }
        
        .string {
            display: inline-block;
            border-top: 2px dashed currentColor;
            width: calc(100% - 2em);
            position: relative;
            top: -.2em;
        }
        
        .random-string {
            font-size: calc(100vh - 20rem);
        }
        
        .picked, .picked+div, .random-string {
            color: crimson;
        }
        
    </style>
</head>
<body>
    <form action="">
       <span class="speed">1s </span><input type="range" min="0.2" max="10" step="0.2" value="1"/>
    </form>
    <span>e </span><div class="string"></div>
    <span>B </span><div class="string"></div>
    <span>G </span><div class="string"></div>
    <span>D </span><div class="string"></div>
    <span>A </span><div class="string"></div>
    <span>E </span><div class="string"></div>
    <span class="random-string">B</span>
</body>
<script>
    window.onload = function(){
        
        var form = document.forms[0];
        range = form.elements[0];
        
        var keepChanging = function(){
                do {x = rand()} 
                while (x == current);
                current = x;
                mark( current );
            }
        
        range.oninput = function() {
            
            var speed = document.getElementsByClassName('speed')[0];
            speed.innerHTML = range.value + 's ';
            clearInterval( interval );
            
            interval = setInterval(keepChanging ,range.value * 1000);
            
        };

        function mark( current ) {
            var spans = document.getElementsByTagName('span');
            
            for(i=1; i<7; i++) {
                spans[i].classList.remove('picked');
            }
            
            spans[current].classList.add('picked');
            
            //mark letter
            var letter = document.getElementsByClassName('random-string')[0];
            var arr = ['e','B','G','D','A','E'];
            letter.innerHTML = arr[current-1];
        };
        
        function rand() {
            return Math.floor((Math.random() * 6) + 1);
        };
        
        current = range.value;
        mark( current );
        
        interval = setInterval(keepChanging, current * 1000);
    
    };
    
</script>
</html>































