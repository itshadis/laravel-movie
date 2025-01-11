<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Movie Show</title>
</head>
<body>  
  <ul>
    <?php foreach($menu as $key => $value): ?>
      <li><a href="{{ $value }}">{{ $key }}</a></li>
    <?php endforeach; ?>
  </ul>

  <h1>Movie Show</h1>
  {{ dd($movie) }}
  
</body>
</html>