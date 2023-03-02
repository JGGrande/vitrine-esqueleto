<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div id="root">aaaa</div>

<script >
    fetch("https://api.adviceslip.com/advice").then((response)=>response.json())
    .then((response)=> document.querySelector("#root").innerHTML = `${response.slip.advice}`)
</script>
</body>
</html>