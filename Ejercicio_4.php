<?php

/**
 * Patrón Strategy
 * Mostrar mensajes en diferentes formatos.
*/

// Interface EstrategiaSalida
interface EstrategiaSalida {
    public function mostrar(string $mensaje): void;
}

// Estrategia de Consola
class Consola implements EstrategiaSalida {
    public function mostrar(string $mensaje): void {
        echo $mensaje . "\n";
    }
}

// Estrategia JSON
class JSON implements EstrategiaSalida {
    public function mostrar(string $mensaje): void {
        echo json_encode(["mensaje" => $mensaje]) . "\n";
    }
}

// Estrategia ArchivoTXT
class ArchivoTXT implements EstrategiaSalida {
    public function mostrar(string $mensaje): void {
        file_put_contents("salida.txt", $mensaje);
        echo "Mensaje guardado en salida.txt\n";
    }
}

// Contexto
class ContextoSalida {
    private $estrategia;

    public function __construct(EstrategiaSalida $estrategia) {
        $this->estrategia = $estrategia;
    }

    public function ejecutar(string $mensaje): void {
        $this->estrategia->mostrar($mensaje);
    }
}

// Uso del Strategy
$mensaje = "🐱 Hola, Mundo!!";
$contexto = new ContextoSalida(new Consola());
$contexto->ejecutar($mensaje);

$contexto = new ContextoSalida(new JSON());
$contexto->ejecutar($mensaje);

$contexto = new ContextoSalida(new ArchivoTXT());
$contexto->ejecutar($mensaje);
?>
