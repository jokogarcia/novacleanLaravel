/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function callDelete(route,id){
    if(confirm("Está por eliminar este recurso. ¿Está seguro?")){
        
    }
    fetch("/"+route+"/"+id, {
        method: 'delete',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify({id: id, token: token})
         
}).then(function(value) {
   if(value.ok){
       window.location.reload(true); 
   }
   else{
       alert("Ocurrió un error: ");
   }
  }, function(reason) {
    alert("Error de red: "+reason.message);
  // rechazo
});
}