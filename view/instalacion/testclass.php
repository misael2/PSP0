<?php

class Create_database
{
    protected $pdo;
     Public $host;
     public $user;
     public $password;

    
    public function __construct($host,$user,$password)
    {    
        $this->pdo = new PDO("mysql:host=".$host.';', $user, $password);
    }
    //creamos la base de datos y las tablas que necesitemos
    public function my_db()
    {
        //creamos la base de datos si no existe
        $crear_db = $this->pdo->prepare('CREATE DATABASE IF NOT EXISTS pspbd COLLATE utf8_spanish_ci');
        $crear_db->execute();

        //decimos que queremos usar la tabla que acabamos de crear
        if($crear_db):
            $use_db = $this->pdo->prepare('USE pspbd');
            $use_db->execute();
        endif;

        //si se ha creado la base de datos y estamos en uso de ella creamos las tablas
        if($use_db):
            //creamos la tabla Categorias
            $crear_tb_users = $this->pdo->prepare('
						CREATE TABLE `categorias` (
  `id_categoria` int(10) NOT NULL,
  `nombre` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`) VALUES
(13, \'santander\'),
(17, \'Bancomer\'),
(18, \'libertad\');');
           
         endif;
            //creamos la tabla posts
 


   $crear_tb_users->execute();

   
    }
    public function clie(){

      $crear_tb_posts = $this->pdo->prepare('
           CREATE TABLE `clientes` (
  `id` int(10) NOT NULL,
  `nombre` varchar(15) DEFAULT NULL,
  `apellido` varchar(15) DEFAULT NULL,
  `telefono` varchar(11) DEFAULT NULL,
  `correo` varchar(30) DEFAULT NULL,
  `id_categoria` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



-- Volcado de datos para la tabla `Clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `telefono`, `correo`, `id_categoria`) VALUES
(6, \'joel\', \'misael marin co\', \'09857409548\', \'amisael@gmail.com\', 13),
(11,  \'misael \',  \'marindulake\',  \'98765432123\', \'amir@jkdo.com\', 17),
(13, \'Dalia\', \'\Lizeth dzul ake\', \'9841061101\', \'liz@gmail.com\', 18),
(14, \'Juan\', \'Perezsgsgsfsgfs\', \'9841061101\', \'jhdd@gmail.com\', 13);


--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Clientes_Categorias2` (`id_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_Clientes_Categorias2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;');
            $crear_tb_posts->execute();
       

    }
}
//ejecutamos la función my_db para crear nuestra bd y las tablas

?>