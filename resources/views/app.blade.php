<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="https://cdn.tailwindcss.com"></script>
	<title>Movie App</title>
</head>
<body class="bg-gray-900 text-white">
	<header class="flex justify-between p-5 bg-gray-800">
		<h1 class="text-2xl font-bold">Movie Laravel</h1>
		<button class="bg-blue-600 px-4 py-2 hover:bg-blue-500">Add</button>
	</header>

	<section class="container mx-auto p-5">
		@yield('content')	
	</section>
</body>
</html>