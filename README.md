# ConwayLife
Un modelo matemático que simula la evolución de células en una cuadrícula bidimensional.

<img src="https://raw.githubusercontent.com/lu9dce/lu9dce.github.io/main/img/life.png" width="300" height="300">
<hr>

El Juego de la Vida es un autómata celular creado por el matemático británico John H. Conway en 1970. Es un modelo matemático que simula la evolución de células en una cuadrícula bidimensional. Cada célula puede estar viva o muerta, y su estado evoluciona en cada paso de tiempo según reglas simples.

El juego sigue estas reglas:

1. **Supervivencia:** Una célula viva sobrevive si tiene 2 o 3 vecinos vivos.
2. **Muerte:** Una célula viva muere por sobrepoblación (más de 3 vecinos vivos) o subpoblación (menos de 2 vecinos vivos).
3. **Nacimiento:** Una célula muerta cobra vida si tiene exactamente 3 vecinos vivos.

Estas reglas simples dan lugar a patrones complejos y a menudo impredecibles con el tiempo. A pesar de su simplicidad, el Juego de la Vida exhibe comportamientos emergentes fascinantes y ha sido estudiado en campos como la teoría de la complejidad, la informática y las ciencias de la vida.

## Parametros

Juega con los parametros del life.php hay muchas cosas que puedes ajustar

## Cómo ejecutarlo

Para visualizar los datos generados, hay un archivo index.php. Puedes crear un servidor web con PHP usando el siguiente comando:

```php -S 0.0.0.0:2000```

Luego, en el navegador, usa **https://127.0.0.1:2000**.

Recuerda ajustar tu archivo php.ini para incluir los módulos necesarios.
