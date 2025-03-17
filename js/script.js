document.addEventListener('DOMContentLoaded', function() {
    const previews = document.querySelectorAll('.expandiblePreview');
    
    previews.forEach(preview => {
        preview.addEventListener('click', function() {
            const contentWrapper = this.nextElementSibling;
            contentWrapper.classList.toggle('active');
        });
    });
});