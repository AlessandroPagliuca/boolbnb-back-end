import './bootstrap';
import '~resources/scss/app.scss';
import * as bootstrap from 'bootstrap';
import.meta.glob([
    '../img/**'
])

const deleteButtons = document.querySelectorAll('.delete-btn');
deleteButtons.forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();

        const modal = document.getElementById('deleteModal');

        const bootstrapModal = new bootstrap.Modal(modal);
        bootstrapModal.show();

        const btnDelete = modal.querySelector('button.btn-danger');

        btnDelete.addEventListener('click', () => {
            btn.parentElement.submit();
        });
    });
});
