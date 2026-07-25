function playVideo() {
    const video = document.querySelector('.video');
    const thumbnail = document.querySelector('.thumbnail');
    video.style.display = 'block'; // Affiche la vidéo
    thumbnail.style.display = 'none'; // Masque la miniature
    video.play(); // Lance la vidéo
}