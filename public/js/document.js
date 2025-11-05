 document.addEventListener('DOMContentLoaded', function() {
            // Mejorar la experiencia con el filtro de mes
            const añoSelect = document.getElementById('año');
            const mesSelect = document.getElementById('mes');
            
            // Función para validar la selección de mes
            function validarMes() {
                if (mesSelect.value && !añoSelect.value) {
                    alert('Para filtrar por mes, primero debe seleccionar un año.');
                    mesSelect.value = '';
                }
            }
            
            // Agregar event listener al select de mes
            if (mesSelect) {
                mesSelect.addEventListener('change', validarMes);
            }
            
            // Agregar indicador visual cuando se selecciona año
            if (añoSelect) {
                añoSelect.addEventListener('change', function() {
                    if (this.value) {
                        mesSelect.style.border = '2px solid #43883d';
                        mesSelect.removeAttribute('disabled');
                    } else {
                        mesSelect.style.border = '';
                        mesSelect.value = '';
                    }
                });
            }
            
            // Preservar estado de filtros en chips
            const chips = document.querySelectorAll('.chip');
            chips.forEach(chip => {
                chip.addEventListener('click', function(e) {
                    // Pequeña animación visual
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 100);
                });
            });
        });