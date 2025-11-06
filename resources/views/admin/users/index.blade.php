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

    .users-container {
        padding: 2rem;
        background-color: #f8f9fa;
        min-height: 100vh;
    }

    /* Header Card */
    .header-card {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        border-left: 5px solid var(--color-primary);
    }

    .header-title {
        font-size: 1.75rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
    }

    .header-subtitle {
        color: #7f8c8d;
        font-size: 0.95rem;
    }

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    .stat-box {
        background: white;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .stat-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 4px 16px rgba(0,0,0,0.12);
    }

    .stat-box::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
    }

    .stat-box.blue::before { background: linear-gradient(90deg, #3498db, #2980b9); }
    .stat-box.green::before { background: linear-gradient(90deg, var(--color-primary), var(--color-primary-dark)); }
    .stat-box.purple::before { background: linear-gradient(90deg, #9b59b6, #8e44ad); }
    .stat-box.orange::before { background: linear-gradient(90deg, #f39c12, #e67e22); }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        margin-bottom: 1rem;
    }

    .stat-box.blue .stat-icon { background: rgba(52, 152, 219, 0.1); color: #3498db; }
    .stat-box.green .stat-icon { background: rgba(67, 136, 61, 0.1); color: var(--color-primary); }
    .stat-box.purple .stat-icon { background: rgba(155, 89, 182, 0.1); color: #9b59b6; }
    .stat-box.orange .stat-icon { background: rgba(243, 156, 18, 0.1); color: #f39c12; }

    .stat-value {
        font-size: 2rem;
        font-weight: 700;
        color: #2c3e50;
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        color: #7f8c8d;
        font-size: 0.875rem;
        font-weight: 500;
    }

    /* Users Card */
    .users-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        overflow: hidden;
    }

    .card-header-custom {
        background: linear-gradient(135deg, var(--color-primary) 0%, var(--color-primary-dark) 100%);
        padding: 1.5rem 2rem;
        color: white;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-header-custom h3 {
        margin: 0;
        font-size: 1.25rem;
        font-weight: 600;
    }

    /* User Items */
    .users-list {
        padding: 0;
        margin: 0;
    }

    .user-item {
        padding: 1.5rem 2rem;
        border-bottom: 1px solid #ecf0f1;
        transition: all 0.2s ease;
        display: grid;
        grid-template-columns: 2fr 2fr 1fr 2fr 2fr 1.5fr;
        gap: 1.5rem;
        align-items: center;
    }

    .user-item:last-child {
        border-bottom: none;
    }

    .user-item:hover {
        background-color: #f8f9fa;
    }

    .user-info {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .user-avatar {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: linear-gradient(135deg, var(--color-primary), var(--color-primary-light));
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: 700;
        font-size: 1.125rem;
        flex-shrink: 0;
    }

    .user-details h4 {
        margin: 0;
        font-size: 1rem;
        font-weight: 600;
        color: #2c3e50;
    }

    .user-details p {
        margin: 0.25rem 0 0 0;
        font-size: 0.8rem;
        color: #95a5a6;
    }

    .user-email {
        color: #7f8c8d;
        font-size: 0.875rem;
    }

    .user-email i {
        color: #bdc3c7;
        margin-right: 0.5rem;
    }

    /* Role Badge */
    .role-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.813rem;
        font-weight: 600;
        white-space: nowrap;
    }

    .role-badge.admin {
        background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
        color: white;
    }

    .role-badge.user {
        background: linear-gradient(135deg, #3498db, #2980b9);
        color: white;
    }

    /* Modules */
    .modules-container {
        display: flex;
        flex-wrap: wrap;
        gap: 0.4rem;
    }

    .module-tag {
        background: var(--color-light-bg);
        color: #2c3e50;
        padding: 0.35rem 0.75rem;
        border-radius: 6px;
        font-size: 0.75rem;
        font-weight: 500;
        border: 1px solid #dce4d9;
    }

    .module-tag.all {
        background: linear-gradient(135deg, #27ae60, #229954);
        color: white;
        border: none;
    }

    .module-tag.none {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
        color: white;
        border: none;
    }

    /* Permissions */
    .permissions-info {
        font-size: 0.813rem;
        color: #7f8c8d;
    }

    .permissions-info div {
        margin-bottom: 0.25rem;
    }

    .permissions-info i {
        width: 18px;
        text-align: center;
    }

    /* Actions */
    .action-buttons {
        display: flex;
        gap: 0.5rem;
        justify-content: flex-end;
    }

    .btn-action {
        width: 36px;
        height: 36px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 2px solid;
        background: white;
        cursor: pointer;
        transition: all 0.2s ease;
        font-size: 0.875rem;
    }

    .btn-action:hover {
        transform: translateY(-2px);
    }

    .btn-action.edit {
        border-color: #3498db;
        color: #3498db;
    }

    .btn-action.edit:hover {
        background: #3498db;
        color: white;
    }

    .btn-action.modules {
        border-color: #9b59b6;
        color: #9b59b6;
    }

    .btn-action.modules:hover {
        background: #9b59b6;
        color: white;
    }

    .btn-action.delete {
        border-color: #e74c3c;
        color: #e74c3c;
    }

    .btn-action.delete:hover {
        background: #e74c3c;
        color: white;
    }

    .btn-action.locked {
        border-color: #bdc3c7;
        color: #bdc3c7;
        cursor: not-allowed;
    }

    .btn-primary-custom {
        background: linear-gradient(135deg, var(--color-primary), var(--color-primary-dark));
        border: none;
        color: white;
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(67, 136, 61, 0.3);
        color: white;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
    }

    .empty-state i {
        font-size: 5rem;
        color: #ecf0f1;
        margin-bottom: 1.5rem;
    }

    .empty-state h4 {
        color: #95a5a6;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: #bdc3c7;
        font-size: 0.9rem;
    }

    /* Pagination */
    .pagination-container {
        padding: 1.5rem 2rem;
        background: #f8f9fa;
        border-top: 1px solid #ecf0f1;
    }

    @media (max-width: 1200px) {
        .user-item {
            grid-template-columns: 1fr;
            gap: 1rem;
        }
    }
</style>

<div class="users-container">
    <!-- Header -->
    <div class="header-card">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="header-title">
                    <i class="fas fa-users-cog me-2"></i>
                    Gestión de Usuarios
                </h1>
                <p class="header-subtitle mb-0">Administra usuarios, roles y permisos del sistema</p>
            </div>
            <a href="{{ route('users.create') }}" class="btn btn-primary-custom">
                <i class="fas fa-user-plus me-2"></i>
                Nuevo Usuario
            </a>
        </div>
    </div>

    <!-- Stats -->
    <div class="stats-grid">
        <div class="stat-box blue">
            <div class="stat-icon">
                <i class="fas fa-users"></i>
            </div>
            <div class="stat-value">{{ $users->total() }}</div>
            <div class="stat-label">Total de Usuarios</div>
        </div>

        <div class="stat-box green">
            <div class="stat-icon">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="stat-value">{{ $users->where('is_admin', true)->count() }}</div>
            <div class="stat-label">Administradores</div>
        </div>

        <div class="stat-box purple">
            <div class="stat-icon">
                <i class="fas fa-user"></i>
            </div>
            <div class="stat-value">{{ $users->where('is_admin', false)->count() }}</div>
            <div class="stat-label">Usuarios Regulares</div>
        </div>

        <div class="stat-box orange">
            <div class="stat-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="stat-value">{{ $users->count() }}</div>
            <div class="stat-label">En esta Página</div>
        </div>
    </div>

    <!-- Alerts -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <strong>¡Éxito!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-circle me-2"></i>
            <strong>Error:</strong> {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Users List -->
    <div class="users-card">
        <div class="card-header-custom">
            <h3>
                <i class="fas fa-list me-2"></i>
                Lista de Usuarios
            </h3>
            <span class="badge bg-light text-dark">{{ $users->total() }} usuarios</span>
        </div>

        <div class="users-list">
            @forelse($users as $user)
                <div class="user-item">
                    <!-- Usuario -->
                    <div class="user-info">
                        <div class="user-avatar">
                            {{ strtoupper(substr($user->name, 0, 1)) }}
                        </div>
                        <div class="user-details">
                            <h4>{{ $user->name }}</h4>
                            <p>ID: #{{ $user->id }}</p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="user-email">
                        <i class="fas fa-envelope"></i>
                        {{ $user->email }}
                    </div>

                    <!-- Rol -->
                    <div>
                        @if($user->is_admin)
                            <span class="role-badge admin">
                                <i class="fas fa-crown"></i>
                                Admin
                            </span>
                        @else
                            <span class="role-badge user">
                                <i class="fas fa-user"></i>
                                Usuario
                            </span>
                        @endif
                    </div>

                    <!-- Módulos -->
                    <div class="modules-container">
                        @if($user->is_admin)
                            <span class="module-tag all">
                                <i class="fas fa-check-circle me-1"></i>Acceso Total
                            </span>
                        @else
                            @if($user->modules->count() > 0)
                                @foreach($user->modules as $module)
                                    <span class="module-tag">{{ $module->name }}</span>
                                @endforeach
                            @else
                                <span class="module-tag none">
                                    <i class="fas fa-times-circle me-1"></i>Sin Módulos
                                </span>
                            @endif
                        @endif
                    </div>

                    <!-- Permisos -->
                    <div class="permissions-info">
                        @if(!$user->is_admin)
                            @php
                                $totalPermissions = $user->categoryPermissions->count() + $user->conceptTypes->count();
                            @endphp
                            @if($totalPermissions > 0)
                                <div><i class="fas fa-folder"></i> {{ $user->categoryPermissions->count() }} categorías</div>
                                <div><i class="fas fa-file-alt"></i> {{ $user->conceptTypes->count() }} tipos</div>
                            @else
                                <small class="text-muted">Sin permisos</small>
                            @endif
                        @else
                            <small class="text-muted"><i class="fas fa-infinity"></i> Ilimitado</small>
                        @endif
                    </div>

                    <!-- Acciones -->
                    <div class="action-buttons">
                        <a href="{{ route('users.edit', $user) }}"
                           class="btn-action edit"
                           title="Editar">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('users.modules', $user) }}"
                           class="btn-action modules"
                           title="Módulos">
                            <i class="fas fa-th-large"></i>
                        </a>
                        @if($user->id !== auth()->id())
                            <form action="{{ route('users.destroy', $user) }}"
                                  method="POST"
                                  class="d-inline"
                                  onsubmit="return confirm('¿Eliminar a {{ $user->name }}?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="btn-action delete"
                                        title="Eliminar">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        @else
                            <button type="button"
                                    class="btn-action locked"
                                    disabled
                                    title="No puedes eliminarte">
                                <i class="fas fa-lock"></i>
                            </button>
                        @endif
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <i class="fas fa-users"></i>
                    <h4>No hay usuarios registrados</h4>
                    <p>Comienza creando tu primer usuario</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($users->hasPages())
            <div class="pagination-container">
                <div class="d-flex justify-content-between align-items-center">
                    <small class="text-muted">
                        Mostrando <strong>{{ $users->firstItem() }}</strong> a
                        <strong>{{ $users->lastItem() }}</strong> de
                        <strong>{{ $users->total() }}</strong> usuarios
                    </small>
                    {{ $users->links() }}
                </div>
            </div>
        @endif
    </div>
</div>
@endsection
