<?php

/**
 * Patrón Decorator
 * Añadir armas a personajes.
*/

// Interface Personaje
interface Personaje {
    public function obtenerAtaque(): string;
}

// Clase básica
class Guerrero implements Personaje {
    public function obtenerAtaque(): string {
        return "Golpe básico";
    }
}

// Clase Decorator
abstract class ArmaDecorator implements Personaje {
    protected $personaje;

    public function __construct(Personaje $personaje) {
        $this->personaje = $personaje;
    }
}

// Decorador Espada
class Espada extends ArmaDecorator {
    public function obtenerAtaque(): string {
        return $this->personaje->obtenerAtaque() . " con Espada";
    }
}

// Decorador Escudo
class Escudo extends ArmaDecorator {
    public function obtenerAtaque(): string {
        return $this->personaje->obtenerAtaque() . " con Escudo";
    }
}

// Uso del Decorator
$guerrero = new Guerrero();
$guerreroConEspada = new Espada($guerrero);
$guerreroConEscudo = new Escudo($guerreroConEspada);
echo $guerreroConEscudo->obtenerAtaque();
?>
