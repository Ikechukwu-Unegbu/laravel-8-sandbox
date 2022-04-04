<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
      <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <!-- <h1>Hello, world!</h1> -->
    <div class="container">
      <form  id='form'>
     
     
      <div class="form-group mt-3">
          <!-- <label for="" class="form-label">Vendor</label> -->
          <input type="hidden" hidden name="_csrf" id="csrf" value="{{ csrf_token() }}" class="form-control">
        </div>

     
        <div class="form-group mt-3">
          <label for="" class="form-label">Vendor</label>
          <input type="text" name="vendor" id="vendor" class="form-control">
        </div>
        <div class="form-group mt-3">
          <label for="" class="form-label">Email</label>
          <input type="text" name="email" id="email" class="form-control">
        </div>
        <div class="form-group mt-3">
          <label for="" class="form-label">name</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group mt-3">
          <label for="" class="form-label">model</label>
          <input type="text" name="model" id="model" class="form-control">
        </div>
        <div class="form-group mt-3">
          <button style="float:right;" type="submit" class="btn btn-sm btn">
            Post Admin
          </button>
        </div>
      </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script>
      let name = document.getElementById('name');
      let vendor = document.getElementById('vendor');
      let model = document.getElementById('model');
      let email = document.getElementById('email');
      document.getElementById("form").addEventListener("submit", function(event){
        event.preventDefault();
        payload = {
          name:name.value,
          model:model.value,
          vendor:vendor.value,
          email:email.value,
        }
        let csrf = document.querySelector('input[name="_csrf"]').value;
        console.log(payload);
        console.log(csrf);
        const options = {
          method:'POST',
          headers:{
            'Content-Type':'application/json',
            'X-CSRF-Token': document.querySelector('input[name="_csrf"]').value
          },
          body:JSON.stringify(payload)
        }
        
        //make the call 
        fetch('./getquery', options)
        .then(data=>{
          return data.json();
        }).then(post => {
          console.log('post',post)
        })

      } );
       
    </script>
  </body>
</html>