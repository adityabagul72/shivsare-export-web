const menuIcon = document.getElementById('menuIcon');
const mobileMenuContent = document.getElementById('mobileMenuContent');

menuIcon.addEventListener('click', () => {
    mobileMenuContent.style.display =
      mobileMenuContent.style.display === 'block' ? 'none' : 'block';
});

