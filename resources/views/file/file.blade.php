<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <main>
    <form action="" method="post">
      @csrf 
      <h2>Uploader</h2>
      <div class="form-group">
        <label for=""  class="form-label">Upload</label>
        <input type="file" name="pic">
      </div>
      <div class="form-group">
        <button class="btn">Upload</button>
      </div>
    </form>
  </main>
</body>
</html>