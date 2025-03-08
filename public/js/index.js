document.addEventListener('DOMContentLoaded', function() {
   var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
   myModal.show();
});

const copyButton = document.getElementById("copyButton");

document.addEventListener("DOMContentLoaded", () => {
   const copyButton = document.getElementById('copyButton');
   copyButton.addEventListener("click", () => {
       const url = document.getElementById('url').value;
       navigator.clipboard.writeText(url).then(() => {
           console.log(url);
       }, (err) => {
           console.error("Failed to copy text: ", err);
       });
   });
});
// copyButton.addEventListener("click", () => {
//    const url = document.getElementById('url').value;
//    navigator.clipboard.writeText(url).then(() => {
//       console.log(url);
//    }, (err) => {
//       console.error("Failed to copy text: ", err);
//    });
// });
function hideSuccess(){
   var success=document.getElementById('success-message');
   success.style.display="none"
}

let alertTrigger = document.getElementById('copy-button');
let successMessage = document.getElementById('success-message');

if (alertTrigger) {
  alertTrigger.addEventListener('click', function () {
    successMessage.innerHTML = 'Link Copied Successfully!!';
    setTimeout(hideSuccess,6000);
   })
}

