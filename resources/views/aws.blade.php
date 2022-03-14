<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h2>Aws Images</h2>

  <!-- dd({{$aws->name}});
  dd({{$aws->img_url}}); -->
  <!-- Storage::disk('s3')->has('file.jpg'); -->
  @if(Storage::disk('s3')->has('ujx0RwlxSrg5F3poDkdBMWOs5hKkUCIzO06EjXbF.jpg')):
  <h1>The file exists</h1>
  @else
  <h1>The file doesnt exist</h1>
  @endif
 

    <img src="https://first-bucket-by-vincent.s3.amazonaws.com/images/6bZlCyP9dN2mEfbmFmzv5NmJQDanfr3qfpFT5Izi.jpg" alt="">

</body>
</html>