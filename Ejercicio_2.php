<?php

/**
 * Patrón Adapter
 * Solucionar la compatibilidad de archivos entre Windows 7 y Windows 10.
*/

// Interface para archivos
interface Archivo {
    public function abrir(): string;
}

// Clase ArchivoWindows7
class ArchivoWindows7 implements Archivo {
    public function abrir(): string {
        return "Archivo abierto en Windows 7";
    }
}

// Adapter para Windows 10
class ArchivoWindows10Adapter implements Archivo {
    private $archivoWindows7;

    public function __construct(ArchivoWindows7 $archivoWindows7) {
        $this->archivoWindows7 = $archivoWindows7;
    }

    public function abrir(): string {
        return $this->archivoWindows7->abrir() . " adaptado para Windows 10";
    }
}

// Uso del Adapter
$archivo7 = new ArchivoWindows7();
$archivo10 = new ArchivoWindows10Adapter($archivo7);
echo $archivo10->abrir();

?>
