<html>
	<head>
		<title>Typing System</title>
	</head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<body>
		<div id="contanier">
			<header>
		        <h2>ITyping</h2>
		        <ul>
		            <li><a href="index.php">Typing</a></li>
		            <li><a href="https://github.com/yogesh584">Github</a></li>
		            <li><a href="https://github.com/yogesh584">Linkdin</a></li>
		        </ul>
	    	</header>
			<div id="chooseOption">
	            <h2>Choose Your Typing Langauge</h2>
	            <button id="English">English</button>
	            <button id="Hindi">Hindi</button>
            </div>
         </div>
	</body>
</html>
<script>

	// Redirecting user to typing page on clicking hindi button
	let hindi = document.getElementById("Hindi");
	hindi.addEventListener("click",()=>{
		window.location = "typing.php/?id = 2";
	});


	// Redirecting user to typing page on clicking English button
	let English = document.getElementById("English");
	English.addEventListener("click",()=>{
		window.location = "typing.php/?id = 1";
	})
</script>
