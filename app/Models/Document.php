<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'numero',
        'tipo',
        'fecha',
        'archivo',
        'descripcion',
        'category_id',
        'document_type_id',
        'document_theme_id',
        // Campos opcionales de archivo
        'referencia_ubicacion',
        'soporte',
        'volumen',
        'nombre_productor',
        'informacion_valoracion',
        'lengua_documentos',
        'views_count'
    ];

    // Incrementar contador de visitas
    public function incrementViews()
    {
        $this->increment('views_count');
    }

        public function documentType()  
    {  
        return $this->belongsTo(DocumentType::class);  
    }  
    
    public function documentTheme()  
    {  
        return $this->belongsTo(DocumentTheme::class);  
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}