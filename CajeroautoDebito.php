<?php

function consultarsaldo($saldo) {
    echo "\nTu saldo actual es: $saldo\n";
}

function retiro(&$saldo) {
    while (true) {
        echo "\nIntroduce el monto que deseas retirar (10000, 50000, 100000, 150000 o más): ";
        $monto_retiro = readline();

        if ($monto_retiro == 10000 || $monto_retiro == 50000 || $monto_retiro == 100000 || $monto_retiro == 150000 || $monto_retiro > 50000) {
            if ($monto_retiro <= $saldo) {
                $saldo -= $monto_retiro;
                echo "\nRetiro exitoso de $monto_retiro. Nuevo saldo: $saldo\n";
            } else {
                echo "\nNo tienes suficiente saldo para realizar este retiro. Saldo actual: $saldo\n";
            }
        } else {
            echo "\nEl monto ingresado no es permitido. Por favor, ingrese 10000, 50000, 100000, 150000 o un monto mayor a 50000.\n";
        }

        echo "\n¿Deseas realizar otro retiro? (si/no): ";
        $continuar = strtolower(readline());

        if ($continuar != 'si') {
            break; 
        }
    }
}

function gestionardeposito(&$saldo) {
    echo "\nIntroduce el monto que deseas depositar: ";
    $monto_deposito = readline();

    if ($monto_deposito > 0) {
        $saldo += $monto_deposito;
        echo "\nDeposito exitoso de $monto_deposito. Nuevo saldo: $saldo\n";
    } else {
        echo "\nEl monto ingresado no es permitido. Por favor, ingresa un monto positivo.\n";
    }
}

function cajeroAuto() {
    $saldoInicial = readline("Introduce el saldo inicial: ");
    $saldo = $saldoInicial;

    echo "Saldo inicial: $saldo\n";

    while (true) {
        echo "\nMenu Principal:\n";
        echo "1. Consultar saldo\n";
        echo "2. Gestionar retiro\n";
        echo "3. Gestionar depósito\n";
        echo "4. Salir \n";
        echo "Seleccione una opcion (1/2/3/4): ";
        $opcion = readline();

        switch ($opcion) {
            case '1':
                consultarsaldo($saldo);
                break;
            case '2':
                retiro($saldo);
                break;
            case '3':
                gestionardeposito($saldo);
                break;
            case '4':
                echo "\nGracias por usar nuestro servicio Daviplata.";
                return;
            default:
                echo "\nOpcion no permitida. Por favor, seleccione 1, 2, 3 o 4.\n";
                break;
        }
    }
}

cajeroAuto();
?>
