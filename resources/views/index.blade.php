<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
          overflow-x: hidden;
        }
   .col-5{
  overflow: hidden;
  object-fit: cover;
   }     
  .col-5.image{
    width:100%;
   }
   .hide{
    display: none;
   }

   #main-box{
    margin: auto;
    margin-top: 10px;
    margin-bottom: 20px;
    padding: 20px;
    background: #E7B10A;
   }
    </style>
</head>

<body>

<div class="container">
    <div class="row md-auto">
    
        <div class="col-6" id="main-box">
          <h2>Image Compression</h2>
    <form method="post" action="{{route('image.comp')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Compressed Image</label>
          <select  class="form-select">
            <option value=".jpg">JPG</option>
            <option value=".png">png</option>

          </select>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">upload Image</label>
          <input type="file" class="form-control" id="exampleInputPassword1" name="image">
        </div>
        <button type="submit" class="btn btn-primary">upload</button>
      </form>
    </div>
  </div>
  
  <div class="row">
    <div class="col-5 px-3"> 
      @if ($message = Session::get('success1'))
      <div class="alert alert-success alert-block">
        <strong>{{$message}}</strong>
        <button class="btn btn-danger" onclick="comp()">Compress</button>
      </div>
      <div class="image col-5">
        <img src="{{ asset(''.Session::get('image1')) }}" />
      </div>
      @endif
          </div>

        <div class="col-5 px-3" id="compress"> 
      @if ($message = Session::get('success2'))
            <div class="alert alert-success alert-block">
                <strong>{{$message}}</strong>
              </div>
                <div class="image col-5">
                  <img src="{{ asset(''.Session::get('image2')) }}" />
                </div>
          </div>
        @endif
        </div> 
</div>


<script>
  //enable compress photo
  const compress=document.getElementById('compress');
  compress.classList.add('hide');

  function comp(){
  compress.classList.remove('hide');
    
  }
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>