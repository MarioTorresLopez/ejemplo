<?php

class calificaciones extends CI_Controller {

    public function index() {
        $data = array();
        $this->load->view('app/private/ImportExcel.php', $data, FALSE);
    }

    public function subir() {

        require_once 'PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';
        $val = $this->input->post('validador');
        /**
         * Primera validación para leer los datos del archivo de excel, dependiendo del formato que se lea
         * entrara en el if correspondiente
         */
        //if (isset($_FILES['excelFile']) && !empty($_FILES['excelFile']['tmp_name'])) {

        /**
         * Cargando el archivo en una variable para su lectura
         */
        $fileObj = PHPExcel_IOFactory::load('static/excel/' . $val);
        $fileObj->setActiveSheetIndex(0);
        /**
         * Lectura del archivo
         */
        $sheetObj = $fileObj->setActiveSheetIndex(0)->getHighestRow();

//            /**
//             * Variable para comenzar la lectura del archivo desde esa fila
//             */
        $startFrom = 26;
        /**
         * Inicialización de variables para la matriz que contendra los datos del archivo
         */
        $fila1 = 0;
        $columna1 = 0;
        /**
         * Variable con formato de fecha para utilizar en la base de datos
         */
        $format = "Y-m-d";
        /**
         * Primer for para recorrer por fila el archivo de excel
         */
//            foreach ($sheetObj->getRowIterator($startFrom) as $row) {
//
//                $columna1 = 0;
//
//                /**
//                 * Segundo for para recorrer celda por celda de la misma fila en la que se encuentra actualmente en el for anterior
//                 */
//                foreach ($row->getCellIterator() as $cell) {
//                    /**
//                     * Variable en la que se guarda el valor de la celda
//                     */
//                    $value = $cell->getCalculatedValue();
//
//                    $excel[$fila1][$columna1] = json_encode($value);
//                    //echo json_encode($value);
//                    //echo $value;
//
//                    $columna1++;
//                }
//
//
//                $fila1++;
//            }
        /**
         * Variable en la que se guarda la cantidad de filas recooridas en las que se encuentran información.
         * Se realiza una suma de 17 debido al formato manejado en el archivo y nos de el limite correcto
         * de lectura de las filas del archivo.
         */
        $aux = $fila1 + 24;
        $limit = $aux;
//
//            /**
//             * Los primeros dos foreach son para hacer la validación del limite de lectura de los datos en el archivo
//             */
//            /**
//             * Declaración del array en el que se guardara los datos leidos
//             */
        $excel = array();
//            $excel2 = array();
//            /**
//             * Declaración de nuevas variables para la matriz
//             */
//            $fila = 0;
//            $columna = 0;
//            /**
//             * Variable para inicializar la lectura de datos de una celda en especifico
//             */
//            $rt = 26;
//            /**
//             * Este foreach contiene otro parametro que es el limite de hasta que fila debe de leer datos
//             */
//            foreach ($sheetObj->getRowIterator($startFrom, $limit) as $row) {
//
//                $columna = 0;
//
//                foreach ($row->getCellIterator() as $cell) {
//                    /**
//                     * Este if servira para detectar si la celda que estamos leyendo
//                     * tiene algun formato especifico de fecha o tiempo
//                     */
//                    if (PHPExcel_Shared_Date::isDateTime($cell)) {
//                        echo 'col:' . $columna;
//                        /**
//                         * Variable en la que se hace la lectura de la celda especificada en getCell()
//                         */
//                        $cell = $fileObj->getActiveSheet()->getCell('M' . $rt);
//                        /**
//                         * Guardamos en otra variable el valor que contenga esa celda
//                         */
//                        $InvDate = $cell->getValue();
//                        /**
//                         * Pasamos ese valor a otra variable para realizar el calculo de la fecha
//                         */
//                        $xls_date = $InvDate;
//
//                        /**
//                         * Este claculo se realiza para saber la fecha que se encuentra en esa celda,
//                         * ya que algunos formatos de fecha marcan como numeros las fechas en las celdas
//                         */
//                        $unix_date = ($xls_date - 25569) * 86400;
//                        $xls_date = 25569 + ($unix_date / 86400);
//                        $unix_date = ($xls_date - 25568) * 86400;
//                        /**
//                         * En esta variable guardamos el valor obtenido de los calculos y transformamos al formato de fecha que queramos
//                         */
//                        $value = date("Y-m-d", $unix_date);
//                        /**
//                         * Guardamos el valor en la matriz
//                         */
//                        $excel[$fila][$columna] = json_encode($value);
//                    } else {
//                        /**
//                         * Si el valor de la celda no es de tipo de fecha pasa a colocarlo en la posición correspodiente de la matriz
//                         */
//                        $value = $cell->getCalculatedValue();
//                        $excel[$fila][$columna] = json_encode($value);
//                    }
//                    //$excel[$fila][$columna] =  json_encode($value);
//                    //echo json_encode($value);
//                    // echo $value;
//
//                    $columna++;
//                }
//                $rt++;
//
//
//                $fila++;
//
//                echo "<br />";
//                echo "<br />";
//                
//            }

//        echo '<table border=1><tr><td>Cell1</td><td>Cell2</td><td>Cell3</td><td>Cell4</td>'
//        . '<td>Cell5</td><td>Cell6</td><td>Cell7</td><td>Cell8</td><td>Cell9</td><td>Cell10</td>'
//        . '<td>Cell11</td><td>Cell12</td><td>Cell13</td></tr>';

        for ($i = 26; $i < $sheetObj; $i ++) {

            $cell1 = $fileObj->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
            $excel[$fila1][0] = $cell1;
            $cell2 = $fileObj->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
            $excel[$fila1][1] = $cell2;
            $cell3 = $fileObj->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
            $excel[$fila1][2] = $cell3;
            $cell4 = $fileObj->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
            $excel[$fila1][3] = $cell4;
            $cell5 = $fileObj->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
            $excel[$fila1][4] = $cell5;
            $cell6 = $fileObj->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
            $excel[$fila1][5] = $cell6;
            $cell7 = $fileObj->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
            $excel[$fila1][6] = $cell7;
            $cell8 = $fileObj->getActiveSheet()->getCell('H' . $i)->getCalculatedValue();
            $excel[$fila1][7] = $cell8;
            $cell9 = $fileObj->getActiveSheet()->getCell('I' . $i)->getCalculatedValue();
            $excel[$fila1][8] = $cell9;
            $cell10 = $fileObj->getActiveSheet()->getCell('J' . $i)->getCalculatedValue();
            $excel[$fila1][9] = $cell10;
            $cell11 = $fileObj->getActiveSheet()->getCell('K' . $i)->getCalculatedValue();
            $excel[$fila1][10] = $cell11;
            $cell12 = $fileObj->getActiveSheet()->getCell('L' . $i)->getCalculatedValue();
            $excel[$fila1][11] = $cell12;
            $cell13 = $fileObj->getActiveSheet()->getCell('M' . $i)->getCalculatedValue();
            $InvDate = $cell13;
            $xls_date = $InvDate;
            $unix_date = ($xls_date - 25569) * 86400;
            $xls_date = 25569 + ($unix_date / 86400);
            $unix_date = ($xls_date - 25568) * 86400;
            $value = date("Y-m-d", $unix_date);
            $cell13=$value;
            $excel[$fila1][12] = $cell13;
            $cell14 = $fileObj->getActiveSheet()->getCell('N' . $i)->getCalculatedValue();
            $excel[$fila1][13]=$cell14;

//            echo '<tr>';
//            echo '<td>' . $cell1 . '</td>';
//            echo '<td>' . $cell2 . '</td>';
//            echo '<td>' . $cell3 . '</td>';
//            echo '<td>' . $cell4 . '</td>';
//            echo '<td>' . $cell5 . '</td>';
//            echo '<td>' . $cell6 . '</td>';
//            echo '<td>' . $cell7 . '</td>';
//            echo '<td>' . $cell8 . '</td>';
//            echo '<td>' . $cell9 . '</td>';
//            echo '<td>' . $cell10 . '</td>';
//            echo '<td>' . $cell11 . '</td>';
//            echo '<td>' . $cell12 . '</td>';
//            echo '<td>' . $cell13 . '</td>';
//            echo '</tr>';
            $fila1++;
        }
//        echo '</table>';

//            $cont1=$columna+6;
//            $cont2=$columna;
//            $auxcell=5;
//            for($cont=0;$cont<$fila;$cont++){
//                $cont2=$columna;
//                $auxcell=5;
//                for($cont2;$cont2<$cont1;$cont2++){
//                    $cell2 = $fileObj->getActiveSheet()->getCell('C'.$auxcell);
//                    $value = $cell2->getCalculatedValue();
//                    $excel[$cont][$cont2] = json_encode($value);
//                    $auxcell++;
//                }
//            }
        /**
         * Imprimimos el excel para ver el contenido de la matriz
         */
            print_r($excel);
//            print_r($excel2);
//        } else {
//            echo"error";
//        }
    }

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */
?>