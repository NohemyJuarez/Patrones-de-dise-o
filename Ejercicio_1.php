<?php

/**
 * Patrón Factory
 * Crear personajes (Esqueleto o Zombi) según el nivel del juego.
*/

// Interface Personaje
interface Personaje {
    public function getAtaque(): string;
    public function getVelocidad(): int;
}

// Clase Esqueleto
class Esqueleto implements Personaje {
    public function getAtaque(): string {
        return "Flechas";
    }
    public function getVelocidad(): int {
        return 10;
    }
}

// Clase Zombi
class Zombi implements Personaje {
    public function getAtaque(): string {
        return "Mordida";
    }
    public function getVelocidad(): int {
        return 5;
    }
}

// Factory
class PersonajeFactory {
    public static function crearPersonaje(string $nivel): Personaje {
        if ($nivel === "fácil") {
            return new Esqueleto();
        } elseif ($nivel === "difícil") {
            return new Zombi();
        }
        throw new Exception("Nivel no válido");
    }
}

// Uso del Factory
$nivel = "fácil"; // Cambia esto a "difícil" para probar.
$personaje = PersonajeFactory::crearPersonaje($nivel);
echo "Ataque: " . $personaje->getAtaque() . "\n";
echo "Velocidad: " . $personaje->getVelocidad() . "\n";
?>
