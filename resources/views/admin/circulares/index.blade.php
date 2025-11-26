@extends('layouts.app')

@section('content')
<div class="container-fluid px-3 px-md-4 py-4" style="max-width: 1400px;">

    <!-- Header Moderno -->
    <div class="header-section mb-4">
        <div class="row align-items-center">
            <div class="col-md-8">
                <nav aria-label="breadcrumb" class="mb-2">
                    <ol class="breadcrumb breadcrumb-modern">
                        <li class="breadcrumb-item">
                            <a href="{{ auth()->user()->is_admin ? route('dashboard') : route('user.dashboard') }}">
                                <i class="fas fa-home"></i> Inicio
                            </a>
                        </li>
                        <li class="breadcrumb-item active">Circulares</li>
                    </ol>
                </nav>
                <h1 class="page-title">
                    <i class="fas fa-file-circle-check me-2"></i>
                    Gestión de Circulares
                </h1>
                <p class="page-subtitle">Administra y visualiza todas las circulares del sistema</p>
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                @php
                    $canCreate = auth()->user()->is_admin;
                    if (!$canCreate) {
                        $module = auth()->user()->modules()->where('slug', 'circulares')->first();
                        $canCreate = $module && $module->pivot->can_create;
                    }
                @endphp
                @if($canCreate)
                <a href="{{ auth()->user()->is_admin ? route('circulares.admin.create') : route('user.circulares.create') }}"
                   class="btn btn-success-modern">
                    <i class="fas fa-plus-circle me-2"></i>Nueva Circular
                </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="alert alert-success-modern alert-dismissible fade show mb-4" role="alert">
        <div class="d-flex align-items-center">
            <div class="alert-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="flex-grow-1">
                <strong>¡Éxito!</strong>
                <p class="mb-0">{{ session('success') }}</p>
            </div>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Circulares Grid -->
    @if($circulares->count() > 0)
    <div class="row g-4">
        @foreach($circulares as $circular)
        @php
            $extension = $circular->archivo ? pathinfo($circular->archivo, PATHINFO_EXTENSION) : '';

            // Determinar el icono y color según la extensión
            if (in_array($extension, ['pdf'])) {
                $badgeClass = 'badge-pdf';
                $iconClass = 'text-danger';
                $icon = 'fa-file-pdf';
            } elseif (in_array($extension, ['doc', 'docx'])) {
                $badgeClass = 'badge-word';
                $iconClass = 'text-primary';
                $icon = 'fa-file-word';
            } elseif (in_array($extension, ['xls', 'xlsx'])) {
                $badgeClass = 'badge-excel';
                $iconClass = 'text-success';
                $icon = 'fa-file-excel';
            } else {
                $badgeClass = 'badge-default';
                $iconClass = 'text-secondary';
                $icon = 'fa-file-alt';
            }

            $canEdit = auth()->user()->is_admin;
            $canDelete = auth()->user()->is_admin;
            if (!auth()->user()->is_admin) {
                $module = auth()->user()->modules()->where('slug', 'circulares')->first();
                $canEdit = $module && $module->pivot->can_edit;
                $canDelete = $module && $module->pivot->can_delete;
            }
        @endphp

        <div class="col-12 col-sm-6 col-lg-4">
            <div class="card-modern circular-card">
                <!-- Card Header con Badge -->
                <div class="card-header-modern">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge-modern {{ $badgeClass }}">
                            <i class="fas {{ $icon }} me-1"></i>
                            {{ strtoupper($extension ?: 'N/A') }}
                        </span>
                        <span class="card-id">#{{ $circular->id }}</span>
                    </div>
                </div>

                <!-- Card Body -->
                <div class="card-body-modern">
                    <!-- Título -->
                    <h5 class="circular-title">
                        {{ $circular->nombre }}
                    </h5>

                    <!-- Descripción -->
                    <p class="circular-description">
                        {{ Str::limit($circular->descripcion, 100) }}
                    </p>

                    <!-- Meta información -->
                    <div class="circular-meta">
                        <div class="meta-item">
                            <i class="far fa-calendar-alt"></i>
                            <span>{{ $circular->fecha->format('d/m/Y') }}</span>
                        </div>
                        <div class="meta-item">
                            <i class="far fa-clock"></i>
                            <span>{{ $circular->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <!-- Botones de acción -->
                    <div class="actions-container">
                        @if($circular->archivo)
                        <a href="{{ asset('storage/' . $circular->archivo) }}"
                           target="_blank"
                           class="btn-action btn-action-primary">
                            <i class="fas fa-eye"></i>
                            <span>Ver</span>
                        </a>
                        @endif

                        @if($canEdit)
                        <a href="{{ auth()->user()->is_admin ? route('circulares.admin.edit', $circular->id) : route('user.circulares.edit', $circular->id) }}"
                           class="btn-action btn-action-warning">
                            <i class="fas fa-edit"></i>
                            <span>Editar</span>
                        </a>
                        @endif

                        @if($canDelete)
                        <button type="button"
                                class="btn-action btn-action-danger"
                                onclick="confirmarEliminacion({{ $circular->id }}, '{{ addslashes($circular->nombre) }}')">
                            <i class="fas fa-trash-alt"></i>
                            <span>Eliminar</span>
                        </button>
                        <form id="delete-form-{{ $circular->id }}"
                              action="{{ auth()->user()->is_admin ? route('circulares.admin.destroy', $circular->id) : route('user.circulares.destroy', $circular->id) }}"
                              method="POST"
                              class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Paginación -->
    @if($circulares->hasPages())
    <div class="pagination-modern mt-5">
        {{ $circulares->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>
    @endif

    @else
    <!-- Estado vacío -->
    <div class="empty-state">
        <div class="empty-icon">
            <i class="fas fa-inbox"></i>
        </div>
        <h3 class="empty-title">No hay circulares registradas</h3>
        <p class="empty-text">Comienza creando tu primera circular para organizar tus documentos</p>
        @php
            $canCreate = auth()->user()->is_admin;
            if (!$canCreate) {
                $module = auth()->user()->modules()->where('slug', 'circulares')->first();
                $canCreate = $module && $module->pivot->can_create;
            }
        @endphp
        @if($canCreate)
        <a href="{{ auth()->user()->is_admin ? route('circulares.admin.create') : route('user.circulares.create') }}"
           class="btn btn-success-modern btn-lg">
            <i class="fas fa-plus-circle me-2"></i>Crear Primera Circular
        </a>
        @endif
    </div>
    @endif
</div>

<!-- Modal de confirmación -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-modern">
            <div class="modal-header-modern">
                <div class="modal-icon-warning">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <h5 class="modal-title">Confirmar Eliminación</h5>
                <button type="button" class="btn-close-modern" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body-modern">
                <p class="mb-3">¿Estás seguro de que deseas eliminar esta circular?</p>
                <div class="delete-item-preview">
                    <i class="fas fa-file-alt"></i>
                    <span id="deleteCircularName"></span>
                </div>
                <div class="alert-warning-modern mt-3">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <strong>Advertencia:</strong> Esta acción es permanente y no se puede deshacer.
                </div>
            </div>
            <div class="modal-footer-modern">
                <button type="button" class="btn btn-secondary-modern" data-bs-dismiss="modal">
                    Cancelar
                </button>
                <button type="button" class="btn btn-danger-modern" id="confirmDelete">
                    <i class="fas fa-trash-alt me-2"></i>Sí, Eliminar
                </button>
            </div>
        </div>
    </div>
</div>

<style>
/* Variables */
:root {
    --color-primary: #43883d;
    --color-primary-dark: #2d6a2f;
    --color-primary-light: #5ba055;
    --color-danger: #ef4444;
    --color-warning: #f59e0b;
    --color-info: #3b82f6;
    --color-success: #10b981;
    --shadow-sm: 0 1px 2px rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.07);
    --shadow-lg: 0 10px 15px rgba(0, 0, 0, 0.1);
    --shadow-xl: 0 20px 25px rgba(0, 0, 0, 0.15);
    --radius-sm: 8px;
    --radius-md: 12px;
    --radius-lg: 16px;
}

/* Header Section */
.header-section {
    margin-bottom: 2rem;
}

.breadcrumb-modern {
    background: none;
    padding: 0;
    margin: 0;
    font-size: 0.875rem;
}

.breadcrumb-modern .breadcrumb-item a {
    color: var(--color-primary);
    text-decoration: none;
    transition: color 0.2s;
}

.breadcrumb-modern .breadcrumb-item a:hover {
    color: var(--color-primary-dark);
}

.breadcrumb-modern .breadcrumb-item.active {
    color: #6b7280;
}

.breadcrumb-modern .breadcrumb-item + .breadcrumb-item::before {
    content: "›";
    color: #9ca3af;
}

.page-title {
    font-size: 2rem;
    font-weight: 700;
    color: #111827;
    margin: 0.5rem 0 0.25rem 0;
}

.page-subtitle {
    color: #6b7280;
    margin: 0;
    font-size: 1rem;
}

/* Botón principal */
.btn-success-modern {
    background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
    border: none;
    color: white;
    padding: 0.75rem 1.5rem;
    border-radius: var(--radius-md);
    font-weight: 600;
    box-shadow: var(--shadow-md);
    transition: all 0.3s ease;
}

.btn-success-modern:hover {
    transform: translateY(-2px);
    box-shadow: var(--shadow-lg);
    background: linear-gradient(135deg, var(--color-primary-light) 0%, var(--color-primary) 100%);
    color: white;
}

/* Alert moderno */
.alert-success-modern {
    background: linear-gradient(135deg, #ecfdf5 0%, #d1fae5 100%);
    border: none;
    border-left: 4px solid var(--color-success);
    border-radius: var(--radius-md);
    padding: 1rem;
}

.alert-success-modern .alert-icon {
    width: 40px;
    height: 40px;
    background: var(--color-success);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    margin-right: 1rem;
    font-size: 1.25rem;
}

/* Card Moderna */
.card-modern {
    background: white;
    border-radius: var(--radius-lg);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    border: 1px solid #e5e7eb;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    height: 100%;
    display: flex;
    flex-direction: column;
}

.card-modern:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl);
    border-color: var(--color-primary);
}

.card-header-modern {
    padding: 1rem 1.25rem;
    background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
    border-bottom: 1px solid #e5e7eb;
}

.card-id {
    font-size: 0.75rem;
    color: #9ca3af;
    font-weight: 600;
}

.badge-modern {
    display: inline-flex;
    align-items: center;
    padding: 0.375rem 0.75rem;
    border-radius: 6px;
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 0.05em;
}

.badge-pdf {
    background: #fee2e2;
    color: #dc2626;
}

.badge-word {
    background: #dbeafe;
    color: #2563eb;
}

.badge-excel {
    background: #d1fae5;
    color: #059669;
}

.badge-default {
    background: #f3f4f6;
    color: #6b7280;
}

.card-body-modern {
    padding: 1.25rem;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.circular-title {
    font-size: 1.125rem;
    font-weight: 700;
    color: #111827;
    margin-bottom: 0.75rem;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.circular-description {
    color: #6b7280;
    font-size: 0.875rem;
    margin-bottom: 1rem;
    line-height: 1.5;
    flex-grow: 1;
}

.circular-meta {
    display: flex;
    gap: 1rem;
    margin-bottom: 1rem;
    padding-top: 1rem;
    border-top: 1px solid #e5e7eb;
}

.meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #6b7280;
    font-size: 0.813rem;
}

.meta-item i {
    color: var(--color-primary);
}

/* Botones de acción */
.actions-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 0.5rem;
}

.btn-action {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 0.25rem;
    padding: 0.75rem 0.5rem;
    border-radius: var(--radius-sm);
    border: none;
    font-size: 0.813rem;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s ease;
    cursor: pointer;
}

.btn-action i {
    font-size: 1.125rem;
}

.btn-action span {
    font-size: 0.75rem;
}

.btn-action-primary {
    background: #dbeafe;
    color: #1e40af;
}

.btn-action-primary:hover {
    background: #3b82f6;
    color: white;
    transform: translateY(-2px);
}

.btn-action-warning {
    background: #fef3c7;
    color: #92400e;
}

.btn-action-warning:hover {
    background: #f59e0b;
    color: white;
    transform: translateY(-2px);
}

.btn-action-danger {
    background: #fee2e2;
    color: #991b1b;
}

.btn-action-danger:hover {
    background: #ef4444;
    color: white;
    transform: translateY(-2px);
}

/* Paginación moderna */
.pagination-modern {
    display: flex;
    justify-content: center;
}

.pagination-modern .pagination {
    display: flex;
    gap: 0.5rem;
    padding: 0;
    margin: 0;
    list-style: none;
}

.pagination-modern .page-item {
    margin: 0;
}

.pagination-modern .page-link {
    border: 1px solid #e5e7eb;
    border-radius: var(--radius-sm) !important;
    color: var(--color-primary);
    padding: 0.625rem 1rem;
    font-weight: 600;
    transition: all 0.2s;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 42px;
    background: white;
}

.pagination-modern .page-link:hover {
    background: var(--color-primary);
    border-color: var(--color-primary);
    color: white;
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.pagination-modern .page-item.active .page-link {
    background: var(--color-primary);
    border-color: var(--color-primary);
    color: white;
    box-shadow: var(--shadow-md);
}

.pagination-modern .page-item.disabled .page-link {
    opacity: 0.5;
    cursor: not-allowed;
    background: #f9fafb;
    color: #9ca3af;
    border-color: #e5e7eb;
}

.pagination-modern .page-item.disabled .page-link:hover {
    transform: none;
    box-shadow: none;
    background: #f9fafb;
    color: #9ca3af;
    border-color: #e5e7eb;
}

/* Estado vacío */
.empty-state {
    text-align: center;
    padding: 4rem 2rem;
}

.empty-icon {
    font-size: 5rem;
    color: #e5e7eb;
    margin-bottom: 1.5rem;
}

.empty-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #374151;
    margin-bottom: 0.5rem;
}

.empty-text {
    color: #6b7280;
    margin-bottom: 2rem;
}

/* Modal moderno */
.modal-modern {
    border: none;
    border-radius: var(--radius-lg);
    overflow: hidden;
}

.modal-header-modern {
    background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
    border: none;
    padding: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.modal-icon-warning {
    width: 50px;
    height: 50px;
    background: #f59e0b;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.modal-header-modern .modal-title {
    margin: 0;
    font-weight: 700;
    color: #78350f;
    flex-grow: 1;
}

.btn-close-modern {
    background: none;
    border: none;
    font-size: 1.5rem;
    color: #78350f;
    cursor: pointer;
    opacity: 0.5;
    transition: opacity 0.2s;
}

.btn-close-modern:hover {
    opacity: 1;
}

.modal-body-modern {
    padding: 1.5rem;
}

.delete-item-preview {
    background: #f3f4f6;
    padding: 1rem;
    border-radius: var(--radius-sm);
    margin: 1rem 0;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    color: #111827;
    font-weight: 600;
}

.delete-item-preview i {
    color: var(--color-danger);
    font-size: 1.25rem;
}

.alert-warning-modern {
    background: #fef3c7;
    padding: 0.75rem 1rem;
    border-radius: var(--radius-sm);
    border-left: 3px solid #f59e0b;
    color: #78350f;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    font-size: 0.875rem;
}

.modal-footer-modern {
    padding: 1rem 1.5rem;
    border-top: 1px solid #e5e7eb;
    display: flex;
    gap: 0.75rem;
    justify-content: flex-end;
}

.btn-secondary-modern {
    background: #f3f4f6;
    border: none;
    color: #374151;
    padding: 0.625rem 1.25rem;
    border-radius: var(--radius-sm);
    font-weight: 600;
    transition: all 0.2s;
}

.btn-secondary-modern:hover {
    background: #e5e7eb;
    color: #374151;
}

.btn-danger-modern {
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    border: none;
    color: white;
    padding: 0.625rem 1.25rem;
    border-radius: var(--radius-sm);
    font-weight: 600;
    transition: all 0.2s;
}

.btn-danger-modern:hover {
    background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
    color: white;
}

/* Responsive */
@media (max-width: 768px) {
    .page-title {
        font-size: 1.5rem;
    }

    .actions-container {
        grid-template-columns: 1fr;
    }

    .btn-action {
        flex-direction: row;
        gap: 0.5rem;
    }

    .btn-action span {
        font-size: 0.875rem;
    }
}

/* Animaciones */
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.card-modern {
    animation: fadeInUp 0.5s ease-out;
}

.card-modern:nth-child(1) { animation-delay: 0.1s; }
.card-modern:nth-child(2) { animation-delay: 0.2s; }
.card-modern:nth-child(3) { animation-delay: 0.3s; }
</style>

<script>
let deleteFormId = null;

function confirmarEliminacion(circularId, nombre) {
    event.preventDefault();
    event.stopPropagation();
    deleteFormId = circularId;
    document.getElementById('deleteCircularName').textContent = nombre;
    const modal = new bootstrap.Modal(document.getElementById('deleteModal'), {
        backdrop: 'static',
        keyboard: false
    });
    modal.show();
}

document.addEventListener('DOMContentLoaded', function() {
    // Asegurarse de que el modal esté oculto al cargar
    const modalElement = document.getElementById('deleteModal');
    if (modalElement) {
        modalElement.classList.remove('show');
        modalElement.style.display = 'none';
        modalElement.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('modal-open');
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) {
            backdrop.remove();
        }
    }

    // Event listener para el botón de confirmar eliminación
    const confirmBtn = document.getElementById('confirmDelete');
    if (confirmBtn) {
        confirmBtn.addEventListener('click', function() {
            if (deleteFormId) {
                document.getElementById('delete-form-' + deleteFormId).submit();
            }
        });
    }
});
</script>
@endsection
