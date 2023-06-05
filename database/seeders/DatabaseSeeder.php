<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Area;
use App\Models\Beneficio;
use App\Models\DetalleBeneficio;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     joal como estas col
        // ]);
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@gmail.com';
        $user->email_verified_at = now();
        $user->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $user->remember_token = Str::random(10);
        $user->save();
        
        // $this->planes();
        // $this->beneficios();
        // $this->DetalleBeneficios();

        // $this->xd();
        // $this->areas();
    }

    public function planes(){
        // Plan básico
    $r = new Plan();
    $r->nombre = "Básico";
    $r->descripcion = "Creación de un perfil básico para la empresa";
    $r->tipo_plan = "mensual";
    $r->precio = 100;
    $r->save();

    // Plan avanzado
    $r = new Plan();
    $r->nombre = "Avanzado";
    $r->descripcion = "Creación de un perfil avanzado para la empresa";
    $r->tipo_plan = "trimenstral";
    $r->precio = 200;
    $r->estado = "Activo";
    $r->save();

    // Plan premium
    $r = new Plan();
    $r->nombre = "Premium";
    $r->descripcion = "Creación de un perfil premium para la empresa";
    $r->tipo_plan = "anueal";
    $r->precio = 300;
    $r->estado = "Activo";
   $r->save();
    }

    public function beneficios(){

        $r = new Beneficio();
        $r->descripcion = "Perfil básico de la empresa";
        $r->save();

        $r = new beneficio();
        $r->descripcion = "Capacidad de publicar 10 anuncios al mes";
        $r->save();

        $r = new beneficio();
        $r->descripcion = "Perfil avanzado de la empresa";
        $r->save();

        $r = new beneficio();
        $r->descripcion = "Capacidad de publicar 30 anuncios al mes";
        $r->save();

        $r = new beneficio();
        $r->descripcion = "Estadísticas avanzadas";
        $r->save();

        $r = new beneficio();
        $r->descripcion = "Perfil premium de la empresa";
        $r->save();

        $r = new beneficio();
        $r->descripcion = "Capacidad de publicar anuncios ilimitados";
        $r->save();

        $r = new beneficio();
        $r->descripcion = "Atención al cliente preferencial";
        $r->save();

        }


        public function DetalleBeneficios(){
            foreach (Plan::get() as $p) {
                //primero, cantidad
                $len_beneficios = Beneficio::count();
                $cantidad = rand(1,7);
                //luego for hasta la cantidad, y rand de beneficios
                for ($i=0; $i < $cantidad; $i++) {
                    $detalle = new DetalleBeneficio();
                    $detalle->id_plan = $p->id;
                    $detalle->id_beneficio = rand(1,$len_beneficios);
                    $detalle->save();
                }
            }
        }
        public function areas(){
            $areas = ["Departamento de Crédito", "Departamento de Ventas", "Departamento de Servicio al Cliente", "Departamento de Cobranzas", "Departamento de Análisis de Riesgo", "Departamento Legal", "Departamento de Operaciones", "Departamento de Control de Calidad"];
            foreach($areas as $a){
                $r = new Area();
                $r->nombre = $a;
                $r->descripcion = $a;
                $r->save();
            }

        }

        public function xd(){

            $requisitos = [
                ['nombre' => 'Comprobante de ingresos', 'descripcion' => 'Emitido por un contador público diplomado'],
                ['nombre' => 'Planilla de solicitud de crédito', 'descripcion' => 'Debe ser llenada adecuadamente'],
                ['nombre' => 'Documento de domicilio', 'descripcion' => 'Donde reside actualmente el solicitante'],
                ['nombre' => 'Carnet de identificación', 'descripcion' => 'Original'],
                ['nombre' => 'Edad mínima', 'descripcion' => 'En promedio al menos debes tener 25 años'],
                ['nombre' => 'Edad máxima', 'descripcion' => 'Hasta los 60 años de edad'],
                ['nombre' => 'Relación laboral', 'descripcion' => 'Debes estar trabajando y tener una antigüedad de uno o hasta 3 años'],
                ['nombre' => 'Ingresos', 'descripcion' => 'Comprobar cuánto ganas mensualmente'],
                ['nombre' => 'Historial crediticio', 'descripcion' => 'Se revisa el Buró de Crédito del solicitante'],
                ['nombre' => 'Domicilio', 'descripcion' => 'Comprobar la cantidad de tiempo que llevas viviendo en ese lugar'],
                ['nombre' => 'Solvencia e ingresos estables', 'descripcion' => 'Demostrar que se puede devolver el dinero prestado'],
                ['nombre' => 'DNI o NIE', 'descripcion' => 'Si es extranjero, su NIE'],
                ['nombre' => 'Número de cuenta corriente', 'descripcion' => 'Donde se ingresará el dinero'],
                ['nombre' => 'Fotocopia de las últimas nóminas', 'descripcion' => 'O un documento que justifique un ingreso regular de dinero'],
                ['nombre' => 'Vida laboral', 'descripcion' => 'Documento que acredita tu vida laboral'],
                ['nombre' => 'Fotocopia del documento de alta de autónomo', 'descripcion' => 'Si eres autónomo'],
                ['nombre' => 'Últimas declaraciones anuales del IVA', 'descripcion' => 'Si eres autónomo'],
                ['nombre' => 'Últimos pagos fraccionados del IRPF', 'descripcion' => 'Si eres autónomo'],
            ];

            foreach ($requisitos as $requisito) {
                DB::table('requisitos')->insert([
                    'nombre' => $requisito['nombre'],
                    'descripcion' => $requisito['descripcion'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

    }

}
