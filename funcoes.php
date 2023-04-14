<?php
    function inss($bruto = 0){
        $resultado = 0;

        switch (true){
            case $bruto <= 1302:
                $resultado = $bruto * 0.075;
                break;

            case $bruto > 1302 && $bruto <= 2571.29:
                $resultado = (1302 * 0.075) + ($bruto - 1302) * 0.09;
                break;

            case $bruto > 2571.29 && $bruto <= 3856.94:
                $resultado = (1302 * 0.075) + ((2571.29 - 1302) * 0.09) + ($bruto - 2571.29) * 0.12;
                break;
            
            case $bruto > 3856.94 && $bruto <= 7507.49:
                $resultado = (1302 * 0.075) + ((2571.29 - 1302) * 0.09) + ((3856.94 - 2571.29) * 0.12) + ($bruto - 3856.94) * 0.14;
                break;

            case $bruto > 7507.49:
                $resultado = 877.24;
                break;
        }

        return $resultado;
    }

    function ir($bruto = 0, $percapta = 0) {
        $total = 0;
        $descontado = $bruto - inss($bruto) - ($percapta * 189.59);

        if ($descontado <= 1903.98) {
            $total = 0;
        }else if($descontado > 1903.98 and $descontado <= 2826.65) {
            $total = ($descontado * 0.075) - 142.8;
        }else if ($descontado > 2826.65 and $descontado <= 3751.05){
            $total = ($descontado * 0.15) - 354.8;
        }else if ($descontado > 3751.05 and $descontado <= 4664.68){
            $total = ($descontado * 0.225) - 636.13;
        }else if ($descontado > 4664.68){
            $total = ($descontado * 0.275) - 869.36;
        }
    
        return $total;
    }
?>