function toggleTheme() {
    document.body.classList.toggle('dark-mode');
    const icon = document.querySelector('.theme-toggle i');
    icon.classList.toggle('fa-sun');
    icon.classList.toggle('fa-moon');
}

function createFlowers() {
    const container = document.body;
    const flowerEmojis = ['🌸', '🌺', '🌹', '🌷', '💐'];
    const numberOfFlowers = 20;

    for (let i = 0; i < numberOfFlowers; i++) {
        const flower = document.createElement('div');
        flower.classList.add('floating-flower');
        flower.textContent = flowerEmojis[Math.floor(Math.random() * flowerEmojis.length)];
        flower.style.left = `${Math.random() * 100}vw`;
        flower.style.fontSize = `${Math.random() * 20 + 10}px`;
        flower.style.animationDuration = `${Math.random() * 5 + 5}s`;
        flower.style.animationDelay = `${Math.random() * 5}s`;
        container.appendChild(flower);
    }
}

createFlowers();