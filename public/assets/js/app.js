function showRescheduModal(id, btn){
    const modal = document.getElementById(id);
    const closeBtn = document.getElementById(btn);

    modal.classList.add('active');

    closeBtn.addEventListener('click', () => {
        modal.classList.remove('active');
    });
}