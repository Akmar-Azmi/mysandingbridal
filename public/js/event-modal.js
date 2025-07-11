document.addEventListener('DOMContentLoaded', function () {
    const thumbnails = document.querySelectorAll('.event-thumbnail');
    const modal = document.getElementById('event-modal');
    const modalImage = document.getElementById('modal-image');
    const modalTitle = document.getElementById('modal-title');
    const modalDesc = document.getElementById('modal-desc');
    const closeModal = document.getElementById('close-modal');

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', () => {
            const img = thumbnail.querySelector('img');
            const title = thumbnail.getAttribute('data-title');
            const description = thumbnail.getAttribute('data-description');

            modalImage.src = img.src;
            modalTitle.textContent = title;
            modalDesc.textContent = description;

            modal.classList.remove('hidden');
        });
    });

    closeModal.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
        }
    });
});
