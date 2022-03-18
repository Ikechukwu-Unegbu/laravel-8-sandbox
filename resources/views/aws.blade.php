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

  @if (Storage::disk('s3')->exists('images/6bZlCyP9dN2mEfbmFmzv5NmJQDanfr3qfpFT5Izi.jpg'))
    <div class="mt-4">
      <h1>Image exists</h1>
    </div>
  @else

    <h1>Image does not exist</h1>

  @endif
    <img src="https://first-bucket-by-vincent.s3.amazonaws.com/images/6bZlCyP9dN2mEfbmFmzv5NmJQDanfr3qfpFT5Izi.jpg" alt="">
    <img src="{{ Storage::disk('s3')->url('images/6bZlCyP9dN2mEfbmFmzv5NmJQDanfr3qfpFT5Izi.jpg') }}" alt="">

</body>
</html>