document.addEventListener('DOMContentLoaded', function() {
    const documentTypeSelect = document.getElementById('document_type_id');
    const documentThemeSelect = document.getElementById('document_theme_id');
    
    // Validar que los elementos existan
    if (!documentTypeSelect || !documentThemeSelect) {
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
        documentThemeSelect.innerHTML = `<option value="">${selectTypeText}</option>`;
        documentThemeSelect.disabled = true;
        documentThemeSelect.classList.add('text-muted');
    }
    
    // Función para remover alertas existentes
    function removeExistingAlerts() {
        const existingAlert = documentThemeSelect.parentNode.querySelector('.alert');
        if (existingAlert) {
            existingAlert.remove();
        }
    }
    
    // Función para cargar temas
    function loadThemes(typeId) {
        // Remover alertas previas
        removeExistingAlerts();
        
        // Mostrar estado de carga
        documentThemeSelect.innerHTML = `<option value="">${loadingText}</option>`;
        documentThemeSelect.disabled = true;
        documentThemeSelect.classList.add('text-muted');
        
        // Hacer petición AJAX
        fetch(`/documents/themes/${typeId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`Error ${response.status}: ${response.statusText}`);
                }
                return response.json();
            })
            .then(themes => {
                // Limpiar select
                documentThemeSelect.innerHTML = '<option value="">Todos los temas</option>';
                
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
                        
                        documentThemeSelect.appendChild(option);
                    });
                    
                    // Habilitar select
                    documentThemeSelect.disabled = false;
                    documentThemeSelect.classList.remove('text-muted');
                } else {
                    documentThemeSelect.innerHTML = `<option value="">${emptyText}</option>`;
                    documentThemeSelect.disabled = true;
                }
            })
            .catch(error => {
                console.error('Error al cargar temas:', error);
                documentThemeSelect.innerHTML = '<option value="">Error al cargar temas</option>';
                documentThemeSelect.disabled = true;
                
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
        documentThemeSelect.parentNode.appendChild(errorAlert);
        
        // Auto-ocultar después de 5 segundos
        setTimeout(() => {
            if (errorAlert.parentNode) {
                errorAlert.remove();
            }
        }, 5000);
    }
    
    // Event listener para cambio de tipo
    documentTypeSelect.addEventListener('change', function() {
        const typeId = this.value;
        
        if (typeId) {
            loadThemes(typeId);
        } else {
            resetThemeSelect();
        }
    });
    
    // Cargar temas si ya hay un tipo seleccionado (para mantener estado en recarga)
    if (documentTypeSelect.value) {
        loadThemes(documentTypeSelect.value);
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
    documentTypeSelect.addEventListener('focus', function() {
        applyFocusStyles(this);
    });
    
    documentTypeSelect.addEventListener('blur', function() {
        removeFocusStyles(this);
    });
    
    documentThemeSelect.addEventListener('focus', function() {
        if (!this.disabled) {
            applyFocusStyles(this);
        }
    });
    
    documentThemeSelect.addEventListener('blur', function() {
        removeFocusStyles(this);
    });
});