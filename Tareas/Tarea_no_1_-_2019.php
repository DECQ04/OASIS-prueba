<?php 
#*****************CLASES O CLASES COMPLETAS ------------------------------------------------------------------------------------------------------------------------------------------------
            class Persona{
                #     Propiedades
                #     Métodos

                    public $nombre;
                    public $edad;
                    public $altura;

                    function caminar(){
                        #...Código a ejecutar

                    }
            }
            $persona = new Persona();


#******************EJEMPLO DE CÓDIGO IMPERATIVO O ESPAGUETI VS POO----------------------------------------------------------------------------------------------------------------
            //Imperativo----------------------------
 
            $automovil1 = array(
                'marca' =>'Toyota',
                'modelo' =>'Corola'
            );
            $automovil2 = array(
                'marca' =>'Volkswagen',
                'modelo' =>'Jetta'
            );

            function imprimir($automovil){
                echo "<p>Hola! soy un $automovil[marca] modelo $automovil[modelo]</p>";
            }

            imprimir($automovil1);
            imprimir($automovil2);

            #POO----------------------------------------------

            class Automovil{

                public $marca ='NULL ';
                public $modelo='NULL ';

                public function imprimir(){
                    echo "<p>Hola! soy un $this->marca modelo $this->modelo</p>";

                }
            }

            $a = new Automovil();
            $a->marca ="Toyota";
            $a->modelo = "Corola";
            $a->imprimir();

            $b = new Automovil();
            $b->marca ="Volkswagen";
            $b->modelo = "Jetta";
            $b->imprimir();

#************ POO BÁSICA ----------------------------------------------------------------------------------------------------------------------------------------------------
        
            class bloques
            {
                //  decalaración de una propiedad
                const CONSTANTE = 'mi constante';

                //  declaración de una propiedad
                public $var = 'valora por defecto';

                // declaración de un método
                public function imprimirVar(){
                    echo $this->var;
                }
            }
            //comentado por ya estar definida anteriormente
            /*class Automovil{

                public $marca ='valor por defecto';
                public $modelo=' ';

            }

            $a = new Automovil();
            $a->marca ="Toyota";
            $a->modelo = "Corola";*/



#***** Herencia de Clases -------------------------------------------------------------------------------------------------------------------------------------------------

            class clasePadre{
                #...
            }
            class claseHija  extends clasePadre{

                // esta clase hereda todos los métodos y propiedades de
                //la clase madre NombreDeMiClaseMadre
                

            }
        // Declaracion de clases abstractas------------------

            abstract class claseAbstracta{
                #...
            }
        // Ejemplo avanzado
        abstract class servicio
        {
            abstract public function saludar($nombre);

            public function carta($nombre, $almuerzo){
                echo $this->saludar($nombre);
                echo "Le puedo ofrecer: <br/>";

                foreach ($almuerzo as $clave =>$valor){
                    echo $clave.": ".$valor."<br/>";
                }
            }
        }


        class mesero extends servicio
        {
            public function saludar($nombre)
            {
                return "Buenas tardes señor(a):".$nombre."<br/>";
            }
        }

        $mesero1 = new mesero();
        $nombrePersona ="Yhoan Galeano";
        $almuerzo = array("Sopa"=>"Fideos",
                          "Seco"=>"Carne Res, Papitas, Ensalada",
                          "Jugo"=>"Mora");
        $mesero1->carta($nombrePersona,$almuerzo);

# Declaracion de Clases finales En PHP
#***************OBJETOS E INSTANCIAS***************---------------------------------------------------------------------------------------
# Instanciar una clase-------------------------------------
# Definición de atributos o propiedades en PHP-------------------------------------
# Niveles de acceso-------------------------------------
# 1. Propiedades públicas-------------------------------------
# 2. Propiedades privadas-------------------------------------
# 3. Propiedades protegidas-------------------------------------
# 4. Propiedades estáticas-------------------------------------


#***************ACCEDIENDO A LAS PROPIEDADES DE UN OBJETO:***************------------------------------------------------------------------
# Acceso a variables desde el ámbito de la clase-------------------------------------
# Acceso a variables desde el exterior de la clase-------------------------------------
#***************CONSTANTES:***************-------------------------------------------------------------------------------------------------
#***************MÉTODOS PHP***************-------------------------------------------------------------------------------------------------
#Métodos públicos, privados, protegidos y estáticos-------------------------------------
#***************MÉTODOS ABSTRACTOS***************------------------------------------------------------------------------------------------
# Clase padre-------------------------------------
# Clase hija:-------------------------------------
# Métodos mágicos en PHP-------------------------------------
# El Método Mágico __construct()-------------------------------------
# El método mágico __destruct()-------------------------------------
#***************INTERFACES***************--------------------------------------------------------------------------------------------------
#La construcción de una Interfaz es la siguiente:-------------------------------------
#***************AGREGACIÓN Y COMPOSICIÓN EN PHP***************-----------------------------------------------------------------------------
# Agregación:-------------------------------------
# Composición:-------------------------------------










?>