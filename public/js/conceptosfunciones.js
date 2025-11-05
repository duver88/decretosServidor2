document.addEventListener('DOMContentLoaded', function() {
    const conceptTypeSelect = document.getElementById('concept_type_id');
    const conceptThemeSelect = document.getElementById('concept_theme_id');
    
    // Validar que los elementos existan
    if (!conceptTypeSelect || !conceptThemeSelect) {
        console.error('Elementos requeridos no encontrados');
        return;
    }
    
    const loadingText = 'Cargando temas...';
    const emptyText = 'No hay temas disponibles';
    const selectTypeText = 'Primero seleccione un tipo';
    
    // Obtener tema seleccionado (debe ser pasado desde el servidor)
    const selectedThemeId = window.selectedThemeId || null;
    
    // Estado inicial
    function resetThemeSelect() {
        conceptThemeSelect.innerHTML = `<option value="">${selectTypeText}</option>`;
        conceptThemeSelect.disabled = true;
        conceptThemeSelect.classList.add('text-muted');
    }
    
    // Función para remover alertas existentes
    function removeExistingAlerts() {
        const existingAlert = conceptThemeSelect.parentNode.querySelector('.alert');
        if (existingAlert) {
            existingAlert.remove();
        }
    }
    
    // Función para cargar temas basados en el tipo seleccionado
    function loadThemes(typeId) {
        // Remover alertas previas
        removeExistingAlerts();
        
        // Mostrar estado de carga
        conceptThemeSelect.innerHTML = `<option value="">${loadingText}</option>`;
        conceptThemeSelect.disabled = true;
        conceptThemeSelect.classList.add('text-muted');
        
        // Hacer petición AJAX
        fetch(`/concepts/themes/${typeId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error ${response.status}: ${response.statusText}`);
                }
                return response.json();
            })
            .then(themes => {
                // Limpiar select
                conceptThemeSelect.innerHTML = '<option value="">Todos los temas</option>';
                
                // Agregar temas
                if (themes && Array.isArray(themes) && themes.length > 0) {
                    themes.forEach(theme => {
                        const option = document.createElement('option');
                        option.value = theme.id;
                        option.textContent = theme.nombre;
                        
                        // Mantener selección si existe
                        if (selectedThemeId && selectedThemeId === String(theme.id)) {
                            option.selected = true;
                        }
                        
                        conceptThemeSelect.appendChild(option);
                    });
                    
                    // Habilitar select
                    conceptThemeSelect.disabled = false;
                    conceptThemeSelect.classList.remove('text-muted');
                } else {
                    conceptThemeSelect.innerHTML = `<option value="">${emptyText}</option>`;
                    conceptThemeSelect.disabled = true;
                    conceptThemeSelect.classList.add('text-muted');
                }
            })
            .catch(error => {
                console.error('Error al cargar temas:', error);
                conceptThemeSelect.innerHTML = '<option value="">Error al cargar temas</option>';
                conceptThemeSelect.disabled = true;
                conceptThemeSelect.classList.add('text-muted');
                
                // Mostrar mensaje de error al usuario
                showErrorAlert('Error al cargar los temas. Por favor, recargue la página.');
            });
    }
    
    // Función para mostrar alertas de error
    function showErrorAlert(message) {
        removeExistingAlerts();
        
        const errorAlert = document.createElement('div');
        errorAlert.className = 'alert alert-warning alert-dismissible fade show mt-2';
        errorAlert.innerHTML = `
            <i class="fas fa-exclamation-triangle me-2"></i>
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        conceptThemeSelect.parentNode.appendChild(errorAlert);
        
        // Auto-ocultar después de 5 segundos
        setTimeout(() => {
            if (errorAlert.parentNode) {
                errorAlert.remove();
            }
        }, 5000);
    }
    
    // Event listener para cambio de tipo
    conceptTypeSelect.addEventListener('change', function() {
        const typeId = this.value;
        
        if (typeId) {
            loadThemes(typeId);
        } else {
            resetThemeSelect();
        }
    });
    
    // Cargar temas si ya hay un tipo seleccionado (para mantener estado en recarga)
    if (conceptTypeSelect.value) {
        loadThemes(conceptTypeSelect.value);
    } else {
        // Si no hay tipo seleccionado, resetear el tema
        resetThemeSelect();
    }
    
    // Función para aplicar estilos de focus
    function applyFocusStyles(element) {
        element.style.borderColor = '#43883d';
        element.style.boxShadow = '0 0 0 0.2rem rgba(67, 136, 61, 0.25)';
    }
    
    // Función para remover estilos de focus
    function removeFocusStyles(element) {
        element.style.borderColor = '';
        element.style.boxShadow = '';
    }
    
    // Mejorar experiencia visual
    conceptTypeSelect.addEventListener('focus', function() {
        applyFocusStyles(this);
    });
    
    conceptTypeSelect.addEventListener('blur', function() {
        removeFocusStyles(this);
    });
    
    conceptThemeSelect.addEventListener('focus', function() {
        if (!this.disabled) {
            applyFocusStyles(this);
        }
    });
    
    conceptThemeSelect.addEventListener('blur', function() {
        removeFocusStyles(this);
    });

    // Función global para asignar tipo desde tema (mantener compatibilidad)
    window.asignarTipoDesdeTema = function() {
        const selectedOption = conceptThemeSelect.options[conceptThemeSelect.selectedIndex];
        if (selectedOption && selectedOption.dataset.typeId) {
            conceptTypeSelect.value = selectedOption.dataset.typeId;
        }
    };
});