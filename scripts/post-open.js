const modal = document.querySelector('.modal');
const closeModalBtn = document.getElementById('closeModalBtn');


function openModal() {
    modal.style.display = 'block'; 
}


function closeModal() {
    modal.style.display = 'none'; 
}


closeModalBtn.onclick = function() {
    closeModal();
}


window.onclick = function(event) {
    if (event.target === modal) {
        closeModal();
    }
}
