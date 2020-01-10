<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <script type="text/JavaScript" src="ajax.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<!-- Login -->
<!-- <form id="login" method="post"> -->
  <fieldset id="login" style="width:200px">
    <legend><h1>Login</h1></legend>
    <label for="pseudoLogin"><b>Pseudo</b></label>
    <input type="text" placeholder="Enter Username" name="pseudoLogin" id="pseudoLogin" required><br>

    <label for="passwordLogin"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="passwordLogin" id="passwordLogin" required><br>

    <button onclick="Login()" style="width:260px" value="submitLogin" name="submitLogin" type="submit">Login</button>
</fieldset>
<!-- </form> -->
<!-- End Login -->

<!-- titres et bouttons modaux -->
<h2>Modal Signup Form</h2>
<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign Up</button>
<!-- End titres et bouttons modaux -->

<!-- Menu modal Create -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <div class="modal-content">
  <!-- <form method="POST" onsubmit="return validateForm()" class="modal-content"> -->
    <div class="container">
      <h1>Sign Up</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>

      <label for="pseudo"><b>Pseudo</b></label>
      <input type="text" placeholder="Pick a pseudo" name="pseudo" id="pseudo" required><br>

      <label for="lastName"><b>Name</b></label>
      <input type="text" placeholder="Enter your name" name="lastName" id="lastName" required>

      <label for="firstName"><b>First name</b></label>
      <input type="text" placeholder="Enter your firstname" name="firstName" id="firstName" required><br>

      <label for="birthday"><b>Birthday</b></label>
      <input type="date" placeholder="Enter your birthday" name="birthday" id="birthday" required>

      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" id="email" required><br><br>

      <label for="pass"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass" id="pass" required>

      <label for="pass-repeat"><b>Repeat Password</b></label>
      <input type="password" placeholder="Repeat Password" name="passRepeat" id="passRepeat" required><br>

      <label for="sex"><b>Please select your gender:</b><br>
      <select id="sex" name="sex"><br>
      <option value="male"> Male</option><br>
      <option value="female"> Female</option><br>
      </select>

      <p>By creating an account you agree to our <a href="terms.html" style="color:dodgerblue">Terms & Privacy</a>.</p>

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <button type="submit" onclick="validateForm()" class="signupbtn">Sign Up</button>

      </div>
    </div>
  </div>
  <!-- </form> -->
</div>
<!-- End menu modal -->

<!-- Read All -->
  <div class="readAll">
    <h2>Voir tous les utisateurs</h2>
      <button onclick="Read()" style="width:100px">Read all</button>    
      <!-- Ajax container -->
      <div id="ajax-readAll"></div>                        
  </div>

<!-- Read One -->
  <div class="readOne">
    <h2>Voir un utisateur</h2>
      <input type="text" placeholder="Enter an ID" name="inputID" id="inputID" required>
      <button onclick="ReadOne()" style="width:100px">Read One</button>
      <!-- Ajax container -->
      <div id="ajax-readOne"></div>                        
  </div>

<!-- Update -->
  <div class="update">
    <h2>Modifier un pseudo</h2>
      <input type="text" placeholder="Enter an ID" name="updateID" id="updateID" required>
      <input type="text" placeholder="New pseudo" name="updatePseudo" id="updatePseudo" required>
      <button onclick="Update()" style="width:100px">Update</button>
      <!-- Ajax container -->
      <div id="ajax-update"></div>                        
  </div>

<!-- Delete -->
  <div class="delete">
  <h2>Supprimer un utilisateur</h2>
    <input type="text" placeholder="Enter an ID" name="deleteID" id="deleteID" required>
    <button onclick="Delete()" style="width:100px">Delete</button>
    <!-- Ajax container -->
    <div id="ajax-delete"></div>                        
  </div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

//Verify inputs validity before submitting
//Check age
function validateForm() { 
  var today = new Date();
  var birthDate = new Date(document.getElementById("birthday").value);
  var ageY = today.getFullYear() - birthDate.getFullYear();
  var ageM = today.getMonth() - birthDate.getMonth();
  var ageD = today.getDate() - birthDate.getDate();
  var majeur
  if (ageY>18 || (ageY===18 && ageM>0)){
    majeur=true;
  } else if (ageY===18 && ageM===0 && ageD>=0){
    majeur=true;
  } else {
    alert("Retourne jouer à la GameBoy !");
    majeur=false;
  }
//Check pseudo
  var pseudoC;
  if (document.getElementById("pseudo").value=="dieu") {
    alert("Vous n'êtes pas Dieu");
    pseudoC=false;
  } else if (document.getElementById("pseudo").value=="root") {
      alert("I'm Groot !");
      pseudoC=false;
  } else if (document.getElementById("pseudo").value=="admin") {
      alert("Si toi t'es admin, moi je suis Dove");
      pseudoC=false;
  } else{
    pseudoC=true;
  }
// check email
  var mailC;
  if (document.getElementById("email").value=="dieu@paca.happy-dev.fr") {
    alert("Adresse mail interdite");
    mailC=false;
  } else if (document.getElementById("email").value=="root@paca.happy-dev.fr") {
      alert("Adresse mail interdite");
      mailC=false;
  } else if (document.getElementById("email").value=="admin@paca.happy-dev.fr") {
      alert("Adresse mail interdite");
      mailC=false;
  } else{
    mailC=true;
  }
  // Validate form
    if (majeur && pseudoC && mailC){
      Create();
    }
    else{
      return false;
    }
}
</script>

</body>
</html>