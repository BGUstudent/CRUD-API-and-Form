function Read(){
   var url  = "services/read.php"; // service url
   const content = document.getElementById("ajax-readAll");

   fetch(url)
   .then(function(response){
      return response.json();
   })
   .then(function(data){
      data.forEach(function(item){
         // content.innerHTML += `<div><h2>${item.pseudo}</h2></div>`;
         content.innerHTML += `<div><h2>${JSON.stringify(item, null, 4)}</h2></div>`;
      });
   });
}

function ReadOne(){
   var id = document.getElementById('inputID').value;
   var url = `services/readOne.php?inputID=${id}`; // service url
   const content = document.getElementById("ajax-readOne");

   fetch(url)
   .then(function(response){
      return response.json();
   })
   .then(function(data){
      content.innerHTML = `<div><h2>${data.pseudo}</h2></div><div><h2>${JSON.stringify(data, null, 4)}</h2></div>`;
   });
}

function Create(){
   var url = "services/create.php"; // service url

   var data = {}; 
   data.pseudo=(document.getElementById('pseudo').value);
   data.lastName=(document.getElementById('lastName').value);
   data.firstName=(document.getElementById('firstName').value);
   data.birthday=(document.getElementById('birthday').value);
   data.email=(document.getElementById('email').value);
   data.pass=(document.getElementById('pass').value);
   data.sex=(document.getElementById('sex').value);

   fetch(url, {
      method : 'POST',
      body: JSON.stringify(data)
      })
   .then(function(response){
      return response.json();
   })
   .then(function(data){
      alert(`this user has been added ${JSON.stringify(data, null, 4)}`);
   })
   .catch((error) => console.log(error));
}

function Update(){
   var url = "services/update.php"; // service url
   
   var data = {}; 
   data.id=(document.getElementById('updateID').value);
   data.pseudo=(document.getElementById('updatePseudo').value);
   var data = JSON.stringify(data);

   fetch(url, {
      method : 'PUT',
      body: data
      })
   .then(function(response){
      return response.json();
   })
   .then(function(data){
      alert(`this user has been updated ${JSON.stringify(data, null, 4)}`);
   })
   .catch((error) => console.log(error));
}

function Delete(){
   var url = "services/delete.php"; // service url
  
   var data = {}; 
   data.id=(document.getElementById('deleteID').value);
   var data = JSON.stringify(data);

   fetch(url, {
      method : 'POST',
      body: data
      })
   .then(function(response){
      return response.json();
   })
   .then(function(data){
      alert(`this user has been deleted ${JSON.stringify(data, null, 4)}`);
   })
   .catch((error) => console.log(error));
}

function Login(){
   var url = "services/login.php"; // service url
   var data = {}; 
   data.pseudo=(document.getElementById('pseudoLogin').value);
   data.pass=(document.getElementById('passwordLogin').value);
   var data = JSON.stringify(data);

   fetch(url, {
      method : 'POST',
      body: data
      })
   .then(function(response){
      if (response.status == 200) {
         window.location.replace("logged.php");
         return;
       }
       else{
         alert("C'est mort frere")
       }
   })
   .catch((error) => console.log(error));;
}