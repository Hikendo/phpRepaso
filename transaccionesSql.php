<?php

$nameCity= 'Kabul';
        //creamos el enunciado de la consulta
        $consulta = "SELECT * FROM city where name = ? LIMIT 2";



        //ejecutamos el query como nota es importante recalcar que si nuestra consulta tiene un where
        //no debemos usar query y en su lugar sanitizarla usando prepare si recibimos un argumento o varios
       // $resultado  = $cxn->query( $consulta);

        //si vamos a recibir argumentos por post o get es mejor sanitizar la consulta, patra ello usamos el 'prepare'
        //recuerda que esta sanitizacion es para insert, delete, update o select con where
        //es decir, todo procedimiento sql que reciba argumentos argumentos 
        $resultado  = $cxn->prepare( $consulta);
//Con execute ejecutamos el query PDO
//        $resultado -> execute(array($arg1,$arg2,$arg3,$arg4,... en orden como aparezcan en la consulta));

        $resultado -> execute(array($nameCity));
        $resultado2= $resultado;
        echo '<pre>';

        //imprimimos el resultado con foreach que permite iterar el PDO sin mayores complicaciones
       foreach($resultado as $r){
        echo $r['ID'];
        echo '<br>';
        echo $r['Name'];

       }
       echo '</pre>';

       echo 'next <br>';
       //podemos usar otros iterables si queremos como el while o el for, 
       //debemos recordar que para un while normal debemos hacer que el iterable sea asociativo , algo similar a
       $resultado2 -> execute(array($nameCity));

       while ( $fila = $resultado2->fetch(PDO::FETCH_ASSOC)) {
        // Acceder a las propiedades específicas (por ejemplo, "Name" y "Population")
       
        $nombre = $fila["Name"];
        $poblacion = $fila["Population"];

        // Hacer algo con los datos (por ejemplo, imprimirlos)
        echo "Ciudad : $nombre (Población: $poblacion)<br>";
        }
        $resultado2 -> execute(array($nameCity));

        //podemos hacerlo indexable
        while ( $fila = $resultado2->fetch(PDO::FETCH_NUM)) {
            // Acceder a las propiedades específicas (por ejemplo, "Name" y "Population")
           
            $nombre = $fila[1];
            $poblacion = $fila[4];
    
            // Hacer algo con los datos (por ejemplo, imprimirlos)
            echo "Ciudad : $nombre (Población: $poblacion)<br>";
            }

            $resultado2 -> execute(array($nameCity));

        //podemos recorrerlo como un objeto 
        while ( $fila = $resultado2->fetch(PDO::FETCH_OBJ)) {
            // Acceder a las propiedades específicas (por ejemplo, "Name" y "Population")
           
            $nombre = $fila->Name;
            $poblacion = $fila->Population;
    
            // Hacer algo con los datos (por ejemplo, imprimirlos)
            echo "Ciudad : $nombre (Población: $poblacion)<br>";
            }

       //Modo array con indices, puede ser poco explicativo si los argumentos son muchos
      // $sql_alta= "INSERT INTO city SET Name= ? , CountryCode = ? , District = ?, Population= ?";
      // $alta = $cxn -> prepare($sql_alta);
      // $alta->execute(array('Oroquistankurd', 'ABW', 'Mexico', '65'));

       echo '<br> hey<br>';
      // Sentencia  SQL para insertar datos
      function alta($cxn){
        $sql_alta2 = "INSERT INTO city (Name, CountryCode, District, Population) VALUES (:nameCity, :code, :district, :population)";
        $alta2 = $cxn->prepare($sql_alta2);
    
        // Parámetros para la insercion
        $params = [
            ':nameCity' => 'Orokard',
            ':code' => 'ABW',
            ':district' => 'Mexico',
            ':population' => 65
        ];
       // $varGenerica->setFetchMode ( PDO::FETCH_ASSOC );  //con esto podemos establecer de antemano el método fetch por defecto
    
    
       //Una vez mas, para hacer mas esttricta la comparacion de tipos podemos usar
       //$alta2->bindParam (':nameCity', $nameCity, PDO::PARAM_STR);
       //$alta2->bindParam (':code', $code, PDO::PARAM_STR);
       //$alta2->bindParam (':district', $district, PDO::PARAM_STR);
       //$alta2->bindParam (':population', $population, PDO::PARAM_INT);
       //lo que hace es vincular la plantilla de nuestra sentencia sql a una variable e indicar el tipo de dato a usar, por defcto es string
       
       // Ejecutar la consulta de insercion
       //el argumento que recibe execute es un array de elementos
        $alta2->execute($params);
        //para obtener la id de la ultima insercion
        $lastId= $cxn-> lastInsertId();
    
        echo "Registro insertado correctamente. $lastId";
      }
    
      alta($cxn);

      function transactionSqlInsert($cxn){
            try
            {
                $cxn->beginTransaction();
                //hacemos la primer insercion
                $sql_alta = "INSERT INTO city (Name, CountryCode, District, Population) VALUES (:nameCity, :code, :district, :population)";
                $alta = $cxn->prepare($sql_alta);
            
                // Parámetros para la insercion
                $params = [
                    ':nameCity' => 'Orokardi',
                    ':code' => 'ABW',
                    ':district' => 'Mexico',
                    ':population' => 65
                ];
                $alta->execute($params);

                //si es exitosa se realiza la segunda
                $sql_alta2 = "INSERT INTO city (Name, CountryCode, District, Population) VALUES (:nameCity, :code, :district, :population)";
                $alta2 = $cxn->prepare($sql_alta2);
            
                // Parámetros para la insercion
                $params = [
                    ':nameCity' => 'Orokardi',
                    ':code' => 'ABW',
                    ':district' => 'Mexico',
                    ':population' => 65
                ];
                $alta2->execute($params);
                //Si ambas operaciones se realizaron con éxito forzamos escritura de los datos en la base de datos
                $cxn->commit(); //Pedido insertado correctamente.';

            }catch(PDOException $e){
                //si ocurre un error en el que cualquier operación no se pudiera concluir 
                //hacemos un rollabck para no escribir nada en la base de datos
                $cxn->rollback();
                //lanzamos la excepción 
                throw $e;
            }

      }

?>