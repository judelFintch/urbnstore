//method manage model delete prodct confirmation message
document.addEventListener('DOMContentLoaded', function () {
    Livewire.on('show-delete-confirmation', () => {
        const modal = new bootstrap.Modal(document.getElementById('deleteModal'));
        modal.show();
    });
});

//method manage model delete prodct confirmation message