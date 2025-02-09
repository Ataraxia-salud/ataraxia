document.getElementById('search-input').addEventListener('keypress', function(event) { 
    if (event.key === 'Enter') { 
        const searchValue = this.value.toLowerCase(); 
        const posts = document.querySelectorAll('.post'); 
        let found = false; 
        
        posts.forEach(function(post) { 
            const postTitle = post.querySelector('h2').textContent.toLowerCase(); 
            if (postTitle.includes(searchValue)) { 
                post.style.display = ''; 
                found = true; 
            } else { 
                post.style.display = 'none';
            } }); 
            if (!found) { 
                alert('No se encontro ningun articulo o documento relacionado.'); 
            } 
        } 
    });