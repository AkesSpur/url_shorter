document.addEventListener('DOMContentLoaded', function() {
   var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'));
   myModal.show();

   const copyButton = document.getElementById('copyButton');
   const successMessage = document.getElementById('success-message');

   if (copyButton) {
       copyButton.addEventListener("click", () => {
           const urlInput = document.getElementById('shortened-url');
           const textToCopy = urlInput.value;
           
           navigator.clipboard.writeText(textToCopy)
               .then(() => {
                   successMessage.textContent = 'Ссылка успешно скопирована!';
                   successMessage.style.display = 'block';
                   setTimeout(() => {
                       successMessage.style.display = 'none';
                   }, 3000);
               })
               .catch((err) => {
                   console.error("Failed to copy text: ", err);
                   successMessage.textContent = 'Не удалось скопировать ссылку';
                   successMessage.style.display = 'block';
                   setTimeout(() => {
                       successMessage.style.display = 'none';
                   }, 3000);
               });
       });
   }
});

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

