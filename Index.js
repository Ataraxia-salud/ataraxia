//aqui inicia la funcion del menu jsjsjs
// diferenciar el boton al presionar :3
const userMenu = document.getElementById('userMenu');
const dropdownMenu = document.getElementById('dropdownMenu');

// aqui se muestra el menu al hacer click :b
userMenu.addEventListener('click', (e) => {
    dropdownMenu.classList.toggle('active');
    e.stopPropagation(); // Evita que el clic cierre el menú automáticamente
});

// Cerrar el menú 
window.addEventListener('click', () => {
    dropdownMenu.classList.remove('active');
});
// evita cerrar menu
dropdownMenu.addEventListener('click', (e) => {
    e.stopPropagation();
});

    document.getElementById('userImage').addEventListener('click', function() {
        document.getElementById('imageForm').style.display = 'block';
    });
