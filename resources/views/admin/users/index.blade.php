@extends('layouts.app')

@section('title', 'Gestión de Usuarios')

@section('content')
<style>
    /* Colores institucionales */
    :root {
        --color-primary: #43883d;
        --color-primary-dark: #285F19;
        --color-primary-light: #93C01F;
        --color-secondary: #f8dc0b;
        --color-light-bg: #EAECB1;
    }

    /* Container principal */
    .users-page {
        padding: 1.5rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    /* Header */
    .page-header {
        background: white;
        border-radius: 8px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        border-left: 4px solid var(--color-primary);
    }

    .dark .page-header {
        background: #1f2937;
        box-shadow: 0 1px 3px rgba(0,0,0,0.3);
    }

    .page-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #1f2937;
        margin: 0 0 0.25rem 0;
    }

    .dark .page-title {
        color: #f3f4f6;
    }

    .page-subtitle {
        color: #6b7280;
        font-size: 0.875rem;
        margin: 0;
    }

    .dark .page-subtitle {
        color: #9ca3af;
    }

    /* Stats Grid */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .stat-card {
        background: white;
        border-radius: 8px;
        padding: 1.25rem;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        position: relative;
        overflow: hidden;
        transition: transform 0.2s;
    }

    .dark .stat-card {
        background: #1f2937;
        box-shadow: 0 1px 3px rgba(0,0,0,0.3);
    }

    .stat-card:hover {
        transform: translateY(-2px);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
    }

    .stat-card.blue::before { background: #3b82f6; }
    .stat-card.green::before { background: var(--color-primary); }
    .stat-card.purple::before { background: #8b5cf6; }
    .stat-card.orange::before { background: #f59e0b; }

    .stat-content {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        flex-shrink: 0;
    }

    .stat-card.blue .stat-icon { background: rgba(59, 130, 246, 0.1); color: #3b82f6; }
    .stat-card.green .stat-icon { background: rgba(67, 136, 61, 0.1); color: var(--color-primary); }
    .stat-card.purple .stat-icon { background: rgba(139, 92, 246, 0.1); color: #8b5cf6; }
    .stat-card.orange .stat-icon { background: rgba(245, 158, 11, 0.1); color: #f59e0b; }

    .stat-info h3 {
        font-size: 1.75rem;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
        line-height: 1;
    }

    .dark .stat-info h3 {
        color: #f3f4f6;
    }

    .stat-info p {
        font-size: 0.813rem;
        color: #6b7280;
        margin: 0.25rem 0 0 0;
    }

    .dark .stat-info p {
        color: #9ca3af;
    }

    /* Users Card */
    .users-card {
        background: white;
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        overflow: hidden;
    }

    .dark .users-card {
        background: #1f2937;
        box-shadow: 0 1px 3px rgba(0,0,0,0.3);
    }

    .card-header {
        background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
        padding: 1rem 1.5rem;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-header h2 {
        margin: 0;
        font-size: 1.125rem;
        font-weight: 600;
    }

    /* User List */
    .user-row {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        gap: 1.5rem;
        transition: background 0.15s;
    }

    .dark .user-row {
        border-bottom-color: #374151;
    }

    .user-row:hover {
        background: #f9fafb;
    }

    .dark .user-row:hover {
        background: #111827;
    }

    .user-row:last-child {
        border-bottom: none;
    }

    /* Columnas */
    .col-user {
        flex: 2;
        min-width: 0;
    }

    .col-email {
        flex: 2;
        min-width: 0;
    }

    .col-role {
        flex: 1;
        min-width: 100px;
    }

    .col-modules {
        flex: 2;
        min-width: 0;
    }

    .col-permissions {
        flex: 1.5;
        min-width: 0;
    }

    .col-actions {
        flex: 0 0 140px;
        text-align: right;
    }

    /* User Info */
    .user-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 600;
        font-size: 1rem;
        flex-shrink: 0;
    }

    .user-name {
        font-weight: 600;
        color: #1f2937;
        font-size: 0.938rem;
        margin: 0;
    }

    .dark .user-name {
        color: #f3f4f6;
    }

    .user-id {
        font-size: 0.75rem;
        color: #9ca3af;
        margin: 0.125rem 0 0 0;
    }

    .user-email {
        font-size: 0.875rem;
        color: #6b7280;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .dark .user-email {
        color: #9ca3af;
    }

    /* Role Badge */
    .role-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.375rem;
        padding: 0.375rem 0.75rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 600;
        white-space: nowrap;
    }

    .role-badge.admin {
        background: var(--color-primary);
        color: white;
    }

    .role-badge.user {
        background: #3b82f6;
        color: white;
    }

    /* Modules */
    .modules-list {
        display: flex;
        flex-wrap: wrap;
        gap: 0.375rem;
    }

    .module-badge {
        padding: 0.25rem 0.625rem;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 500;
        white-space: nowrap;
    }

    .module-badge.all {
        background: #10b981;
        color: white;
    }

    .module-badge.regular {
        background: var(--color-light-bg);
        color: #1f2937;
        border: 1px solid #d1d5db;
    }

    .dark .module-badge.regular {
        background: #374151;
        color: #f3f4f6;
        border-color: #4b5563;
    }

    .module-badge.none {
        background: #ef4444;
        color: white;
    }

    /* Permissions */
    .permissions-list {
        font-size: 0.813rem;
        color: #6b7280;
        line-height: 1.5;
    }

    .dark .permissions-list {
        color: #9ca3af;
    }

    .permissions-list i {
        width: 14px;
        text-align: center;
        margin-right: 0.25rem;
    }

    /* Actions */
    .action-btns {
        display: flex;
        gap: 0.375rem;
        justify-content: flex-end;
    }

    .btn-icon {
        width: 32px;
        height: 32px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1.5px solid;
        background: transparent;
        cursor: pointer;
        transition: all 0.2s;
        font-size: 0.875rem;
    }

    .btn-icon:hover {
        transform: translateY(-1px);
    }

    .btn-icon.edit {
        border-color: #3b82f6;
        color: #3b82f6;
    }

    .btn-icon.edit:hover {
        background: #3b82f6;
        color: white;
    }

    .btn-icon.modules {
        border-color: #8b5cf6;
        color: #8b5cf6;
    }

    .btn-icon.modules:hover {
        background: #8b5cf6;
        color: white;
    }

    .btn-icon.delete {
        border-color: #ef4444;
        color: #ef4444;
    }

    .btn-icon.delete:hover {
        background: #ef4444;
        color: white;
    }

    .btn-icon:disabled {
        border-color: #d1d5db;
        color: #d1d5db;
        cursor: not-allowed;
    }

    .dark .btn-icon:disabled {
        border-color: #4b5563;
        color: #6b7280;
    }

    /* Primary Button */
    .btn-primary-custom {
        background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
        border: none;
        color: white;
        padding: 0.625rem 1.5rem;
        border-radius: 6px;
        font-weight: 600;
        font-size: 0.875rem;
        transition: all 0.2s;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
    }

    .btn-primary-custom:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 8px rgba(67, 136, 61, 0.25);
        color: white;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 3rem 1.5rem;
    }

    .empty-state i {
        font-size: 3.5rem;
        color: #d1d5db;
        margin-bottom: 1rem;
    }

    .dark .empty-state i {
        color: #4b5563;
    }

    .empty-state h4 {
        color: #6b7280;
        font-size: 1.125rem;
        margin-bottom: 0.5rem;
    }

    .dark .empty-state h4 {
        color: #9ca3af;
    }

    .empty-state p {
        color: #9ca3af;
        font-size: 0.875rem;
    }

    .dark .empty-state p {
        color: #6b7280;
    }

    /* Pagination */
    .pagination-footer {
        padding: 1rem 1.5rem;
        border-top: 1px solid #e5e7eb;
        background: #f9fafb;
    }

    .dark .pagination-footer {
        background: #111827;
        border-top-color: #374151;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .user-row {
            flex-wrap: wrap;
        }

        .col-user, .col-email, .col-role,
        .col-modules, .col-permissions {
            flex: 1 1 100%;
        }

        .col-actions {
            flex: 1 1 100%;
            text-align: left;
        }
    }
</style>

<div class="users-page">
    <!-- Header -->
    <div class="page-header">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h1 class="page-title">
                    <i class="fas fa-users-cog me-2"></i>
                    Gestión de Usuarios
                </h1>
                <p class="page-subtitle">Administra usuarios, roles y permisos del sistema</p>
            </div>
            <a href="{{ route('users.create') }}" class="btn btn-primary-custom">
                <i class="fas fa-user-plus"></i>
                <span>Nuevo Usuario</span>
            </a>
        </div>
    </div>

    <!-- Stats -->
    <div class="stats-row">
        <div class="stat-card blue">
            <div class="stat-content">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $users->total() }}</h3>
                    <p>Total de Usuarios</p>
                </div>
            </div>
        </div>

        <div class="stat-card green">
            <div class="stat-content">
                <div class="stat-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $users->where('is_admin', true)->count() }}</h3>
                    <p>Administradores</p>
                </div>
            </div>
        </div>

        <div class="stat-card purple">
            <div class="stat-content">
                <div class="stat-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $users->where('is_admin', false)->count() }}</h3>
                    <p>Usuarios Regulares</p>
                </div>
            </div>
        </div>

        <div class="stat-card orange">
            <div class="stat-content">
                <div class="stat-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <div class="stat-info">
                    <h3>{{ $users->count() }}</h3>
                    <p>En esta Página</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Alerts -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <strong>¡Éxito!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>
            <strong>Error:</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Users Card -->
    <div class="users-card">
        <div class="card-header">
            <h2>
                <i class="fas fa-list me-2"></i>
                Lista de Usuarios
            </h2>
            <span class="badge bg-light text-dark">{{ $users->total() }}</span>
        </div>

        @forelse($users as $user)
            <div class="user-row">
                <!-- Usuario -->
                <div class="col-user">
                    <div class="user-info">
                        <div class="user-avatar">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div>
                            <p class="user-name">{{ $user->name }}</p>
                            <p class="user-id">ID: #{{ $user->id }}</p>
                        </div>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-email">
                    <div class="user-email">
                        <i class="fas fa-envelope"></i>
                        <span>{{ $user->email }}</span>
                    </div>
                </div>

                <!-- Rol -->
                <div class="col-role">
                    @if($user->is_admin)
                        <span class="role-badge admin">
                            <i class="fas fa-crown"></i>
                            <span>Admin</span>
                        </span>
                    @else
                        <span class="role-badge user">
                            <i class="fas fa-user"></i>
                            <span>Usuario</span>
                        </span>
                    @endif
                </div>

                <!-- Módulos -->
                <div class="col-modules">
                    <div class="modules-list">
                        @if($user->is_admin)
                            <span class="module-badge all">
                                <i class="fas fa-check-circle me-1"></i>Todos
                            </span>
                        @else
                            @if($user->modules->count() > 0)
                                @foreach($user->modules as $module)
                                    <span class="module-badge regular">{{ $module->name }}</span>
                                @endforeach
                            @else
                                <span class="module-badge none">
                                    <i class="fas fa-times-circle me-1"></i>Ninguno
                                </span>
                            @endif
                        @endif
                    </div>
                </div>

                <!-- Permisos -->
                <div class="col-permissions">
                    @if(!$user->is_admin)
                        <div class="permissions-list">
                            @php
                                $totalPermissions = $user->categoryPermissions->count() + $user->conceptTypes->count();
                            @endphp
                            @if($totalPermissions > 0)
                                <div><i class="fas fa-folder"></i>{{ $user->categoryPermissions->count() }} categorías</div>
                                <div><i class="fas fa-file-alt"></i>{{ $user->conceptTypes->count() }} tipos</div>
                            @else
                                <small>Sin permisos</small>
                            @endif
                        </div>
                    @else
                        <small class="text-muted"><i class="fas fa-infinity me-1"></i>Ilimitado</small>
                    @endif
                </div>

                <!-- Acciones -->
                <div class="col-actions">
                    <div class="action-btns">
                        <a href="{{ route('users.edit', $user) }}"
                           class="btn-icon edit"
                           title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('users.modules', $user) }}"
                           class="btn-icon modules"
                           title="Módulos">
                            <i class="fas fa-th-large"></i>
                        </a>
                        @if($user->id !== auth()->id())
                            <form action="{{ route('users.destroy', $user) }}"
                                  method="POST"
                                  style="display: inline;"
                                  onsubmit="return confirm('¿Eliminar a {{ $user->name }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn-icon delete"
                                        title="Eliminar">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @else
                            <button type="button"
                                    class="btn-icon"
                                    disabled
                                    title="No puedes eliminarte">
                                <i class="fas fa-lock"></i>
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="empty-state">
                <i class="fas fa-users"></i>
                <h4>No hay usuarios registrados</h4>
                <p>Comienza creando tu primer usuario</p>
            </div>
        @endforelse

        <!-- Pagination -->
        @if($users->hasPages())
            <div class="pagination-footer">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                    <small class="text-muted">
                        Mostrando <strong>{{ $users->firstItem() }}</strong> a
                        <strong>{{ $users->lastItem() }}</strong> de
                        <strong>{{ $users->total() }}</strong> usuarios
                    </small>
                    <div>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
