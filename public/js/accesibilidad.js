document.addEventListener('DOMContentLoaded', function() {
    console.log('Iniciando sistema de accesibilidad híbrido (desplegable en móvil)...');
    
    // Variables
    const accessibilityToggle = document.getElementById('accessibilityToggle');
    const accessibilityPanel = document.getElementById('accessibilityPanel');
    const decreaseFont = document.getElementById('decreaseFont');
    const resetFont = document.getElementById('resetFont');
    const increaseFont = document.getElementById('increaseFont');
    const normalContrast = document.getElementById('normalContrast');
    const highContrast = document.getElementById('highContrast');
    const darkMode = document.getElementById('darkMode');
    const centroRelevo = document.getElementById('centroRelevo');
    const resetAll = document.getElementById('resetAll');
    
    let fontSize = 1;
    let contrastMode = 'normal';
    let isPanelOpen = false;
    // Remover la detección de móvil - ahora siempre es desplegable
    
    // Verificar elementos
    const elements = {
        accessibilityToggle, accessibilityPanel,
        decreaseFont, resetFont, increaseFont,
        normalContrast, highContrast, darkMode,
        centroRelevo, resetAll
    };
    
    const missingElements = Object.keys(elements).filter(key => !elements[key]);
    if (missingElements.length > 0) {
        console.warn('Elementos faltantes:', missingElements);
    } else {
        console.log('Todos los elementos encontrados correctamente');
    }
    
    // DETECCIÓN RESPONSIVE - Simplificada
    function updateResponsiveState() {
        // Ya no necesitamos detectar móvil vs escritorio
        // Todos los dispositivos usan el mismo comportamiento desplegable
        console.log('Modo desplegable activo en:', window.innerWidth + 'px');
    }
    
    // TOGGLE DEL PANEL - UNIVERSAL para todos los dispositivos
    function togglePanel() {
        if (!accessibilityPanel) return;
        
        isPanelOpen = !isPanelOpen;
        console.log('Toggle panel universal:', isPanelOpen ? 'abierto' : 'cerrado');
        
        if (isPanelOpen) {
            accessibilityPanel.style.display = 'flex';
            // Forzar reflow antes de agregar la clase
            accessibilityPanel.offsetHeight;
            accessibilityPanel.classList.add('show');
            
            // Agregar efecto de vibración en dispositivos compatibles
            if (navigator.vibrate) {
                navigator.vibrate(50);
            }
        } else {
            accessibilityPanel.classList.remove('show');
            // Esperar a que termine la animación antes de ocultar
            setTimeout(() => {
                if (!isPanelOpen) {
                    accessibilityPanel.style.display = 'none';
                }
            }, 300);
        }
    }
    
    // Event listener para el toggle
    if (accessibilityToggle) {
        accessibilityToggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            togglePanel();
        });
    }
    
    // Cerrar panel al hacer clic fuera (todos los dispositivos)
    document.addEventListener('click', function(e) {
        if (!isPanelOpen) return;
        
        const accessibilityBar = document.querySelector('.accessibility-bar');
        if (accessibilityBar && !accessibilityBar.contains(e.target)) {
            console.log('Click fuera del panel - cerrando');
            togglePanel();
        }
    });
    
    // Prevenir cierre al hacer clic dentro del panel
    if (accessibilityPanel) {
        accessibilityPanel.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    }
    
    // CONTROL DE TAMAÑO DE FUENTE MEJORADO
    function updateFontSize() {
        console.log('Actualizando tamaño de fuente a:', fontSize);
        
        // Método principal: usar CSS custom property
        document.documentElement.style.setProperty('--font-size-multiplier', fontSize);
        
        // Método de respaldo: aplicar directamente a elementos específicos
        const selectors = [
            'body', 'p', 'span', 'div:not(.accessibility-bar *)', 
            'a:not(.accessibility-bar *)', 'button:not(.accessibility-bar *)', 
            'input', 'textarea', 'label', 'li', 'td', 'th', 
            'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
            '.card-title', '.card-text', '.btn:not(.accessibility-bar .btn)', 
            '.form-control', '.nav-link', '.breadcrumb-item'
        ];
        
        selectors.forEach(selector => {
            try {
                const elements = document.querySelectorAll(selector);
                elements.forEach(element => {
                    if (element.closest('.accessibility-bar')) return;
                    
                    if (!element.dataset.originalFontSize) {
                        const computedStyle = window.getComputedStyle(element);
                        element.dataset.originalFontSize = computedStyle.fontSize;
                    }
                    
                    const originalSize = parseFloat(element.dataset.originalFontSize);
                    if (originalSize && originalSize > 0) {
                        element.style.fontSize = (originalSize * fontSize) + 'px';
                    }
                });
            } catch (e) {
                console.warn('Error aplicando fuente:', e);
            }
        });
        
        updateFontButtonStates();
        
        // Feedback visual y sonoro
        if (navigator.vibrate && isMobile) {
            navigator.vibrate(30);
        }
        
        console.log('Tamaño de fuente actualizado:', Math.round(fontSize * 100) + '%');
    }
    
    function updateFontButtonStates() {
        [decreaseFont, resetFont, increaseFont].forEach(btn => {
            if (btn) btn.classList.remove('active');
        });
        
        if (fontSize < 1) {
            if (decreaseFont) decreaseFont.classList.add('active');
        } else if (fontSize > 1) {
            if (increaseFont) increaseFont.classList.add('active');
        } else {
            if (resetFont) resetFont.classList.add('active');
        }
    }
    
    // Event listeners para fuente con animaciones mejoradas
    if (decreaseFont) {
        decreaseFont.addEventListener('click', function(e) {
            e.preventDefault();
            if (fontSize > 0.8) {
                fontSize -= 0.1;
                fontSize = Math.round(fontSize * 100) / 100;
                updateFontSize();
                
                // Animación visual
                this.style.transform = 'scale(0.9)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            }
        });
    }
    
    if (increaseFont) {
        increaseFont.addEventListener('click', function(e) {
            e.preventDefault();
            if (fontSize < 1.4) {
                fontSize += 0.1;
                fontSize = Math.round(fontSize * 100) / 100;
                updateFontSize();
                
                // Animación visual
                this.style.transform = 'scale(1.1)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            }
        });
    }
    
    if (resetFont) {
        resetFont.addEventListener('click', function(e) {
            e.preventDefault();
            fontSize = 1;
            updateFontSize();
            
            // Animación de rotación
            this.style.transform = 'rotate(360deg)';
            setTimeout(() => {
                this.style.transform = '';
            }, 300);
        });
    }
    
    // CONTROL DE CONTRASTE MEJORADO
    function setContrastMode(mode) {
        console.log('Cambiando modo de contraste a:', mode);
        
        // Remover clases anteriores
        document.body.classList.remove('high-contrast', 'dark-mode');
        
        // Remover clase active de botones
        [normalContrast, highContrast, darkMode].forEach(btn => {
            if (btn) btn.classList.remove('active');
        });
        
        contrastMode = mode;
        
        switch(mode) {
            case 'high':
                document.body.classList.add('high-contrast');
                if (highContrast) {
                    highContrast.classList.add('active');
                    // Animación especial para alto contraste
                    highContrast.style.transform = 'scale(1.1)';
                    setTimeout(() => {
                        highContrast.style.transform = '';
                    }, 200);
                }
                setTimeout(forceAccessibilityBarPosition, 10);
                setTimeout(forceAccessibilityBarPosition, 50);
                setTimeout(forceAccessibilityBarPosition, 100);
                break;
                
            case 'dark':
                document.body.classList.add('dark-mode');
                if (darkMode) {
                    darkMode.classList.add('active');
                    // Animación de luna creciente
                    darkMode.style.transform = 'rotate(15deg) scale(1.05)';
                    setTimeout(() => {
                        darkMode.style.transform = '';
                    }, 300);
                }
                break;
                
            default:
                if (normalContrast) {
                    normalContrast.classList.add('active');
                    // Animación de pulso
                    normalContrast.style.transform = 'scale(1.05)';
                    setTimeout(() => {
                        normalContrast.style.transform = '';
                    }, 200);
                }
        }
        
        // Feedback táctil
        if (navigator.vibrate && isMobile) {
            navigator.vibrate([50, 30, 50]);
        }
        
        console.log('Modo de contraste aplicado:', mode);
    }
    
    // Event listeners para contraste con efectos mejorados
    if (normalContrast) {
        normalContrast.addEventListener('click', function(e) {
            e.preventDefault();
            setContrastMode('normal');
        });
    }
    
    if (highContrast) {
        highContrast.addEventListener('click', function(e) {
            e.preventDefault();
            setContrastMode('high');
        });
    }
    
    if (darkMode) {
        darkMode.addEventListener('click', function(e) {
            e.preventDefault();
            setContrastMode('dark');
        });
    }
    
    // Event listener para Centro de Relevo
    if (centroRelevo) {
        centroRelevo.addEventListener('click', function(e) {
            console.log('Abriendo Centro de Relevo');
            
            // Animación de "volando"
            this.style.transform = 'translateX(-20px) scale(1.1)';
            setTimeout(() => {
                this.style.transform = '';
            }, 300);
            
            // Feedback táctil
            if (navigator.vibrate && isMobile) {
                navigator.vibrate(100);
            }
        });
    }
    
    // Función para forzar posición
    function forceAccessibilityBarPosition() {
        const accessibilityBar = document.querySelector('.accessibility-bar');
        
        if (accessibilityBar) {
            accessibilityBar.style.cssText = `
                position: fixed !important;
                top: 50% !important;
                right: 0px !important;
                transform: translateY(-50%) !important;
                z-index: 99999 !important;
                filter: none !important;
            `;
        }
    }
    
    // RESET COMPLETO CON ANIMACIÓN
    if (resetAll) {
        resetAll.addEventListener('click', function(e) {
            e.preventDefault();
            console.log('Reseteando configuración completa...');
            
            // Animación dramática de reset
            this.style.transform = 'rotate(720deg) scale(1.2)';
            this.style.transition = 'transform 0.6s cubic-bezier(0.68, -0.55, 0.265, 1.55)';
            
            setTimeout(() => {
                // Resetear tamaño de fuente
                fontSize = 1;
                document.documentElement.style.setProperty('--font-size-multiplier', fontSize);
                
                // Limpiar estilos inline
                const allElements = document.querySelectorAll('[style*="font-size"]');
                allElements.forEach(element => {
                    if (!element.closest('.accessibility-bar')) {
                        element.style.fontSize = '';
                        delete element.dataset.originalFontSize;
                    }
                });
                
                // Resetear contraste
                setContrastMode('normal');
                
                // Restaurar estilo del botón
                this.style.transform = '';
                this.style.transition = '';
                
                // Feedback táctil intenso
                if (navigator.vibrate && isMobile) {
                    navigator.vibrate([100, 50, 100, 50, 200]);
                }
                
                console.log('¡Configuración reseteada con éxito!');
            }, 300);
        });
    }
    
    // FUNCIONES RESPONSIVAS SIMPLIFICADAS
    function adjustBarForScreenSize() {
        const screenWidth = window.innerWidth;
        const screenHeight = window.innerHeight;
        
        updateResponsiveState();
        
        const accessibilityBar = document.querySelector('.accessibility-bar');
        if (!accessibilityBar) return;
        
        let topPosition;
        
        if (screenWidth <= 360) {
            topPosition = '30%';
        } else if (screenWidth <= 480) {
            topPosition = '35%';
        } else if (screenWidth <= 768) {
            topPosition = '40%';
        } else if (screenWidth <= 1024) {
            topPosition = '45%';
        } else {
            topPosition = '50%';
        }
        
        accessibilityBar.style.top = topPosition;
        
        // Manejo especial para landscape en móvil
        if (screenWidth <= 768 && screenHeight < screenWidth) {
            accessibilityBar.style.top = '50%';
            if (accessibilityPanel) {
                accessibilityPanel.style.maxHeight = '80vh';
                accessibilityPanel.style.overflowY = 'auto';
            }
        } else if (accessibilityPanel) {
            accessibilityPanel.style.maxHeight = 'none';
            accessibilityPanel.style.overflowY = 'visible';
        }
        
        console.log('Barra ajustada para:', screenWidth + 'x' + screenHeight);
    }
    
    function handleOrientationChange() {
        console.log('Cambio de orientación detectado');
        
        setTimeout(() => {
            adjustBarForScreenSize();
            forceAccessibilityBarPosition();
            
            // Si el panel está abierto, asegurar visibilidad
            if (isPanelOpen && accessibilityPanel) {
                accessibilityPanel.classList.add('show');
            }
        }, 250);
    }
    
    // INICIALIZACIÓN SIMPLIFICADA
    function initializeSettings() {
        console.log('Inicializando sistema de accesibilidad universal...');
        
        // Configurar estado inicial
        setContrastMode('normal');
        updateFontSize();
        adjustBarForScreenSize();
        forceAccessibilityBarPosition();
        
        // Configurar panel inicial - SIEMPRE oculto al inicio
        if (accessibilityPanel) {
            accessibilityPanel.style.display = 'none';
            accessibilityPanel.classList.remove('show');
            isPanelOpen = false;
        }
        
        // Animación de bienvenida
        const accessibilityBar = document.querySelector('.accessibility-bar');
        if (accessibilityBar) {
            accessibilityBar.style.opacity = '0';
            accessibilityBar.style.transform = 'translateX(100%) translateY(-50%)';
            
            setTimeout(() => {
                accessibilityBar.style.transition = 'all 0.6s cubic-bezier(0.4, 0, 0.2, 1)';
                accessibilityBar.style.opacity = '1';
                accessibilityBar.style.transform = 'translateX(0) translateY(-50%)';
            }, 100);
        }
        
        console.log('Sistema inicializado correctamente');
        console.log('Modo: Universal (desplegable en todos los dispositivos)');
    }
    
    // OBSERVADORES Y EVENTOS
    let positionCheckInterval;
    
    const bodyObserver = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                if (document.body.classList.contains('high-contrast')) {
                    if (positionCheckInterval) clearInterval(positionCheckInterval);
                    positionCheckInterval = setInterval(forceAccessibilityBarPosition, 100);
                } else {
                    if (positionCheckInterval) {
                        clearInterval(positionCheckInterval);
                        positionCheckInterval = null;
                    }
                }
            }
            
            if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
                setTimeout(() => {
                    if (fontSize !== 1) updateFontSize();
                }, 100);
            }
        });
    });
    
    bodyObserver.observe(document.body, {
        childList: true,
        subtree: true,
        attributes: true,
        attributeFilter: ['class']
    });
    
    // Event listeners para cambios de ventana
    let resizeTimeout;
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimeout);
        resizeTimeout = setTimeout(() => {
            adjustBarForScreenSize();
            forceAccessibilityBarPosition();
        }, 100);
    });
    
    window.addEventListener('orientationchange', handleOrientationChange);
    
    // Detección de cambios de tamaño para dispositivos sin orientationchange
    let lastWidth = window.innerWidth;
    let lastHeight = window.innerHeight;
    
    setInterval(() => {
        const currentWidth = window.innerWidth;
        const currentHeight = window.innerHeight;
        
        if (Math.abs(currentWidth - lastWidth) > 50 || Math.abs(currentHeight - lastHeight) > 50) {
            handleOrientationChange();
            lastWidth = currentWidth;
            lastHeight = currentHeight;
        }
    }, 500);
    
    // Event listener para scroll
    window.addEventListener('scroll', function() {
        if (document.body.classList.contains('high-contrast')) {
            forceAccessibilityBarPosition();
        }
    });
    
    // FUNCIONES DE DEBUG AVANZADAS
    function getDetailedState() {
        return {
            fontSize: fontSize,
            fontSizePercentage: Math.round(fontSize * 100) + '%',
            contrastMode: contrastMode,
            isPanelOpen: isPanelOpen,
            isMobile: isMobile,
            screenSize: {
                width: window.innerWidth,
                height: window.innerHeight,
                orientation: window.innerHeight > window.innerWidth ? 'portrait' : 'landscape'
            },
            activeButtons: {
                font: fontSize !== 1 ? (fontSize > 1 ? 'increase' : 'decrease') : 'normal',
                contrast: contrastMode
            },
            elementsPresent: {
                toggle: !!accessibilityToggle,
                panel: !!accessibilityPanel,
                allButtons: missingElements.length === 0
            }
        };
    }
    
    function runAdvancedTest() {
        console.log('🚀 INICIANDO TEST AVANZADO DE ACCESIBILIDAD');
        
        const state = getDetailedState();
        console.log('📊 Estado inicial:', state);
        
        // Test de responsividad
        console.log('📱 Modo actual:', isMobile ? 'Móvil' : 'Escritorio');
        
        if (isMobile) {
            console.log('🔄 Probando toggle en móvil...');
            if (accessibilityToggle) {
                accessibilityToggle.click();
                setTimeout(() => {
                    console.log('Panel abierto:', isPanelOpen);
                    accessibilityToggle.click();
                    console.log('Panel cerrado:', !isPanelOpen);
                }, 500);
            }
        }
        
        // Test de fuentes con timing
        setTimeout(() => {
            console.log('🔤 Probando controles de fuente...');
            if (increaseFont) increaseFont.click();
        }, 1000);
        
        setTimeout(() => {
            if (decreaseFont) decreaseFont.click();
        }, 1500);
        
        setTimeout(() => {
            if (resetFont) resetFont.click();
        }, 2000);
        
        // Test de contrastes
        setTimeout(() => {
            console.log('🎨 Probando modos de contraste...');
            if (darkMode) darkMode.click();
        }, 2500);
        
        setTimeout(() => {
            if (highContrast) highContrast.click();
        }, 3000);
        
        setTimeout(() => {
            if (normalContrast) normalContrast.click();
            console.log('✅ TEST COMPLETADO');
            console.log('📊 Estado final:', getDetailedState());
        }, 3500);
    }
    
    // API pública para debug
    window.accessibilityDebug = {
        // Estados
        getState: getDetailedState,
        isPanelOpen: () => isPanelOpen,
        
        // Controles
        togglePanel: togglePanel,
        increaseFontSize: () => increaseFont?.click(),
        decreaseFontSize: () => decreaseFont?.click(),
        resetFontSize: () => resetFont?.click(),
        setNormalContrast: () => normalContrast?.click(),
        setHighContrast: () => highContrast?.click(),
        setDarkMode: () => darkMode?.click(),
        resetAll: () => resetAll?.click(),
        
        // Utilidades
        forceAccessibilityBarPosition: forceAccessibilityBarPosition,
        adjustBarForScreenSize: adjustBarForScreenSize,
        updateResponsiveState: updateResponsiveState,
        
        // Tests
        runTest: runAdvancedTest,
        
        // Información
        version: '3.0.0-universal',
        features: [
            'Desplegable universal',
            'Todos los dispositivos',
            'Tooltips en escritorio/tablet',
            'Animaciones fluidas',
            'Responsive completo'
        ]
    };
    
    // Inicializar sistema
    initializeSettings();
    
    console.log('🎉 Sistema de accesibilidad universal cargado');
    console.log('🔧 Debug disponible en: window.accessibilityDebug');
    console.log('📱 Desplegable en todos los dispositivos');
    
    // Mensaje de bienvenida
    setTimeout(() => {
        console.log('✨ Barra de accesibilidad lista - Haz clic en el ícono para desplegar');
    }, 1000);
    
});