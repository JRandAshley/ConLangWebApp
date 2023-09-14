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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="languageOverview.php">Phonemes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Morphemes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Syntax</a>
        </li>
      </ul>
      <!-- <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->
    </div>
  </div>
</nav>