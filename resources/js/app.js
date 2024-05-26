import './bootstrap';
import 'flowbite';

// Define Global Models
const generalErrAlert = document.getElementById('generalErrAlert');
if (generalErrAlert) {
	generalErrAlert.style.display = 'none';
}


// Functionality for scrolling in navbar
window.addEventListener('scroll', function() {
    const navigation = document.querySelector('.navigation');
    if (navigation) {
        if (window.scrollY > 0) {
            navigation.classList.add('bg-white');
        } else {
            navigation.classList.remove('bg-white');
        }
    }
	console.log(navigation);
});