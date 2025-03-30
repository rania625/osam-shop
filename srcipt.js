
        window.onload = function() {
            // L9lb tous les liens fi page
            const links = document.querySelectorAll('a'); // kayjeb les liens <a>

            // Dir lloop 3la kol lien
            links.forEach(link => {
                let href = link.getAttribute('href'); // jeb lien de chaque balise <a>
                
                // Si lien fih .html, bdlo b .php
                if (href && href.includes('.html')) {
                    link.setAttribute('href', href.replace('.html', '.php')); // bdl l'extension
                }
            });
        }
    