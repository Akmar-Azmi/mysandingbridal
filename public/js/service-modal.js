document.addEventListener('DOMContentLoaded', function () {
    const triggers = document.querySelectorAll('.service-trigger');
    const modal = document.getElementById('service-modal');
    const img = document.getElementById('service-modal-image');
    const title = document.getElementById('service-modal-title');
    const desc = document.getElementById('service-modal-desc');
    const close = document.getElementById('service-close');

    triggers.forEach(trigger => {
        trigger.addEventListener('click', () => {
            img.src = trigger.dataset.img;
            title.textContent = trigger.dataset.title;
            desc.textContent = trigger.dataset.description;
            modal.classList.remove('hidden');
        });
    });

    close.addEventListener('click', () => {
        modal.classList.add('hidden');
    });

    modal.addEventListener('click', e => {
        if (e.target === modal) modal.classList.add('hidden');
    });
});
