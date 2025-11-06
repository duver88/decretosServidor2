@extends('layouts.app')

@section('content')
<div class="container-fluid px-3 px-md-4 py-4" style="max-width: 1400px;">
    <!-- Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">
                <div>
                    <h1 class="h3 fw-bold text-success-dark mb-1">
                        <i class="fas fa-file-circle-check me-2"></i>Gestión de Circulares
                    </h1>
                    <p class="text-muted mb-0">Administra las circulares del sistema</p>
                </div>
                @php
                    $canCreate = auth()->user()->is_admin;
                    if (!$canCreate) {
                        $module = auth()->user()->modules()->where('slug', 'circulares')->first();
                        $canCreate = $module && $module->pivot->can_create;
                    }
                @endphp
                @if($canCreate)
                <a href="{{ auth()->user()->is_admin ? route('circulares.admin.create') : route('user.circulares.create') }}"
                   class="btn btn-success btn-lg shadow-sm">
                    <i class="fas fa-plus me-2"></i>Nueva Circular
                </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
    <div class="row mb-4">
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show shadow-sm border-0 border-start border-success border-4" role="alert">
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle fs-4 me-3"></i>
                    <div>
                        <strong>¡Éxito!</strong>
                        <div class="small">{{ session('success') }}</div>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        </div>
    </div>
    @endif

    <!-- Circulares Grid -->
    @if($circulares->count() > 0)
    <div class="row g-3 g-md-4">
        @foreach($circulares as $circular)
        @php
            $extension = $circular->archivo ? strtolower(pathinfo($circular->archivo, PATHINFO_EXTENSION)) : '';

            // Iconos y colores según extensión
            if ($extension === 'pdf') {
                $iconClass = 'text-danger';
                $bgClass = 'bg-danger';
                $icon = 'fa-file-pdf';
            } elseif (in_array($extension, ['doc', 'docx'])) {
                $iconClass = 'text-primary';
                $bgClass = 'bg-primary';
                $icon = 'fa-file-word';
            } elseif (in_array($extension, ['xls', 'xlsx'])) {
                $iconClass = 'text-success';
                $bgClass = 'bg-success';
                $icon = 'fa-file-excel';
            } else {
                $iconClass = 'text-secondary';
                $bgClass = 'bg-secondary';
                $icon = 'fa-file';
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
            <div class="card h-100 border border-2 border-light shadow-sm card-hover rounded-3">
                <div class="card-body p-4">
                    <!-- Icono y Título -->
                    <div class="d-flex align-items-start mb-3">
                        <div class="flex-shrink-0 me-3">
                            <div class="d-flex align-items-center justify-content-center rounded {{ $bgClass }} bg-opacity-10"
                                 style="width: 48px; height: 48px;">
                                <i class="fas {{ $icon }} {{ $iconClass }} fs-4"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 min-w-0">
                            <h5 class="card-title fw-bold text-success-dark mb-2 lh-sm">
                                {{ Str::limit($circular->nombre, 60) }}
                            </h5>
                            <p class="card-text text-muted small mb-0">
                                {{ Str::limit($circular->descripcion, 80) }}
                            </p>
                        </div>
                    </div>

                    <!-- Metadata -->
                    <div class="d-flex flex-wrap gap-3 mb-3 small text-muted">
                        <div class="d-flex align-items-center">
                            <i class="far fa-calendar-alt me-2 text-success"></i>
                            <span>{{ $circular->fecha->format('d/m/Y') }}</span>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="far fa-clock me-2 text-success"></i>
                            <span>{{ $circular->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <!-- Separador -->
                    <hr class="my-3">

                    <!-- Botones de acción -->
                    <div class="d-grid gap-2">
                        @if($circular->archivo)
                        <a href="{{ asset('storage/' . $circular->archivo) }}"
                           target="_blank"
                           class="btn btn-success d-flex align-items-center justify-content-center">
                            <i class="fas {{ $icon }} me-2"></i>
                            <span>Ver Archivo</span>
                        </a>
                        @endif

                        <div class="btn-group" role="group">
                            @if($canEdit)
                            <a href="{{ auth()->user()->is_admin ? route('circulares.admin.edit', $circular->id) : route('user.circulares.edit', $circular->id) }}"
                               class="btn btn-outline-primary">
                                <i class="fas fa-edit me-1"></i>
                                <span class="d-none d-sm-inline">Editar</span>
                            </a>
                            @endif

                            @if($canDelete)
                            <button type="button"
                                    class="btn btn-outline-danger"
                                    onclick="if(confirm('¿Eliminar esta circular?')) document.getElementById('delete-form-{{ $circular->id }}').submit();">
                                <i class="fas fa-trash-alt me-1"></i>
                                <span class="d-none d-sm-inline">Eliminar</span>
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
        </div>
        @endforeach
    </div>

    <!-- Paginación -->
    @if($circulares->hasPages())
    <div class="row mt-4">
        <div class="col-12">
            <nav aria-label="Paginación de circulares">
                {{ $circulares->links() }}
            </nav>
        </div>
    </div>
    @endif

    @else
    <!-- Estado vacío -->
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm">
                <div class="card-body text-center py-5">
                    <div class="mb-4">
                        <i class="fas fa-inbox display-1 text-muted opacity-25"></i>
                    </div>
                    <h4 class="fw-bold text-success-dark mb-2">No hay circulares registradas</h4>
                    <p class="text-muted mb-4">Comienza creando tu primera circular</p>
                    @php
                        $canCreate = auth()->user()->is_admin;
                        if (!$canCreate) {
                            $module = auth()->user()->modules()->where('slug', 'circulares')->first();
                            $canCreate = $module && $module->pivot->can_create;
                        }
                    @endphp
                    @if($canCreate)
                    <a href="{{ auth()->user()->is_admin ? route('circulares.admin.create') : route('user.circulares.create') }}"
                       class="btn btn-success btn-lg px-5 shadow-sm">
                        <i class="fas fa-plus me-2"></i>Crear Primera Circular
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<style>
/* Variables de colores institucionales */
:root {
    --color-success: #43883d;
    --color-success-dark: #285F19;
    --color-success-hover: #2d5f2a;
}

/* Utilidades de texto */
.text-success-dark {
    color: var(--color-success-dark) !important;
}

/* Botones con colores institucionales */
.btn-success {
    background-color: var(--color-success);
    border-color: var(--color-success);
    font-weight: 500;
}

.btn-success:hover {
    background-color: var(--color-success-hover);
    border-color: var(--color-success-hover);
    transform: translateY(-1px);
    box-shadow: 0 4px 12px rgba(67, 136, 61, 0.3) !important;
}

.btn-success:active {
    background-color: var(--color-success-dark);
    border-color: var(--color-success-dark);
}

/* Card hover effect */
.card-hover {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.card-hover:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12) !important;
}

/* Botones outline mejorados */
.btn-outline-primary,
.btn-outline-danger {
    font-weight: 500;
}

.btn-outline-primary {
    border-width: 2px;
}

.btn-outline-danger {
    border-width: 2px;
}

/* Alert mejorado */
.alert-success {
    background-color: rgba(67, 136, 61, 0.1);
    color: var(--color-success-dark);
}

/* Paginación con colores institucionales */
.pagination .page-link {
    color: var(--color-success);
    font-weight: 500;
}

.pagination .page-item.active .page-link {
    background-color: var(--color-success);
    border-color: var(--color-success);
}

.pagination .page-link:hover {
    color: var(--color-success-dark);
    background-color: rgba(67, 136, 61, 0.1);
}

/* Modo oscuro */
.dark .card {
    background-color: #1f2937;
    border-color: #374151 !important;
}

.dark .text-success-dark {
    color: #93C01F !important;
}

.dark .card-title {
    color: #93C01F !important;
}

.dark .text-muted {
    color: #9ca3af !important;
}

.dark hr {
    border-color: #374151 !important;
}

.dark .btn-outline-primary {
    border-color: #60a5fa;
    color: #60a5fa;
}

.dark .btn-outline-primary:hover {
    background-color: #3b82f6;
    border-color: #3b82f6;
    color: white;
}

.dark .btn-outline-danger {
    border-color: #f87171;
    color: #f87171;
}

.dark .btn-outline-danger:hover {
    background-color: #ef4444;
    border-color: #ef4444;
    color: white;
}

/* Responsive adjustments */
@media (max-width: 575.98px) {
    .btn-group {
        display: flex;
        width: 100%;
    }

    .btn-group .btn {
        flex: 1;
    }
}

@media (min-width: 576px) and (max-width: 991.98px) {
    .col-sm-6:nth-child(2n+1) .card-hover:hover {
        transform: translateY(-4px) translateX(2px);
    }

    .col-sm-6:nth-child(2n) .card-hover:hover {
        transform: translateY(-4px) translateX(-2px);
    }
}

/* Animación de entrada */
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

.card {
    animation: fadeInUp 0.4s ease-out;
}

/* Scrollbar personalizado (opcional) */
::-webkit-scrollbar {
    width: 10px;
    height: 10px;
}

::-webkit-scrollbar-track {
    background: #f1f1f1;
}

::-webkit-scrollbar-thumb {
    background: var(--color-success);
    border-radius: 5px;
}

::-webkit-scrollbar-thumb:hover {
    background: var(--color-success-dark);
}
</style>
@endsection
