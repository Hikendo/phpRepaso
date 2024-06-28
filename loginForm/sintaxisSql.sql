SELECT name, age, salary FROM employees WHERE active = true;
SELECT * FROM emple WHERE nombre LIKE 'P%';


INSERT INTO nombre_tabla (columna1, columna2, columna3) VALUES (valor1, valor2, valor3);

INSERT INTO employees (name, age, salary, contractor_date, email, active)
VALUES ('Ana Martínez', 35, 60000.00, '2023-11-15', 'ana@example.com', true);

UPDATE nombre_tabla SET columna1 = nuevo_valor WHERE condicion;

UPDATE employees SET salary = 65000.00 WHERE name = 'Ana Martínez';

DELETE FROM nombre_tabla WHERE condicion;

DELETE FROM employees WHERE age > 40;

CREATE TABLE employees (
    id SERIAL PRIMARY KEY,
    name VARCHAR(50),
    age SMALLINT,
    salary DECIMAL(10, 2),
    contractor_date DATE,
    email VARCHAR(100),
    active BOOLEAN
);

SELECT e.nombre, d.nombre AS departamento
FROM empleados e
INNER JOIN departamentos d ON e.departamento_id = d.id;


INNER JOIN:
Devuelve todas las filas cuando hay al menos una coincidencia en ambas tablas. En este caso, obtendremos los nombres de los empleados junto con los nombres de sus departamentos:
SQL

SELECT e.nombre, d.nombre AS departamento
FROM empleados e
INNER JOIN departamentos d ON e.departamento_id = d.id;
Código generado por IA. Revisar y usar cuidadosamente. Más información sobre preguntas frecuentes.
LEFT JOIN:
Devuelve todas las filas de la tabla de la izquierda (empleados) y las filas coincidentes de la tabla de la derecha (departamentos). Si un empleado no tiene un departamento asignado, aún se mostrará su nombre con un valor nulo para el departamento:
SQL

SELECT e.nombre, d.nombre AS departamento
FROM empleados e
LEFT JOIN departamentos d ON e.departamento_id = d.id;

RIGHT JOIN:
Devuelve todas las filas de la tabla de la derecha (departamentos) y las filas coincidentes de la tabla de la izquierda (empleados). Si un departamento no tiene empleados asignados, aún se mostrará su nombre con un valor nulo para el empleado:
SQL

SELECT e.nombre, d.nombre AS departamento
FROM empleados e
RIGHT JOIN departamentos d ON e.departamento_id = d.id;

FULL OUTER JOIN (no mencionado previamente):
Devuelve todas las filas de ambas tablas, incluyendo aquellos empleados sin departamento y aquellos departamentos sin empleados:
SQL

SELECT e.nombre, d.nombre AS departamento
FROM empleados e
FULL OUTER JOIN departamentos d ON e.departamento_id = d.id;
