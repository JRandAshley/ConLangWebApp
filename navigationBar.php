<?php
          // $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
          // echo $url;
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" style="color: #0d6efd;" href="#"><?php
      $tsql = "select LanguageName from tblLanguages where LanguageID=".$languageID;

      $stmt = sqlsrv_query($conn,$tsql);
      
      if($stmt == false){
          echo "Error";
      }
      else{
          while($obj = sqlsrv_fetch_array($stmt,SQLSRV_FETCH_ASSOC)) {
            echo $obj['LanguageName'];
          }
      }
      ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Languages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="Phoneme Overview Page" href="phonemeOverview.php">Phonemes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Morphemes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Syntax</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Dropdown</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
  currentPage = document.title;
  if(currentPage == "Phoneme Overview Page"){
    document.getElementById("Phoneme Overview Page").setAttribute('class', 'nav-link active');
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>