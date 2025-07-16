document.addEventListener('DOMContentLoaded', function() {
    // Variables
    const accessibilityToggle = document.getElementById('accessibilityToggle');
    const accessibilityPanel = document.getElementById('accessibilityPanel');
    const decreaseFont = document.getElementById('decreaseFont');
    const resetFont = document.getElementById('resetFont');
    const increaseFont = document.getElementById('increaseFont');
    const normalContrast = document.getElementById('normalContrast');
    const highContrast = document.getElementById('highContrast');
    const darkMode = document.getElementById('darkMode');
    const resetAll = document.getElementById('resetAll');
    
    let isOpen = false;
    let fontSize = 1;
    let contrastMode = 'normal';
    
    // Toggle del panel
    accessibilityToggle.addEventListener('click', function() {
        isOpen = !isOpen;
        accessibilityPanel.classList.toggle('show', isOpen);
    });
    
    // Cerrar al hacer click fuera
    document.addEventListener('click', function(e) {
        if (!document.querySelector('.accessibility-bar').contains(e.target)) {
            isOpen = false;
            accessibilityPanel.classList.remove('show');
        }
    });
    
    // Control de tamaño de fuente
    decreaseFont.addEventListener('click', function() {
        if (fontSize > 0.7) {
            fontSize -= 0.15;
            updateFontSize();
        }
    });
    
    increaseFont.addEventListener('click', function() {
        if (fontSize < 1.5) {
            fontSize += 0.15;
            updateFontSize();
        }
    });
    
    resetFont.addEventListener('click', function() {
        fontSize = 1;
        updateFontSize();
    });
    
    function updateFontSize() {
        document.documentElement.style.setProperty('--font-size-multiplier', fontSize);
        // Guardar en localStorage
        localStorage.setItem('accessibility-font-size', fontSize);
    }
    
    // Control de contraste
    normalContrast.addEventListener('click', function() {
        setContrastMode('normal');
    });
    
    highContrast.addEventListener('click', function() {
        setContrastMode('high');
    });
    
    darkMode.addEventListener('click', function() {
        setContrastMode('dark');
    });
    
    function setContrastMode(mode) {
        // Remover clases anteriores
        document.body.classList.remove('high-contrast', 'dark-mode');
        document.querySelectorAll('.accessibility-btn').forEach(btn => btn.classList.remove('active'));
        
        contrastMode = mode;
        
        switch(mode) {
            case 'high':
                document.body.classList.add('high-contrast');
                highContrast.classList.add('active');
                break;
            case 'dark':
                document.body.classList.add('dark-mode');
                darkMode.classList.add('active');
                break;
            default:
                normalContrast.classList.add('active');
        }
        
        // Guardar en localStorage
        localStorage.setItem('accessibility-contrast', mode);
    }
    
    // Reset todo
    resetAll.addEventListener('click', function() {
        fontSize = 1;
        updateFontSize();
        setContrastMode('normal');
        localStorage.removeItem('accessibility-font-size');
        localStorage.removeItem('accessibility-contrast');
    });
    
    // Cargar configuración guardada
    function loadSavedSettings() {
        const savedFontSize = localStorage.getItem('accessibility-font-size');
        const savedContrast = localStorage.getItem('accessibility-contrast');
        
        if (savedFontSize) {
            fontSize = parseFloat(savedFontSize);
            updateFontSize();
        }
        
        if (savedContrast) {
            setContrastMode(savedContrast);
        }
    }
    
    // Cargar configuración al iniciar
    loadSavedSettings();
});