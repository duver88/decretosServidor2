    document.addEventListener('DOMContentLoaded', () => {
        const typeSel  = document.getElementById('concept_type_id');
        const themeSel = document.getElementById('concept_theme_id');

        async function loadThemes(typeId){
            themeSel.innerHTML = '<option value="">Cargando temas...</option>';
            try {
                const r = await fetch(`/api/concept-themes-by-type/${typeId}`);
                const list = await r.json();
                themeSel.innerHTML = '<option value="">Todos los temas</option>';
                list.forEach(t => {
                    const opt = new Option(t.nombre, t.id, false, t.id == '{{ request('concept_theme_id') }}');
                    themeSel.add(opt);
                });
            } catch (error) {
                themeSel.innerHTML = '<option value="">Error al cargar temas</option>';
            }
        }

        if(typeSel.value) loadThemes(typeSel.value);
        typeSel.addEventListener('change', e => {
            if(e.target.value){ 
                loadThemes(e.target.value); 
            } else { 
                themeSel.innerHTML = '<option value="">Todos los temas</option>'; 
            }
        });
    });

        function asignarTipoDesdeTema() {
        const temaSelect = document.getElementById('concept_theme_id');
        const tipoSelect = document.getElementById('concept_type_id');
        const selectedOption = temaSelect.options[temaSelect.selectedIndex];
        const typeId = selectedOption.getAttribute('data-type-id');
        if (typeId) {
            tipoSelect.value = typeId;
        }
    }